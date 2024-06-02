<?php

use App\Http\Controllers\CuponesControllerApi;
use App\Http\Controllers\validarEmpleadoAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Rutas de la API para cangear los cupones
Route::get('/cupones',[CuponesControllerApi::class,'index']);
Route::get('/cupones/{id}',[CuponesControllerApi::class,'show']);
Route::put('/cupones/{id}',[CuponesControllerApi::class,'update']);


//Rutas de la API para validar el correo del empleado
Route::get('/empleado',[validarEmpleadoAPI::class,'index']);
Route::get('/empleado/{email}',[validarEmpleadoAPI::class,'show']);
