<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RubrosController;
use App\Http\Controllers\GestionClientesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::controller(GestionClientesController::class)->group(function ()
{
    Route::get('/clientes','index')->name('index');
    //Route::get('/editoriales/create','create');
    //Route::get('/editoriales/details/{id}','details')->name('detalles');
});

Route::resource('empresas', EmpresasController::class);
Route::resource('rubros', RubrosController::class);



Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'check'])->name('login.check');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
/*Route::controller(EmpresasController::class)->group(function ()
{
    Route::get('/empresas','index')->name('index');
    //Route::get('/empresas/create','create');
    //Route::get('/editoriales/details/{id}','details')->name('detalles');
});*/
