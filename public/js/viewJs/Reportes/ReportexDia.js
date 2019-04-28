$(document).ready(function () {
    $('.datepicker_').datepicker({
        autoclose: true
    });
    $('.select2').select2();

    $("#btnBuscar").click(function () {
        BuscarRecargasFiltro();
    });

    $(document).on('click', '.btnDetalles', function () {
        const id_recarga = $(this).data("id");
        window.location.replace(route('Recargas.Detalle',id_recarga));
    });

});

function BuscarRecargasFiltro() {
    const id_usuario = $("#cboUsuario").val();
    const f_ini = $("#fec_ini").val();
    const f_fin = $("#fec_fin").val();
    var contenedor = $("#contenedor-tabla");
    $.ajax({
        type: "POST",
        cache: false,
        url: 'servicio/FiltrarRecargaxDiaUsuario',
        // contentType: "application/json; charset=utf-8",
        dataType: "json",
        data: {
            '_token': $('input[name=_token]').val(),
            'usuario_id': id_usuario,
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
                    {data: 'nombre_punto_venta', title: 'Punto de Venta'},
                    {
                        data: null, title: 'Cantidad',
                        render: function (value) {
                            return 'S/.' + value.monto;
                        }
                    },
                    {data: 'created_at', title: 'Realizado por'},
                    {
                        data: null, title: 'Accion',
                        render: function (value) {
                            return '<button type="button" class="btn btn-success btnDetalles" data-id="' + value.id + '"><i class="fa fa-info-circle"></i> Detalles</button>';
                        }
                    },

                ]
            });
        }
    });
}