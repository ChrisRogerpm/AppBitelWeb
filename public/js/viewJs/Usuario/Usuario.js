$(document).ready(function () {
    $(".btn_nuevo").click(function () {
        window.location.replace(route('Usuarios.Registrar'));
    });
    ListarUsuario();

    $(document).on('click', '.btn_editar', function () {
        const usuario_id = $(this).data("id");
        window.location.replace(route('Usuarios.Editar', usuario_id));
    });

});

function ListarUsuario() {

    $('#TablaUsuario').DataTable({
        deferRender: true,
        cache: false,
        ajax: 'servicio/ListarUsuarios',
        order: [[ 0, "desc" ]],
        columns: [
            {data: 'id', title: 'Nº'},
            {data: 'nombre', title: 'Nombre'},
            {data: 'apellido', title: 'Apellido'},
            {data: 'cargo', title: 'Cargo'},
            {data: 'dni', title: 'DNI'},
            {data: 'celular',title:'Celular'},
            {
                data: null, title: 'Accion',
                render: function (value) {
                    return '<button type="button" class="btn btn-success btn_editar" data-id="' + value.id + '"><i class="icon-info22 position-left"></i> Detalles</button>';
                }
            }
        ]
    });

}