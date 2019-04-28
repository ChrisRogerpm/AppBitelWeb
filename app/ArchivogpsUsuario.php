<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArchivogpsUsuario extends Model
{
    protected $fillable = ['UsuarioId','NombreArchivo'];

    public static function GuardarArchivo($IdUsuario, string $NombreArchivo)
    {
        $archivo = new ArchivogpsUsuario();
        $archivo->UsuarioId = $IdUsuario;
        $archivo->NombreArchivo = $NombreArchivo;
        $archivo->save();
    }
}
