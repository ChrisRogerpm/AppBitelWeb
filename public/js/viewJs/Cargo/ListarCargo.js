$(document).ready(function () {

    $(".btnNuevo").click(function () {
        window.location.replace(route('Cargos.Registrar'));
    });
    $(document).on('click', '.btn_editar', function () {
        const id_cargo = $(this).data("id");
        window.location.replace(route('Cargos.Editar', id_cargo));
    });

    ListarCargos();

});

function ListarCargos() {
    $('#TablaCargo').DataTable({
        deferRender: true,
        cache: false,
        ajax: 'servicio/ListarCargos',
        order: [[0, "desc"]],
        columns: [
            {data: 'id', title: 'Nº'},
            {data: 'cargo', title: 'Nombre'},
            {
                data: 'estado', title: 'Estado',
                render: function (value) {
                    if (value === '1') {
                        return 'Activo';
                    }
                    else {
                        return 'Inactivo';
                    }
                }
            },
            {
                data: null, title: 'Accion',
                render: function (value) {
                    return '<button type="button" class="btn btn-success btn_editar" data-id="' + value.id + '"><i class="icon-info22 position-left"></i> Detalles</button>';
                }
            }
        ]
    });
}