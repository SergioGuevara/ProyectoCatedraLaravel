<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administradore;
use Illuminate\Support\Facades\DB;


class validarEmpleadoAPI extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=DB::table('administradores')
        ->select('Correo','Pass')
        ->where('idrol','=','3')
        ->get();
        return $user;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        $user=DB::table('administradores')
        ->select('Correo','Pass')
        ->where('Correo','=',$email)
        ->where('idrol','=','3')
        //->where('Correo',$email)
        ->get();
        return $user;
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
