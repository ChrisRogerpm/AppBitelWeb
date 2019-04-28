@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap-select/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="../assets/vendor_components/select2/dist/css/select2.min.css">
@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Registro Punto de Venta</h3>
        </div>
        <div class="right-title">
            <button type="button" class="btn btn-warning btn_Listar">Listar Puntos de Venta</button>
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
                <form action="{{route('GuardarPuntoVenta')}}" method="post" autocomplete="off">
                    <div class="box-body">
                        <div class="row">
                            {{csrf_field()}}
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Zona</label>
                                    <div class="input-group">
                                        <select name="zona" class="form-control select2" style="width: 100%;">
                                            <option value="">Seleccione</option>
                                            @foreach($zona as $z)
                                                <option value="{{$z->zona}}">{{$z->zona}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Codigo PDV</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="text" name="codigo_pdv" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Nombre PDV</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="text" class="form-control" name="nombre_punto_venta">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Agente</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="text" class="form-control" name="agente_venta">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Recarga</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="number" name="recarga" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="text" class="form-control" name="direccion">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="number" class="form-control" name="dni">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Número Referencia</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                                        <input type="text" class="form-control" name="numero_referencia">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Latitud:</label>
                                    <input type="text" id="lat" class="form-control" name="latitud">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Longitud:</label>
                                    <input type="text" id="long" class="form-control" name="longitud">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <div class="form-group">
                                    <label>Localización:</label>
                                    <input type="text" id="location"  class="form-control">
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
    @routes
    <script src="../js/viewJs/PuntoVenta/RegistroPuntoVenta.js"></script>
    <script>
        $(document).ready(function () {
            @if(Session::has('existe'))
            toastr.success('Codigo PDV', 'El codigo PDV ya existe, intente con otro', {timeOut: 3000});
            @endif
            @if(Session::has('success'))
            toastr.success('Registro de PDV', 'Se ha registrado éxitosamente', {timeOut: 3000});
            @endif
        });
    </script>

@endpush
