<?php

namespace App\Http\Controllers\Api;

use App\ArchivogpsUsuario;
use App\PuntoVenta;
use App\Recarga;
use App\User;
use Auth;
use Carbon\Carbon;
use File;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;

class WebServiceController extends Controller
{
    public function Login(Request $request)
    {
        if (Auth::attempt(['dni' => $request->input('dni'), 'password' => $request->input('password')])) {
            $usuario_autenticado = Auth::user();
            return Response::json($usuario_autenticado);
        }
    }

    public function ResetearPasswordAPK(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $usuario = User::findorfail($usuario_id);
        $usuario->password = bcrypt($usuario->dni);
        $usuario->save();
        echo 'success';
    }

    public function EnviarPago(Request $request)
    {
        $user_id = $request->input('id_usuario');
        $monto = $request->input('monto');
        $latitud = $request->input('latitud');
        $longitud = $request->input('longitud');
        $sucursal_id = $request->input('sucursal_id');
        $foto = $request->input('foto');
        $respuesta = false;

        $valido = User::findorfail($user_id)->estado;

        try {
            if ($valido != 0) {
                if (empty($foto)) {
                    $recarga = new Recarga();
                    $recarga->punto_venta_id = $sucursal_id;
                    $recarga->usuario_id = $user_id;
                    $recarga->imagen_adjunta = "";
                    $recarga->monto = $monto;
                    $recarga->latitud = $latitud;
                    $recarga->longitud = $longitud;
                    $recarga->save();
                    $respuesta = true;
                    return response()->json(['respuesta' => $respuesta]);
                } else {
                    $foto = str_replace('data:image/png;base64,', '', $foto);
                    $foto = str_replace(' ', '+', $foto);
                    $fotoNombre = str_random(10) . '.' . 'png';
                    \Storage::disk('imagenes')->put($fotoNombre, base64_decode($foto));
                    $recarga = new Recarga();
                    $recarga->punto_venta_id = $sucursal_id;
                    $recarga->usuario_id = $user_id;
                    $recarga->imagen_adjunta = $fotoNombre;
                    $recarga->monto = $monto;
                    $recarga->latitud = $latitud;
                    $recarga->longitud = $longitud;
                    $recarga->save();
                    $respuesta = true;
                }
            } else {
                $respuesta = false;
            }
        } catch (QueryException $ex) {
            $respuesta = false;
        }

        return response()->json(['respuesta' => $respuesta]);

    }


    public function BuscarCodigoPDV(Request $request)
    {
        $codigopdv = $request->input('codigo_pdv');
        $IdUsuario = $request->input('IdUsuario');

        $valido = User::findorfail($IdUsuario)->estado;

        if ($valido != 0) {
            $pdv = PuntoVenta::where('codigo_pdv', $codigopdv)->first();
            return Response::json($pdv);
        }

    }

    public function GenerarArchivoUsuarioGPS(Request $request)
    {
        try {
            $CadenaHash = (rand());
//            $NombreArchivo = $request->input('NombreArchivo') . today()->toDateString() . $CadenaHash . '.txt';
            $NombreArchivo = $request->input('NombreArchivo') . '.txt';
            $IdUsuario = $request->input('Id');
            $Usuario = User::find($IdUsuario);
            $NombreUsuario = $Usuario->nombre . $Usuario->apellido . $Usuario->dni;

            $FechaActual = Carbon::now();
            $Latitud = $request->input('Latitud');
            $Longitud = $request->input('Longitud');

            $Direccion = 'assets/Files/Archivos/';
            $Ruta = $Direccion . $NombreUsuario;
            if (File::exists($Ruta)) {
                if (File::exists($Ruta . '/' . $NombreArchivo)) {
                    File::append($Ruta . '/' . $NombreArchivo, $FechaActual . '/' . $Latitud . '/' . $Longitud . "\n");
//                    ArchivogpsUsuario::GuardarArchivo($IdUsuario, $NombreArchivo);
                    $respuesta = true;
                } else {
                    File::copy('assets/Files/Archivos/ArchivoDemo.txt', $Ruta . '/' . $NombreArchivo);
                    File::put($Ruta . '/' . $NombreArchivo, $FechaActual . '/' . $Latitud . '/' . $Longitud . "\n");
                    ArchivogpsUsuario::GuardarArchivo($IdUsuario, $NombreArchivo);
                    $respuesta = true;
                }
            } else {
                File::makeDirectory($Ruta);
                if (File::exists($Ruta . '/' . $NombreArchivo)) {
                    File::append($Ruta . '/' . $NombreArchivo, $FechaActual . '/' . $Latitud . '/' . $Longitud . "\n");
                    ArchivogpsUsuario::GuardarArchivo($IdUsuario, $NombreArchivo);
                    $respuesta = true;
                } else {
                    File::copy('assets/Files/Archivos/ArchivoDemo.txt', $Ruta . '/' . $NombreArchivo);
                    File::put($Ruta . '/' . $NombreArchivo, $FechaActual . '/' . $Latitud . '/' . $Longitud . "\n");
                    ArchivogpsUsuario::GuardarArchivo($IdUsuario, $NombreArchivo);
                    $respuesta = true;
                }
            }

        } catch (\Exception $ex) {
            $respuesta = false;
        }

        return response()->json(['respuesta' => $respuesta]);
    }
}
