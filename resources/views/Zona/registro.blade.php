@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="../assets/vendor_components/select2/dist/css/select2.min.css">
    <link href="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.css" rel="stylesheet">
@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Registrar Zona</h3>
        </div>
        <div class="right-title">
            <button type="button" class="btn btn-warning btn_Listar">Lista Zonas</button>
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
                <form action="{{route('Zona.Guardar')}}" method="post" autocomplete="off">
                    <div class="box-body">
                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Zona</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="zona">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Latitud:</label>
                                    <input type="text" class="form-control latitud" id="id_lat" name="latitud">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Longitud:</label>
                                    <input type="text" class="form-control longitud" id="id_log" name="longitud">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Localización:</label>
                                    <input type="text" id="location" class="form-control">
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
        <div class="col-lg-12">
            <div class="box box-primary">
                <div id="map"></div>
            </div>
        </div>
    </div>
@stop

@push('Js')

    <script src="../../assets/vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="../../assets/vendor_components/select2/dist/js/select2.full.js"></script>
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?key=AIzaSyCVE9GlwM_MZv_nXDNIwyr5cNXOacsay_4&libraries=places'></script>
    <script type="text/javascript" src="../js/locationpicker.jquery.js"></script>
    <script src="../assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>
    <script src="../js/pages/toastr.js"></script>
    <script src="../js/pages/notification.js"></script>
    @routes
    <script src="../js/viewJs/Zona/RegistrarZona.js"></script>
    <script>
        $(document).ready(function () {
            @if(Session::has('success'))
            toastr.success('La Zona', 'Se ha registrado éxitosamente', {timeOut: 3000});
            @endif
        });
    </script>
@endpush
