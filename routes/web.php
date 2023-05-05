<?php

use App\Http\Controllers\RubrosController;
use Illuminate\Support\Facades\Route;

/*
|------------------------------------------php --------------------------------
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
Route::get('/hello/{nombre}', function($nombre){
    return "Hola $nombre";
});
Route::controller(RubrosController::class)->group(function ()
{
Route::get('/rubros','index')->name('index');
//Route::get('/editoriales/create','create');
//Route::get('/editoriales/details/{id}','details')->name('detalles');
}
);