@extends('Shared.layout')


@push('Css')

@endpush

@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Información de Recarga</h3>
        </div>
        <div class="right-title">
            <button type="button" class="btn btn-warning btnListar">Volver a Lista de Recargas</button>
        </div>
    </div>
@stop

@section('content-body')
<div class="row">
    <div class="col-lg-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table style="clear: both" class="table table-bordered table-striped" id="user">
                    <tbody>
                    <tr>
                        <td width="35%">Punto de Venta:</td>
                        <td width="65%">{{$recarga_detalle->nombre_punto_venta}}</td>
                    </tr>
                    <tr>
                        <td>Realizado por:</td>
                        <td>{{$recarga_detalle->nombre.' '.$recarga_detalle->apellido}}</td>
                    </tr>
                    <tr>
                        <td>Imagen Adjunta</td>
                        <td>
                            @if($recarga_detalle->imagen_adjunta != "")
                                <a target="_blank" href="../assets/images/{{$recarga_detalle->imagen_adjunta}}">Si</a>
                            @else
                                No
                            @endif

                        </td>
                    </tr>
                    <tr>
                        <td>Cantidad</td>
                        <td>
                            S/.{{$recarga_detalle->monto}}
                        </td>
                    </tr>
                    <tr>
                        <td>Cantidad</td>
                        <td>
                            {{$recarga_detalle->created_at}}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
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
    @routes
    <script src="../js/viewJs/Recargas/DetalleRecargas.js"></script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: {{'{lat:'.$recarga_detalle->latitud_pdv.', lng:'.$recarga_detalle->longitud_pdv.'},'}}
                    mapTypeId:'terrain'
        });

            const triangleCoords = [
                {{'{lat:'.$recarga_detalle->latitud_pdv.', lng:'.$recarga_detalle->longitud_pdv.'},'}}
                {{'{lat:'.$recarga_detalle->latitud_r.', lng:'.$recarga_detalle->longitud_r.'},'}}
            ];

            const locations = [
                ['Punto de Venta : {{$recarga_detalle->nombre_punto_venta}}'],
                ['Usuario : {{$recarga_detalle->nombre. ' ' . $recarga_detalle->apellido}}'],
            ];

            var infowindow = new google.maps.InfoWindow();


            var marker, i;
            for (i = 0; i < triangleCoords.length; i++) {
                for (var mk = 0; mk < locations.length; mk++) {
                    var marker = new google.maps.Marker({
                        position: triangleCoords[i],
                        map: map
                    });
                    google.maps.event.addListener(marker, 'click', (function (marker, i) {
                        return function () {
                            infowindow.setContent(locations[i][0]);
                            infowindow.open(map, marker);
                        }
                    })(marker, i));
                }
            }
        }
    </script>
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVE9GlwM_MZv_nXDNIwyr5cNXOacsay_4&callback=initMap">

    </script>

@endpush