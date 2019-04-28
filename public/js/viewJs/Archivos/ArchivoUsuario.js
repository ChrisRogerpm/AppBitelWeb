$(document).ready(function () {
    $('.datepicker_').datepicker({
        autoclose: true
    });
    $('.select2').select2();

    $("#btnBuscar").click(function () {
        BuscarArchivosFiltro();
    });

});

function BuscarArchivosFiltro() {
    const id_usuario = $("#cboUsuario").val();
    const f_ini = $("#fec_ini").val();
    const f_fin = $("#fec_fin").val();
    var contenedor = $("#contenedor-tabla");
    $.ajax({
        type: "POST",
        cache: false,
        url: 'servicio/ListarArchivosGenerados',
        // contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: {
            '_token': $('input[name=_token]').val(),
            'id': id_usuario,
            'fec_ini': f_ini,
            'fec_fin': f_fin
        },
        success: function (response) {

            response = response.data;
            $(contenedor).empty();
            $(contenedor).append('<div class="row"><div class="box">\n' +
                '                <div class="box-body">\n' +
                '                    <div class="table-responsive">\n' +
                '                        <table id="TablaRecarga" class="table table-bordered table-striped"\n' +
                '                               style="width:100%">\n' +
                '                        </table>\n' +
                '                    </div>\n' +
                '                </div>\n' +
                '            </div></div>');
            objetodatatable = $("#TablaRecarga").DataTable({
                "bDestroy": true,
                "bSort": false,
                "scrollCollapse": true,
                "scrollX": true,
                "paging": true,
                "autoWidth": false,
                "bProcessing": true,
                "bDeferRender": true,
                data: response,
                columns: [
                    {data: 'NombreArchivo', title: 'Nombre de Archivo'},
                    {
                        data: null, title: 'URL',
                        render: function (value) {
                            var ruta = '../assets/Files/Archivos/' + value.nombre + value.apellido + value.dni + '/' + value.NombreArchivo;
                            return '<a href="' + ruta + '" target="_blank" class="btn btn-primary btn-sm"> Descargar </a>'
                        }
                    }

                ]
            });
        }
    });
}