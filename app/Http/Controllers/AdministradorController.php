<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Administradore;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordEmpleado;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewBag=array();
        $viewBag['empleados']=Administradore::where('idrol', 3)->get();
    
        return view('Administradores.index',$viewBag);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($empleado = null)
    {
        return view('Administradores.create',['empleado' => $empleado]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $empleado = new Administradore;
    
        $validator = Validator::make($request->all(), [
            'nombreEmpleado' => 'required|max:255',
            'apellidoEmpleado' => 'required|max:255',
            'empleadoEmail' => 'required|email|unique:administradores,correo',
            'telefonoEmpleado' => 'required|size:8|regex:/^[267][0-9]{3}-?[0-9]{4}$/'
        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('Administradores/create')->withErrors($validator)->withInput();

        } else {
            // Resto de campos
            $nombre = $request->nombreEmpleado;
            $apellido = $request->apellidoEmpleado;
            $primerLetraNombre = substr($nombre, 0, 1);
            $primerLetraApellido = substr($apellido, 0, 1);
            
            $empleado->idadmin = strtoupper($primerLetraApellido . $primerLetraNombre . mt_rand(100000, 999999));
            $empleado->Nombre = $request->nombreEmpleado;
            $empleado->Apellido = $request->apellidoEmpleado;
            $empleado->Correo = $request->empleadoEmail;
            $empleado->Telefono = $request->telefonoEmpleado;
            $empleado->idempresa = session('user.idempresa');
            $empleado->idrol = 3;
            $pass = rand(100000, 999999);

            $empleado->Pass = password_hash($pass, PASSWORD_DEFAULT);
            Mail::to($empleado->Correo)->send(new passwordEmpleado($pass));
            $empleado->save();
        
            return redirect('Administradores')->with('success', 'El empleado con ID '. $empleado->idadmin .' se ha creado correctamente. Se ha mandado un correo con la contraseña del usuario.');
        }

    }

    public function llenarForm($id)
    {
        // Retrieve the employee data from the database using the ID
        $empleado = Administradore::find($id);
        
        // Pass the employee data to the registration view
        return $this->create($empleado);
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
    public function update(Request $request, string $id)
    {
        $rules = [
            'nombreEmpleado' => 'required',
            'apellidoEmpleado' => 'required',
            'empleadoEmail' => 'required|email',
        ];
        $messages = [
            'required' => 'El campo :attribute es requerido.',
            'email' => 'El campo :attribute debe ser un correo electrónico válido.',
        ];
    
        $this->validate($request, $rules, $messages);
        $empleado = Administradore::findOrFail($id);

        $empleado->Nombre = $request->input('nombreEmpleado');
        $empleado->Apellido = $request->input('apellidoEmpleado');
        $empleado->Correo = $request->input('empleadoEmail');

        $empleado->save();

        return redirect()->route('indexAdministradores')->with('success', 'El empleado con el ID '. $id . ' se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empleado = Administradore::findOrFail($id);
        $empleado->delete();
        return redirect()->back()->with('success', 'El empleado con el ID '. $id . ' eliminado exitosamente');
    }
}
