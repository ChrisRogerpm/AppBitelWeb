<?php

namespace App\Http\Controllers;

use App\Zona;
use Illuminate\Http\Request;
use Response;
use Session;

class ZonaController extends Controller
{
    public function index()
    {
        return view('Zona.index');
    }

    public function RegistrarZona()
    {
        return view('Zona.registro');
    }

    public function EditarZona($id)
    {
        $zona = Zona::findorfail($id);
        return view('Zona.editar',compact('zona'));
    }

    public function GuardarZona(Request $request)
    {

        $this->validate($request,[
           'zona' => 'required',
        ]);

        $zona = new Zona();
        $zona->zona = $request->input('zona');
        $zona->latitud = $request->input('latitud');
        $zona->longitud = $request->input('longitud');
        $zona->estado = 1;
        $zona->save();

        Session::flash('success');

        return back();

    }

    public function ModificarZona(Request $request)
    {
        $this->validate($request,[
            'zona' => 'required',
        ]);

        $id_zona = $request->input('id');

        $zona = Zona::findorfail($id_zona);

        $zona->zona = $request->input('zona');
        $zona->latitud = $request->input('latitud');
        $zona->longitud = $request->input('longitud');
        $zona->estado = $request->input('estado');
        $zona->save();

        Session::flash('success');
        return back();

    }

    public function ListarZonaJson()
    {
        try {
            return datatables()->of(Zona::all())->toJson();
        } catch (\Exception $e) {
        }
    }
}

