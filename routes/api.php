<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios','App\Http\Controllers\UsuarioController@index');
Route::post('/usuarios','App\Http\Controllers\UsuarioController@store');
Route::put('/usuarios','App\Http\Controllers\UsuarioController@update');
Route::delete('/usuarios/{id}','App\Http\Controllers\UsuarioController@destroy');
Route::get('/usuarios/{id}','App\Http\Controllers\UsuarioController@show');
Route::get('/empresa','App\Http\Controllers\EmpresaController@index');
Route::post('/empresa','App\Http\Controllers\EmpresaController@store');
Route::put('/empresa','App\Http\Controllers\EmpresaController@update');
Route::delete('/empresa/{id}','App\Http\Controllers\EmpresaController@destroy');
Route::get('/empresa/{id}','App\Http\Controllers\EmpresaController@show');
