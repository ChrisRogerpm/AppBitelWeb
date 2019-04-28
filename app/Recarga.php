<?php

namespace App;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Recarga extends Model
{
    protected $fillable = ['punto_venta_id', 'usuario_id', 'imagen_adjunta', 'monto', 'latitud', 'longitud'];

    protected $dates = ['created_at', 'updated_at'];

    public static function ListaRecargasJson()
    {
        $fecha_actual_inicial = Carbon::today()->startOfDay();
        $fecha_actual_final = Carbon::today()->endOfDay();
        return Recarga::whereBetween('created_at', array($fecha_actual_inicial, $fecha_actual_final))->take(1000)->get();
    }

    public static function ListaBusquedaRecargasJson($fecha_ini, $fecha_fin)
    {
        $fechaInicio = Carbon::parse($fecha_ini);
        $fechaFin = Carbon::parse($fecha_fin);

        return DB::table('recargas as r')
            ->select('r.id', 'p.nombre_punto_venta', 'u.nombre', 'r.monto', 'r.created_at')
            ->join('punto_ventas as p', 'p.id', 'r.punto_venta_id')
            ->join('users as u', 'u.id', 'r.usuario_id')
            ->whereBetween('r.created_at', array($fechaInicio, $fechaFin))
            ->get();
    }

    public static function RecargaDetalle($id)
    {
        return DB::table('recargas as r')
            ->select('r.id', 'p.nombre_punto_venta', 'u.nombre', 'u.apellido', 'r.monto', 'r.imagen_adjunta', 'r.created_at',
                'p.latitud as latitud_pdv', 'p.longitud as longitud_pdv', 'r.latitud as latitud_r', 'r.longitud as longitud_r')
            ->join('punto_ventas as p', 'p.id', 'r.punto_venta_id')
            ->join('users as u', 'u.id', 'r.usuario_id')
            ->where('r.id', $id)
            ->first();
    }

    public static function RecargaFiltroDia($id_usuario, $fecha_inicio, $fecha_fin)
    {
        $fec_ini = Carbon::parse($fecha_inicio)->startOfDay();
        $fec_fin = Carbon::parse($fecha_fin)->endOfDay();

        return DB::table('recargas as r')
            ->select('r.id', 'p.nombre_punto_venta', 'r.monto', 'r.imagen_adjunta', 'r.created_at',
                'r.latitud as latitud_r', 'r.longitud as longitud_r')
            ->join('punto_ventas as p', 'p.id', 'r.punto_venta_id')
            ->join('users as u', 'u.id', 'r.usuario_id')
            ->where('r.usuario_id', $id_usuario)
            ->whereBetween('r.created_at', array($fec_ini, $fec_fin))
            ->get();

    }

    public static function RecargaFiltroMes($id_usuario, $mes_id,$anio)
    {
        return DB::table('recargas as r')
            ->select('r.id', 'p.nombre_punto_venta', 'r.monto', 'r.imagen_adjunta', 'r.created_at',
                'r.latitud as latitud_r', 'r.longitud as longitud_r')
            ->join('punto_ventas as p', 'p.id', 'r.punto_venta_id')
            ->join('users as u', 'u.id', 'r.usuario_id')
            ->where('r.usuario_id', $id_usuario)
            ->whereMonth('r.created_at', $mes_id)
            ->whereYear('r.created_at', $anio)
            ->get();
    }

    public static function RecorridoUsuarioDia($id_usuario,$fecha)
    {
        $fec_ini = Carbon::parse($fecha)->startOfDay();
        $fec_fin = Carbon::parse($fecha)->endOfDay();

        return DB::table('recargas as r')
            ->select('r.id', 'p.nombre_punto_venta', 'r.created_at',
                'r.latitud as latitud_r', 'r.longitud as longitud_r')
            ->join('punto_ventas as p', 'p.id', 'r.punto_venta_id')
            ->join('users as u', 'u.id', 'r.usuario_id')
            ->where('r.usuario_id', $id_usuario)
            ->whereBetween('r.created_at', array($fec_ini, $fec_fin))
            ->get();
    }

    public function punto_ventas()
    {
        return $this->belongsTo(PuntoVenta::class, 'punto_venta_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function getCreatedAtAttribute($date)
    {
        return new Date($date);
    }


}
