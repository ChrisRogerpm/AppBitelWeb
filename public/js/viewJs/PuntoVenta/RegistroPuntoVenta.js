$(document).ready(function () {
    $('.select2').select2();

    $(".btn_Listar").click(function () {
       window.location.replace(route('Inicio'));
    });
    $('#map').locationpicker({
        location: {
            latitude: -18.01423773829049,
            longitude: -70.25152817860413,
        },
        radius: 30,
        zoom: 18,
        inputBinding: {
            latitudeInput: $('#lat'),
            longitudeInput: $('#long'),
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