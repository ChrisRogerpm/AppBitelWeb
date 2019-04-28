<?php

namespace App\Http\Controllers;

use App;
use App\PuntoVenta;
use App\Zona;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PuntoVentaController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        $pdv = PuntoVenta::all();
        return view('PuntosVenta.index', compact('pdv'));
    }

    public function Editar($id)
    {
        $zona = Zona::all();
        $puntoventa = PuntoVenta::findorfail($id);
        $codigoQR = QrCode::format('png')->size(500)->color(40, 40, 40)->generate($puntoventa->nombre_punto_venta . '-' . $puntoventa->id . '-' . $puntoventa->id);
        return view('PuntosVenta.editar', compact('puntoventa', 'zona', 'codigoQR'));
    }

    public function Modificar(Request $request)
    {

        $this->validate($request, [
            'codigo_pdv' => 'required|unique:punto_ventas,codigo_pdv,' . $request->input('id'),
            'recarga' => 'required',
        ]);

        $codigopdv = $request->input('codigo_pdv');
        $id_pdv = $request->input('id');
        $recarga_entrante = $request->input('recarga');
        $recarga_registrada = PuntoVenta::findorfail($id_pdv)->recarga;

        if (PuntoVenta::CodigoExistente($codigopdv) > 1) {
            Session::flash('existe');
            return back();
        } else {
            if ($recarga_entrante != $recarga_registrada) {

                $pdv = PuntoVenta::findorfail($id_pdv);
                $pdv->zona = $request->input('zona');
                $pdv->codigo_pdv = $request->input('codigo_pdv');
                $pdv->nombre_punto_venta = $request->input('nombre_punto_venta');
                $pdv->agente_venta = $request->input('agente_venta');
                $pdv->recarga = $request->input('recarga');
                $pdv->direccion = $request->input('direccion');
                $pdv->numero_referencia = $request->input('numero_referencia');
                $pdv->latitud = $request->input('latitud');
                $pdv->longitud = $request->input('longitud');
                $pdv->save();
                Session::flash('success');
                return back();
            } else {
                $pdv = PuntoVenta::findorfail($id_pdv);
                $pdv->zona = $request->input('zona');
                $pdv->codigo_pdv = $request->input('codigo_pdv');
                $pdv->nombre_punto_venta = $request->input('nombre_punto_venta');
                $pdv->agente_venta = $request->input('agente_venta');
                $pdv->recarga = $request->input('recarga');
                $pdv->direccion = $request->input('direccion');
                $pdv->numero_referencia = $request->input('numero_referencia');
                $pdv->latitud = $request->input('latitud');
                $pdv->longitud = $request->input('longitud');
                $pdv->timestamps = false;
                $pdv->save();
                Session::flash('success');

                return back();
            }
        }

    }

    public function ListarPuntoVentaJson()
    {
        try {
            return datatables()->of(PuntoVenta::all())->toJson();
        } catch (\Exception $e) {
        }
    }

    public function RegistroPuntoVenta()
    {
        $zona = Zona::all();
        return view('PuntosVenta.registro', compact('zona'));
    }

    public function GuardarPuntoVenta(Request $request)
    {

        $this->validate($request, [
            'codigo_pdv' => 'required',
            'recarga' => 'required',
        ]);

        $codigopdv = $request->input('codigo_pdv');

        if (PuntoVenta::CodigoExistente($codigopdv) != 0) {
            Session::flash('existe');
            return back();
        } else {
            $pdv = new PuntoVenta();
            $pdv->zona = $request->input('zona');
            $pdv->codigo_pdv = $request->input('codigo_pdv');
            $pdv->nombre_punto_venta = $request->input('nombre_punto_venta');
            $pdv->agente_venta = $request->input('agente_venta');
            $pdv->recarga = $request->input('recarga');
            $pdv->direccion = $request->input('direccion');
            $pdv->numero_referencia = $request->input('numero_referencia');
            $pdv->latitud = $request->input('latitud');
            $pdv->longitud = $request->input('longitud');
            $pdv->save();

            Session::flash('success');
            return back();
        }
    }

    public function ImportarExcelPDV(Request $request)
    {
        $request->validate([
            'import_excel' => 'required|mimes:xls,xlsx',
        ]);
        $path = $request->file('import_excel')->getRealPath();
        $data = Excel::load($path)->get();
        $header = $data->first()->keys()->toArray();
        $header_array = [];
        $result;

        $arrayelementos = [];
        for ($i = 0; $i < count($data); $i++) {
            $index = 0;
            $arrayelementos = [];
            $headers = [];
            $valores = [];
            foreach ($header as $h) {
                $key = $h;
                $valor = $data[$i]->$key;
                array_push($headers, $key);
                array_push($valores, $valor);
                $index++;
            }
            $result = array_combine($headers,$valores);
            $header_array[] = [$result];
        }
        return response()->json(['data' => $header_array]);

        // if ($data->count()) {
        //     for ($i = 0; $i < count($data); $i++) {
        //         if ($data[$i]->codigo_pdv == null || $data[$i]->recarga_actual == null) {

        //         } else {
        //             if (count(PuntoVenta::ValidarCodigo($data[$i]->codigo_pdv)) != 0) {
        //                 PuntoVenta::ActualizarMonto($data[$i]->codigo_pdv, $data[$i]->recarga_actual);
        //             } else {
        //                 $suc = new PuntoVenta();
        //                 $suc->zona = $data[$i]->zona;
        //                 $suc->codigo_pdv = $data[$i]->codigo_pdv;
        //                 $suc->nombre_punto_venta = $data[$i]->nombre_pdv;
        //                 $suc->agente_venta = $data[$i]->agente_de_ventas;
        //                 $suc->recarga = $data[$i]->recarga_actual;
        //                 $suc->direccion = $data[$i]->direccion;
        //                 $suc->dni = $data[$i]->dni;
        //                 $suc->numero_referencia = $data[$i]->numero_referencia;
        //                 $suc->latitud = $data[$i]->latitud;
        //                 $suc->longitud = $data[$i]->longitud;

        //                 $suc->save();

        //                 if ($data[$i]->zona == null) {

        //                 } else {
        //                     if (Zona::ValidarZona($data[$i]->zona) > 0) {
        //                     } else {
        //                         $zona = new Zona();
        //                         $zona->zona = $data[$i]->zona;
        //                         $zona->estado = 1;
        //                         $zona->save();
        //                     }
        //                 }
        //             }
        //         }
        //     }
        // }

        // Session::flash('success');

        // return back();
    }

    public function GenerarPDFQR()
    {
        $punto_venta = PuntoVenta::all();
        return view('PuntosVenta.ListarPDV_QR', compact('punto_venta'));
    }

    public function DescargarPDFQR()
    {
        $punto_venta = PuntoVenta::all();
        $pdf = PDF::loadView('PuntosVenta.ListarPDV_QR', compact('punto_venta'));
        return $pdf->download('Listado de Puntos de Venta - QR CODE.pdf');
    }
}
