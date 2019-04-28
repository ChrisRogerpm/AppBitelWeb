$(document).ready(function () {
    $('.select2').select2();

    $(".btn_Listar").click(function () {
        window.location.replace(route('Zona'));
    });

    $('#map').locationpicker({
        location: {
            latitude: -18.0065679,
            longitude: -70.2462741,
        },
        radius: 30,
        zoom: 18,
        inputBinding: {
            latitudeInput: $('#id_lat'),
            longitudeInput: $('#id_log'),
            locationNameInput: $('#location'),
        },
        // Para cargar vista satelital
        mapTypeId: google.maps.MapTypeId.NORMAL,
        enableAutocomplete: true,
        onchanged: function (currentLocation, radius, isMarkerDropped) {
            // Uncomment line below to show alert on each Location Changed event
            //alert("Location changed. New location (" + currentLocation.latitude + ", " + currentLocation.longitude + ")");
        }

    });
});
