<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nombre', 'apellido', 'dni', 'celular', 'cargo_id', 'password', 'estado'
    ];


    public static function ListarUsuarios()
    {
        return DB::table('users as u')
            ->select('u.id','u.nombre','u.apellido','c.cargo','u.dni','u.celular')
            ->join('cargos as c','c.id','u.cargo_id')
            ->orderBy('u.id','DESC')
            ->get();
    }

}
