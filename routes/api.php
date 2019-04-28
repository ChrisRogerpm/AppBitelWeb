<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/IniciarSesion','Api\WebServiceController@Login');
Route::post('/EnviarPago','Api\WebServiceController@EnviarPago');
Route::post('/SubidaImagen','Api\WebServiceController@ProbarsubidaImagen');
Route::post('/BuscarCodigoPDV','Api\WebServiceController@BuscarCodigoPDV');
Route::post('/ResetearPassword','Api\WebServiceController@ResetearPasswordAPK');

Route::post('/GenerarGPS','Api\WebServiceController@GenerarArchivoUsuarioGPS');