@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
@endpush


@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Punto de Venta</h3>
        </div>
        <div class="right-title">
            <button type="button" class="btn btn-warning btn_nuevo_pdv">Registrar Nuevo PDV</button>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Importar Excel
                PDV
            </button>
            <button type="button" class="btn btn-success btnImprimir">Imprimir PDV</button>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row">
        @if(Session::has('success'))
            <input type="hidden" id="message_flash" value="{!! session('Importar') !!}">
        @endif
        <div class="col-lg-12" id="contenedor-tabla">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="TablaPuntoVenta" class="table table-bordered table-striped"
                               style="width:100%">
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Importar PDV - Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('ImportarExcel')}}" id="importar_excel_form" method="post"
                      enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Seleccione archivo:</label>
                                    <div class="input-group">
                                        <input type="file" name="import_excel" class="form-control">
                                        <a href="../assets/Files/FormatoDemo.xlsx" class="btn btn-warning"
                                           data-toggle="tooltip" data-placement="top" title="Formato Excel"><i
                                                    class="fa fa-info-circle"></i></a>
                                    </div>
                                    <small class="form-text text-muted">Archivos soportados xls, xlsx.</small>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Importar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('Js')
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="../js/pages/data-table.js"></script>
    @routes
    <script src="../js/viewJs/PuntoVenta/PuntoVenta.js"></script>
    <script>
        $(document).ready(function () {
            @if(Session::has('success'))
            toastr.success('Se importo satisfactoriamente', 'Mensaje Servidor', {timeOut: 3000});
            @endif
            @if(Session::has('error'))
            toastr.error('Ocurrior un error inesperado, revise el archivo a importar', 'Mensaje Servidor', {timeOut: 3000});
            @endif
        });
    </script>
@endpush
