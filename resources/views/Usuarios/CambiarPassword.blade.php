@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="../assets/vendor_components/select2/dist/css/select2.min.css">
@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Cambiar Contraseña</h3>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row">
        <div class="col-lg-12">
            <div class="box">
                <form action="{{route('CambiarPassword')}}" method="post" autocomplete="off">
                    <div class="box-body">
                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Nueva Contraseña</label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 offset-9">
                                <button class="btn btn-primary pull-right btn-block" type="submit">Cambiar contraseña</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@push('Js')

    <script src="../../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="../../assets/vendor_components/select2/dist/js/select2.full.js"></script>
    @routes
    <script src="../js/viewJs/Usuario/UsuarioRegistro.js"></script>

@endpush
