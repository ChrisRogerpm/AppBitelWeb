<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;
use Session;

class CargoController extends Controller
{
    public function index()
    {
        return view('Cargo.index');
    }

    public function RegistrarCargo()
    {
        return view('Cargo.registrar');
    }

    public function EditarCargo($id)
    {
        $cargo = Cargo::findorfail($id);
        return view('Cargo.editar', compact('cargo'));
    }

    public function ModificarCargo(Request $request)
    {
        $this->validate($request, [
            'cargo' => 'required',
            'estado' => 'required|not_in:S'
        ]);
        $cargo_id = $request->input('id');

        $cargo = Cargo::findorfail($cargo_id);
        $cargo->cargo = $request->input('cargo');
        $cargo->estado = $request->input('estado');
        $cargo->save();
        Session::flash('success');
        return back();
    }

    public function GuardarCargo(Request $request)
    {
        $this->validate($request, [
            'cargo' => 'required',
        ]);

        $cargo = new Cargo();
        $cargo->cargo = $request->input('cargo');
        $cargo->estado = 1;
        $cargo->save();
        Session::flash('success');
        return back();
    }

    public function ListarCargosJson()
    {
        try {
            return datatables()->of(Cargo::all())->toJson();
        } catch (\Exception $e) {
        }
    }
}
