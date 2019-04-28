@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
    <link rel="stylesheet"
          href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/vendor_components/select2/dist/css/select2.min.css">
@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Recargas realiazadas por Usuarios x Mes</h3>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="box">
                    <form class="form-horizontal" autocomplete="off">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Seleccione Usuario:</label>
                                        <div class="input-group date">
                                            <select id="cboUsuario" class="form-control select2">
                                                <option value="">--Seleccione--</option>
                                                @foreach($usuarios as $usu)
                                                    <option value="{{$usu->id}}">{{$usu->nombre.' '.$usu->apellido}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Elija Mes:</label>
                                        <div class="input-group date">

                                            <select class="form-control select2" id="cboMes">
                                                <option value="">--Seleccione Mes--</option>
                                                <option value="1">Enero</option>
                                                <option value="2">Febrero</option>
                                                <option value="3">Marzo</option>
                                                <option value="4">Abril</option>
                                                <option value="5">Mayo</option>
                                                <option value="6">Junio</option>
                                                <option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Ingrese un año:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control" name="anio" id="txtanio">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="reset" class="btn btn-success">Resetear</button>
                            <button type="button" id="btnBuscar" class="btn btn-primary pull-right"><i
                                        class="fa fa-search"></i> Buscar
                            </button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12" id="contenedor-tabla"></div>
    </div>
@stop


@push('Js')
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="../js/pages/data-table.js"></script>
    <script src="../assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/vendor_components/select2/dist/js/select2.full.js"></script>
    @routes
    <script src="../js/viewJs/Reportes/ReportexMes.js"></script>
@endpush