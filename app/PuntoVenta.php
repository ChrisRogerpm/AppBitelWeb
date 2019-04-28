<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PuntoVenta extends Model
{
    protected $fillable = ['codigo_pdv', 'nombre_punto_venta', 'agente_venta', 'recarga',
        'direccion', 'dni', 'numero_referencia', 'latitud', 'longitud'];

    public static function ValidarCodigo($codigo)
    {
        return PuntoVenta::where('codigo_pdv', $codigo)->get();
    }

    public static function CodigoExistente($codigopdv)
    {
        return PuntoVenta::where('codigo_pdv', '=', $codigopdv)->count();
    }

    public static function ActualizarMonto($codigo, $monto)
    {
        return PuntoVenta::where('codigo_pdv', $codigo)
            ->update([
                'recarga' => $monto
            ]);
    }
}
