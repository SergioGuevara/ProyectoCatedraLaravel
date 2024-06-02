<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Oferta;
use App\Models\Administradore;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\passwordEmpleado;

class OfertasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $viewBag=array();       
        $viewBag['ofertas']=Oferta::all();
        
        return view('Ofertas.index',$viewBag);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas=DB::table('empresas')->select('idempresa', 'nombre')->get();

        return view('Ofertas.create', ['empresas' => $empresas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $oferta = new Oferta;


        $validator = Validator::make($request->all(), [
            'titulo_oferta' => 'required|max:255',
            'descripcion_oferta' => 'required|max:255',
            
            'precio_normal' => 'required|numeric',
            'precio_oferta' => 'required|numeric|min:1|oferta_menor_precio_normal:precio_normal',
            'precio_cupon' => 'required|numeric|cupon_menor_precio_normal:precio_normal|cupon_menor_precio_oferta:precio_oferta',
            'fecha_inicio' => 'required|date',
            'fecha_final' => 'required|date|after:fecha_inicio',
            'fecha_caducidad' => 'required|date|after:fecha_final',
            'cantida_cupones' => 'required|numeric',
            'imagen_oferta' => 'required|mimes:jpg,png,pdf|max:2048',
        ]);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('/Ofertas/create')->withErrors($validator)->withInput();

        } else {

            $file = $request->file('imagen_oferta');
            $destinaionPath = 'img/';
            $filename = time() . '-' . $file->getClientOriginalName();
            $uploadSuccess = $request->file("imagen_oferta")->move($destinaionPath, $filename);

            // Resto de campos
            $oferta->idestado = 4;
            $oferta->titulo = $request->titulo_oferta;
            $oferta->descripcion = $request->descripcion_oferta;
            $oferta->imagen = $filename;
            $oferta->precio_regular = $request->precio_normal;
            $oferta->precio_oferta = $request->precio_cupon;
            $oferta->precio_de_compra = $request->precio_oferta;
            $oferta->fecha_inicio = $request->fecha_inicio;
            $oferta->fecha_final = $request->fecha_final;
            $oferta->fecha_caducidad = $request->fecha_caducidad;
            $oferta->cantidad_cupones = $request->cantida_cupones;
            $oferta->idempresa = session('user.idempresa');
            $oferta->save();
        
            return redirect('/Ofertas')->with('success', 'La oferta con el titulo '. $oferta->titulo .' se ha creado correctamente');
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
