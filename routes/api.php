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

Route::post('entrega/cadastrar', 'App\Http\Controllers\EntregaController@cadastrar');
Route::get('entrega/obter-proxima', 'App\Http\Controllers\EntregaController@obterProxima');
Route::post('entrega/atualizar-status/{id}', 'App\Http\Controllers\EntregaController@atualizarStatus');
Route::delete('entrega/remover/{id}', 'App\Http\Controllers\EntregaController@remover');