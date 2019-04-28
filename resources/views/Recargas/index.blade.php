@extends('Shared.layout')


@push('Css')
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
    <link rel="stylesheet"
          href="../assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Recargas</h3>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="box">
                    <form class="form-horizontal">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de Inicio:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required="required" class="form-control datepicker_" id="fec_ini">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de Fin:</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" required="required" class="form-control datepicker_" id="fec_fin">
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
    @routes
    <script src="../js/viewJs/Recargas/ListaRecargas.js"></script>
@endpush