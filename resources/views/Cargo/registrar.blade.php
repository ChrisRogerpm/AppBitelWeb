@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="../assets/vendor_components/select2/dist/css/select2.min.css">
    <link href="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">
@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Registrar Cargo</h3>
        </div>
        <div class="right-title">
            <button type="button" class="btn btn-warning btn_Listar">Listar Cargo</button>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row">
        @if ($errors->any())
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>Corrige los siguientes campos:</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <div class="col-lg-12">
            <div class="box">
                <form action="{{route('Cargos.Guardar')}}" method="post" autocomplete="off">
                    <div class="box-body">
                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label>Cargo</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="cargo">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 offset-9">
                                <button class="btn btn-primary pull-right btn-block" type="submit">Registrar</button>
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
    <script src="../js/viewJs/Cargo/RegistrarCargo.js"></script>
    <script>
        $(document).ready(function () {
            @if(Session::has('success'))
            toastr.success('Se ha registrado éxitosamente', {timeOut: 3000});
            @endif
        });
    </script>
@endpush
