<?php

namespace App\Http\Controllers;

use App\ArchivogpsUsuario;
use App\Cargo;
use App\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Route;
use Session;
use Yajra\DataTables\DataTables;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('Usuarios.index');
    }

    public function RegistrarUsuario()
    {
        $cargos = Cargo::all();
        return view('Usuarios.registrar', compact('cargos'));
    }

    public function GuardarUsuario(Request $request)
    {
        $this->validate($request, array(
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => "required|unique:users,dni",
            'celular' => 'required',
            'cargo_id' => 'required',
        ));

        $usuario = new User();
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->dni = $request->input('dni');
        $usuario->celular = $request->input('celular');
        $usuario->cargo_id = $request->input('cargo_id');
        $usuario->password = bcrypt($request->input('dni'));
        $usuario->estado = 1;
        $usuario->save();
        Session::flash('success');
        return back();
    }

    public function EditarUsuario($id)
    {
        $usuarios = User::findorfail($id);
        $cargos = Cargo::all();
        return view('Usuarios.editar', compact('usuarios', 'cargos'));
    }

    public function ModificarUsuario(Request $request)
    {
        $this->validate($request, array(
            'nombre' => 'required',
            'apellido' => 'required',
            'dni' => "required|unique:users,dni," . $request->input('id'),
            'celular' => 'required',
            'cargo_id' => 'required',
            'estado' => 'required'
        ));

        if (empty($request->input('reiniciar')) || $request->input('reiniciar') == 0) {
            $id_usuario = $request->input('id');
            $usuario = User::findorfail($id_usuario);
            $usuario->nombre = $request->input('nombre');
            $usuario->apellido = $request->input('apellido');
            $usuario->dni = $request->input('dni');
            $usuario->celular = $request->input('celular');
            $usuario->cargo_id = $request->input('cargo_id');
            $usuario->estado = $request->input('estado');
            $usuario->save();
            Session::flash('success');
            return back();
        } else {
            $id_usuario = $request->input('id');
            $usuario = User::findorfail($id_usuario);
            $usuario->nombre = $request->input('nombre');
            $usuario->apellido = $request->input('apellido');
            $usuario->dni = $request->input('dni');
            $usuario->celular = $request->input('celular');
            $usuario->cargo_id = $request->input('cargo_id');
            $usuario->password = bcrypt($request->input('dni'));
            $usuario->estado = $request->input('estado');
            $usuario->save();
            Session::flash('success');
            return back();
        }
    }

    public function ListarUsuariosJson()
    {
        $usuarios = User::ListarUsuarios();
        try {
            return DataTables::of($usuarios)
                ->toJson();
        } catch (\Exception $e) {
        }
    }

    public function CambiarPassword(Request $request)
    {
        $usuario_id = Auth::user()->id;
        $usuario = User::findorfail($usuario_id);
        $usuario->password = bcrypt($request->input('password'));
        $usuario->save();
        return back();
    }

    public function ListarArchivosGeneradosUsuarioVista()
    {
        $usuarios = User::all();
        return view('ArchivosGeneradosUsuario.ArchivosGeneradosUsuario', compact('usuarios'));
    }

    public function ListarArchivosGeneradosUsuarioJson(Request $request)
    {
        $id_usuario = $request->input('id');
        $fecha_inicio = $request->input('fec_ini');
        $fecha_fin = $request->input('fec_fin');

        $fec_ini = Carbon::parse($fecha_inicio)->startOfDay();
        $fec_fin = Carbon::parse($fecha_fin)->endOfDay();

        $ArchivosGenerados = DB::table('archivogps_usuarios as r')
            ->select('r.*','u.nombre','u.apellido','u.dni')
            ->join('users as u','u.id','r.UsuarioId')
            ->where('r.UsuarioId', $id_usuario)
            ->whereBetween('r.created_at', array($fec_ini, $fec_fin))
            ->get();

        return response()->json(['data' => $ArchivosGenerados]);
    }

    public function CambiarPasswordVista()
    {
        return view('Usuarios.CambiarPassword');
    }
}
