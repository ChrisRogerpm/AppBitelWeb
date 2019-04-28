$(document).ready(function () {

    $('.datepicker_').datepicker({
        autoclose: true
    });
    $('.select2').select2();

    $("#btnBuscar").click(function () {
        BuscarRecargasFiltro();
        // console.log('qwqw');
    });

});

var BuscarRecargasFiltro = function () {
    const id_usuario = $("#cboUsuario").val();
    const f_ini = $("#fec_ini").val();
    $.ajax({
        type: "GET",
        url: 'ViewRecorridoPartial?usuario_id=' + id_usuario + '&fecha=' + f_ini,
        success: function (response) {
            debugger
            $(".contenedor_mapa").html(response);
        }
    });
}