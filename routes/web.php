<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RubrosController;
use App\Http\Controllers\GestionClientesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmpresasController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\OfertasController;
use App\Http\middleware\AuthCheck;
use App\Http\middleware\OnlyAdmin;

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

Route::resource('empresas', EmpresasController::class)->middleware(OnlyAdmin::class);
Route::resource('rubros', RubrosController::class)->middleware(OnlyAdmin::class);
Route::resource('Ofertas', OfertasController::class)->middleware(AuthCheck::class);

Route::post('/empresas', [EmpresasController::class,'store'])->name('empresas.store')->middleware(OnlyAdmin::class);
Route::delete('/empresas/{idempresa}', [EmpresasController::class,'destroy'])->name('empresas.destroy')->middleware(OnlyAdmin::class);
Route::put('/empresas/{idempresa}', [EmpresasController::class,'update'])->name('empresas.update')->middleware(OnlyAdmin::class);

Route::post('/rubros', [RubrosController::class,'store'])->name('rubros.store')->middleware(OnlyAdmin::class);
Route::delete('/rubros/{idrubro}', [RubrosController::class,'destroy'])->name('rubros.destroy')->middleware(OnlyAdmin::class);
Route::put('/rubros/{idrubro}', [RubrosController::class,'update'])->name('rubro.update')->middleware(OnlyAdmin::class);

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'check'])->name('login.check');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');




Route::controller(AdministradorController::class)->group(function ()
{
    Route::get('/Administradores', 'index')->name('indexAdministradores')->middleware(AuthCheck::class);
    Route::get('/Administradores/create','create')->name('createAdministradores')->middleware(AuthCheck::class);
    Route::put('/Administradores/store','store')->name('storeAdministradores')->middleware(AuthCheck::class);
    Route::put('/Administradores/{id}','update')->name('updateAdministradores')->middleware(AuthCheck::class);
    Route::get('/Administradores/update/{id}','llenarForm')->name('FormAdministradores')->middleware(AuthCheck::class);   
    Route::get('/Administradores/elminar/{id}', 'destroy')->name('destroyAdministradores')->middleware(AuthCheck::class); 
});

Route::controller(OfertasController::class)->group(function ()
{
    Route::get('/Ofertas', 'index')->name('indexOfertas')->middleware(AuthCheck::class);
    Route::get('/Ofertas/create','create')->name('createOfertas')->middleware(AuthCheck::class);
    Route::post('/Ofertas/store','store')->name('storeOfertas')->middleware(AuthCheck::class);
});
