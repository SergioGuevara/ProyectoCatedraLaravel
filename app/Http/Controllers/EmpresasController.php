<?php

namespace App\Http\Controllers;

use App\Models\Administradore;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Rubro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\Correo;


class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewBag=array();
        $viewBag['empresas']=DB::table('empresas')
        ->join('administradores','administradores.idempresa','=','empresas.idempresa')
        ->get();
        return view('GestionarEmpresa.index',$viewBag);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $viewBag=array();
        $rubros = Rubro::get();
        $viewBag['empresas']=DB::table('empresas')
        ->join('administradores','administradores.idempresa','=','empresas.idempresa')
        ->get();

        return view('GestionarEmpresa.create',$viewBag,compact('rubros'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'nameEmpresa' => ['required'],
            'direcEmpresa' => ['required'],
            'comisionEmpresa' => ['numeric']
        ]);

        $nombreRubro = $request->input('rubroEmpresa');
        $existeRubro = Rubro::where('Rubro',$nombreRubro)->exists();
        
        if($existeRubro){
            $empresas = new Empresa();
            $contacto = new Administradore();
            //Ingreso de empresas
            $nombreEmpresa = $request->input('nameEmpresa');
            $iniciales = substr($nombreEmpresa,0,3);
            $digitos = rand(100, 999);
            $empresas->idempresa = $iniciales.$digitos;
            $empresas->nombre = $request->input('nameEmpresa');
            $empresas->direccion = $request->input('direcEmpresa');
            
            
            $rubro = json_decode(Rubro::where('Rubro',$nombreRubro)->get());
            $empresas->idrubro = $rubro[0]->idrubro;
            $empresas->comision=$request->input('comisionEmpresa');
            $empresas->save();

            //Ingreso de Contactos
            $contacto->idadmin = (substr($request->input('nameContacto'),0,3)) . (rand(100, 999));
            $contacto->Nombre = $request->input('nameContacto');
            $contacto->Telefono = $request->input('telContacto');
            $contacto->Correo = $request->input('mailContacto');
            $contacto->idrol = 2;
            $contacto->idempresa = $empresas->idempresa;

            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $contraseña = '';
            $tamaño = 8;

            for ($i = 0; $i < $tamaño; $i++) {
                $contraseña .= $caracteres[random_int(0, strlen($caracteres) - 1)];
            }

            
            
            $correo = $request->input('mailContacto');
            Mail::to($correo)->send(new Correo($contraseña));
            
            $contraseñaHash = hash('sha256', $contraseña);
            $contacto->Pass = $contraseñaHash;
            $contacto->save();
            
            $viewBag=array();
            $viewBag['empresas']=DB::table('empresas')
            ->join('administradores','administradores.idempresa','=','empresas.idempresa')
            ->get();
            return view('GestionarEmpresa.index',$viewBag);
        }
        else{
            $errores = 'El rubro ingresado no existe';
            return view('GestionarEmpresa.create', compact('errores'));
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $idempresa)
    {
        
        $empresa = Empresa::findOrFail($idempresa);
        $administrador = Administradore::where('idempresa',$idempresa)->first();


        $empresa->direccion = $request->input('direcEmpresa');
        $empresa->comision = $request->input('comisionEmpresa');      
        $empresa->save();
        
        
        $administrador->Nombre = $request->input('nameContacto');
        $administrador->Telefono = $request->input('telContacto');
        $administrador->Correo = $request->input('mailContacto');
        $administrador->save();


        $viewBag=array();
        $viewBag['empresas']=DB::table('empresas')
        ->join('administradores','administradores.idempresa','=','empresas.idempresa')
        ->get();
        return view('GestionarEmpresa.index',$viewBag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idempresa)
    {
        Empresa::destroy($idempresa);
        //$this->resetAutoIncrement();

        $viewBag=array();
        $viewBag['empresas']=DB::table('empresas')
        ->join('administradores','administradores.idempresa','=','empresas.idempresa')
        ->get();
        return view('GestionarEmpresa.index',$viewBag);
    }
}
