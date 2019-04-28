$(document).ready(function () {
    $(".btn_nuevo_pdv").click(function () {
        window.location.replace(route('RegistroPDV'));
    });
    ListarPuntoVenta();

    $(".btnImprimir").click(function () {
       window.location.replace( route('DescargarPDFQR'));
    });

    $(document).on('click', '.btn_editar', function () {
        const pdv_id = $(this).data("id");
        window.location.replace(route('EditarPDV', pdv_id));
    }); 

});
function ListarPuntoVenta() {

    $('#TablaPuntoVenta').DataTable({
        deferRender: true,
        cache: false,
        ajax: 'servicio/ListarPuntoVenta',
        order: [[0, "desc"]],
        columns: [
            {data: 'id', title: 'Nº'},
            {data: 'zona', title: 'Zona'},
            {data: 'codigo_pdv', title: 'Codigo PDV'},
            {data: 'nombre_punto_venta', title: 'Punto de Venta'},
            {data: 'agente_venta', title: 'Encargado'},
            {
                data: null, title: 'Monto',
                render: function (value) {
                    return 'S/.' + value.recarga;
                }
            },
            {data: 'updated_at', title: 'Ultima Actualización'},
            {
                data: null, title: 'Accion',
                render: function (value) {
                    return '<button type="button" class="btn btn-success btn_editar" data-id="' + value.id + '"><i class="icon-info22 position-left"></i> Detalles</button>';
                }
            }
        ]
    });

}