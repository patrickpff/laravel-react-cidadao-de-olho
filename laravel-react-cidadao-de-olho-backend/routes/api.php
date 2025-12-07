<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SincronizarController;
use App\Http\Controllers\DeputadoController;
use App\Http\Controllers\PartidoController;
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

Route::get('/sincronizar', [SincronizarController::class, 'SincronizarDados']);

Route::group(['prefix' => 'deputado', 'as' => 'deputado.'], function(){
    Route::get('/mais_gastaram', [DeputadoController::class, 'mais_gastaram']);
    Route::get('/completo', [DeputadoController::class, 'completo']);
});

Route::group(['prefix' => 'partido', 'as' => 'partido.'], function(){
    Route::get('/mais_gastaram', [PartidoController::class, 'mais_gastaram']);
    Route::get('/completo', [PartidoController::class, 'completo']);
});