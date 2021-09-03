<?php

use App\Http\Controllers\ContractController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});




//Todas las rutas especificadas


######################################## Formulario Agregar Excel
Route::get("agregarExcel",'App\Http\Controllers\ContractController@create');
Route::post('agregarExcel', 'App\Http\Controllers\ContractController@store');


################ Vista de contrato generales.
Route::get('adminTablas', 'App\Http\Controllers\ContractController@index');

##### Vista de tablas por ID
Route::get('verExcel/{id}', 'App\Http\Controllers\ContractController@show');

############### Eliminar Contratos.
Route::get('eliminarContrato/{id}', 'App\Http\Controllers\ContractController@confirmarBaja');
Route::delete('eliminarContrato', 'App\Http\Controllers\ContractController@destroy');