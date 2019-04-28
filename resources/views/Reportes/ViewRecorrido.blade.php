<div id="map"></div>

<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {{'{lat:'.$recorrido[0]->latitud_r.', lng:'.$recorrido[0]->longitud_r.'},'}}
                mapTypeId
    :
        'terrain'
    })
        ;

        const triangleCoords = [
            @foreach($recorrido as $re)
            {{'{lat:'.$re->latitud_r.', lng:'.$re->longitud_r.'},'}}
            @endforeach
        ];

        const locations = [
                @foreach($recorrido as $re)
            [' {{$re->nombre_punto_venta}} - {{$re->created_at}}'],
            @endforeach
        ];

        var infowindow = new google.maps.InfoWindow();

        var flightPath = new google.maps.Polyline({
            path: triangleCoords,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2
        });

        flightPath.setMap(map);
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