<?php

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
    return view('PaginaInicio.index');
});

Auth::routes();

Route::get('Inicio', 'PuntoVentaController@index')->name('Inicio');
Route::get('RegistroPDV', 'PuntoVentaController@RegistroPuntoVenta')->name('RegistroPDV');
Route::post('GuardarPDV', 'PuntoVentaController@GuardarPuntoVenta')->name('GuardarPuntoVenta');
Route::get('EditarPDV/{id}', 'PuntoVentaController@Editar')->name('EditarPDV');
Route::post('ModificarPDV', 'PuntoVentaController@Modificar')->name('ModificarPDV');

Route::get('Recargas', 'RecargaController@index')->name('Recargas');
Route::get('DetalleRecarga/{id}', 'RecargaController@detalle')->name('Recargas.Detalle');
Route::get('ListarImagenes', 'RecargaController@ListarImagenesRecargas')->name('ListarImagenes');

//Route::get('')

Route::get('ReportesxDia', 'ReportesController@ReportexDia')->name('Reportes.Dia');
Route::get('ReportesxMes', 'ReportesController@ReportexMes')->name('Reportes.Mes');
Route::get('ReporteRecorridoUsuario', 'ReportesController@ReporteRecorridoUsuarioDia')->name('ReporteRecorridoUsuario');
Route::get('ViewRecorridoPartial', 'ReportesController@ViewRecorrido')->name('ViewRecorrido');

Route::get('Zona', 'ZonaController@index')->name('Zona');
Route::get('EditarZona/{id}', 'ZonaController@EditarZona')->name('Zona.Editar');
Route::get('RegistrarZona', 'ZonaController@RegistrarZona')->name('Zona.Registrar');
Route::post('GuardarZona', 'ZonaController@GuardarZona')->name('Zona.Guardar');
Route::post('ModificarZona', 'ZonaController@ModificarZona')->name('Zona.Modificar');

Route::get('Usuarios', 'UsuarioController@index')->name('Usuarios');
Route::get('EditarUsuarios/{id}', 'UsuarioController@EditarUsuario')->name('Usuarios.Editar');
Route::get('RegistrarUsuarios', 'UsuarioController@RegistrarUsuario')->name('Usuarios.Registrar');
Route::post('GuardarUsuarios', 'UsuarioController@GuardarUsuario')->name('Usuarios.Guardar');
Route::post('ModificarUsuarios', 'UsuarioController@ModificarUsuario')->name('Usuarios.Modificar');

Route::get('Cargos', 'CargoController@index')->name('Cargos');
Route::get('EditarCargos/{id}', 'CargoController@EditarCargo')->name('Cargos.Editar');
Route::get('RegistrarCargos', 'CargoController@RegistrarCargo')->name('Cargos.Registrar');
Route::post('GuardarCargos', 'CargoController@GuardarCargo')->name('Cargos.Guardar');
Route::post('ModificarCargos', 'CargoController@ModificarCargo')->name('Cargos.Modificar');

Route::get('CambiarPassword', 'UsuarioController@CambiarPasswordVista')->name('CambiarPassword');

Route::post('ImportarExcel', 'PuntoVentaController@ImportarExcelPDV')->name('ImportarExcel');
Route::post('CambiarPassword', 'UsuarioController@CambiarPassword')->name('CambiarPassword');

//Servicio QR PRINT

//GenerarPDFQR
//Route::get('ImprimirPDVQR','PuntoVentaController@GenerarPDFQR')->name('ImprimirPDVQR');
Route::get('DescargarPDFQR', 'PuntoVentaController@DescargarPDFQR')->name('DescargarPDFQR');

//Servicios

Route::get('servicio/ListarPuntoVenta', 'PuntoVentaController@ListarPuntoVentaJson')->name('ListarPuntoVenta');
Route::get('servicio/ListarZona', 'ZonaController@ListarZonaJson')->name('ListarZona');
Route::post('servicio/BuscarRecargas', 'RecargaController@BuscarRecargas')->name('BuscarRecargas');
Route::post('servicio/FiltrarRecargaxDiaUsuario', 'ReportesController@FiltrarDiasUsuarioRecargas')->name('FiltrarRecargaxDiaUsuario');
Route::post('servicio/FiltrarRecargaxMesUsuario', 'ReportesController@FiltrarMesUsuarioRecargas')->name('FiltrarRecargaxMesUsuario');
Route::get('servicio/FiltrarRecorridoUsuarioDia', 'ReportesController@FiltrarRecorridoUsuarioDia')->name('FiltrarRecorridoUsuarioDia');
Route::get('servicio/ListarUsuarios', 'UsuarioController@ListarUsuariosJson')->name('ListarUsuarios');
Route::get('servicio/ListarCargos', 'CargoController@ListarCargosJson')->name('ListarCargos');
Route::get('servicio/ListarRecargaImagen', 'RecargaController@ListarImagenesJson')->name('ListarImagenesJson');
Route::post('servicio/EliminarImagen', 'RecargaController@EliminarImagen')->name('EliminarImagen');

Route::get('ListarArchivosGeneradosUsuario','UsuarioController@ListarArchivosGeneradosUsuarioVista')->name('ListarArchivosGeneradosUsuario');
Route::post('servicio/ListarArchivosGenerados','UsuarioController@ListarArchivosGeneradosUsuarioJson');