$(document).ready(function () {
    $('.select2').select2();

    $(".btn_Listar").click(function () {
        window.location.replace(route('Usuarios'));
    });
});