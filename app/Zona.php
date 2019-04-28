<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $fillable = ['zona', 'latitud', 'longitud', 'estado'];

    public static function ValidarZona($zona)
    {
        return Zona::where('zona', '=', $zona)->count();
    }


}
