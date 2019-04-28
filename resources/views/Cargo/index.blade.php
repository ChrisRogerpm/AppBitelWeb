@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
@endpush


@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Cargos</h3>
        </div>
        <div class="right-title">
            <button type="button" class="btn btn-warning btnNuevo">Registrar Cargo</button>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row">
        <div class="col-lg-12" id="contenedor-tabla">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="TablaCargo" class="table table-bordered table-striped"
                               style="width:100%">
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
@stop

@push('Js')
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="../js/pages/data-table.js"></script>
    @routes
    <script src="../js/viewJs/Cargo/ListarCargo.js"></script>
@endpush
