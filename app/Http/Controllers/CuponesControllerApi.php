<?php

namespace App\Http\Controllers;

use App\Models\Cupone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CuponesControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cupones=DB::table('cupones')->get();
        return $cupones;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Cupone $cupones, $id)
    {            
        $cupones=DB::table('ofertas')
        ->join('cupones','cupones.idoferta','=','ofertas.idoferta')
        ->join('estados_cupones','estados_cupones.idestado','=','cupones.idestado')
        ->select('cupones.idcupon','titulo','precio_regular','precio_oferta','fecha_caducidad','descripcion','estados_cupones.estado')
        ->where('idcupon',$id)
        ->get();
        return $cupones;
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
    public function update(Request $request, $id)
    {
        //
        $cupoes  = ['idcupon'=>$id,
        'idestado'=>$request->idestado];
        DB::update('UPDATE cupones SET idestado=:idestado
        where idcupon=:idcupon', $cupoes);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
