<?php

namespace App\Http\Controllers;

use App\Recarga;
use File;
use http\Env\Response;
use Illuminate\Http\Request;
use Storage;
use Yajra\DataTables\DataTables;

class RecargaController extends Controller
{
    public function index()
    {
        return view('Recargas.index');
    }

    public function detalle($id)
    {

        $recarga_detalle = Recarga::RecargaDetalle($id);
        return view('Recargas.detalle', compact('recarga_detalle'));
    }

    public function BuscarRecargas(Request $request)
    {
        $fec_ini = $request->input('fecha_ini');
        $fec_fin = $request->input('fecha_fin');
        $recargas = Recarga::ListaBusquedaRecargasJson($fec_ini, $fec_fin);
        try {
            return DataTables::of($recargas)
                ->toJson();
        } catch (\Exception $e) {
        }
    }

    public function ListarImagenesRecargas()
    {
        return view('Imagenes.ListarImagenes');
    }

    public function ListarImagenesJson()
    {
        $recargas = Recarga::all();
        return response()->json($recargas);
    }

    public function EliminarImagen(Request $request)
    {
        $id_recarga = $request->input('id_recarga');

        $recarga = Recarga::findorfail($id_recarga);
        $archivo = $recarga->imagen_adjunta;
        $nombre_archivo = public_path() . '/assets/images/' . $archivo;
        File::delete($nombre_archivo);

        $recarga->imagen_adjunta = "";
        $recarga->save();

        return response()->json([
            'data' => true
        ]);
    }


}
