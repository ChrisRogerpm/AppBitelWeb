<?php

namespace App\Http\Controllers;

use App\Recarga;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Response;
use Yajra\DataTables\DataTables;

class ReportesController extends Controller
{
    public function ReportexDia()
    {
        $usuarios = User::all();
        return view('Reportes.ReportexDia', compact('usuarios'));
    }

    public function ReportexMes()
    {
        $usuarios = User::all();
        return view('Reportes.ReportexMes', compact('usuarios'));
    }

    public function ReporteRecorridoUsuarioDia()
    {
        $usuarios = User::all();
        return view('Reportes.ReporteRecorridoUsuario', compact('usuarios'));
    }

    public function ViewRecorrido(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $fecha = $request->input('fecha');
        $recorrido = Recarga::RecorridoUsuarioDia($usuario_id, $fecha);

        return view('Reportes.ViewRecorrido', compact('recorrido'));
    }

    public function FiltrarDiasUsuarioRecargas(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $fecha_inicio = $request->input('fec_ini');
        $fecha_fin = $request->input('fec_fin');

        $recargas_filtradas = Recarga::RecargaFiltroDia($usuario_id, $fecha_inicio, $fecha_fin);

        try {
            return DataTables::of($recargas_filtradas)
                ->toJson();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function FiltrarMesUsuarioRecargas(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $mes_entrante = $request->input('mes_id');
        $anio = $request->input('anio');

        $recargas_filtradas = Recarga::RecargaFiltroMes($usuario_id, $mes_entrante,$anio);

        try {
            return DataTables::of($recargas_filtradas)
                ->toJson();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function FiltrarRecorridoUsuarioDia(Request $request)
    {
        $usuario_id = $request->input('usuario_id');
        $fecha = $request->input('fecha');
        $recorrido = Recarga::RecorridoUsuarioDia($usuario_id, $fecha);
        return Response::json($recorrido);
    }
}
