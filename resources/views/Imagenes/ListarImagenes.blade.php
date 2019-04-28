@extends('Shared.layout')

@push('Css')
    <link rel="stylesheet" type="text/css" href="../assets/vendor_components/datatable/datatables.min.css"/>
    <link rel="stylesheet" href="../js/sweetalert2.min.css">
@endpush


@section('content-header')
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Imagenes</h3>
        </div>
    </div>
@stop

@section('content-body')
    <div class="row contenedor">
        {{--@foreach($recargas as $re)--}}
        {{--<div class="col-lg-4">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-body">--}}
        {{--<img src="../assets/images/{{$re->imagen_adjunta}}" class="rounded" alt="...">--}}
        {{--</div>--}}
        {{--<div class="panel-footer">--}}
        {{--<div class="panel-heading">--}}
        {{--<button type="button" class="btn btn-success btn-block btnBorrar" data-id="{{$re->id}}">--}}
        {{--Borrar Imagen--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
    </div>
@stop

@push('Js')
    <script src="../assets/vendor_components/datatable/datatables.min.js"></script>
    <script src="../js/pages/data-table.js"></script>
    <script src="../js/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function () {
            ListarImagenesRecarga();
            $(document).on('click', '.btnBorrar', function () {
                const swalWithBootstrapButtons = swal.mixin({
                    confirmButtonClass: 'btn btn-primary',
                    cancelButtonClass: 'btn btn-warnig',
                    buttonsStyling: true,
                });
                const id_data = $(this).data("id");
                // BorrarImagen(id_data);
                swalWithBootstrapButtons({
                    title: 'Esta seguro de eliminar la imagen?',
                    text: "No podras recuperar esto!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        BorrarImagen(id_data);
                    } else if (
                        // Read more about handling dismissals
                        result.dismiss === swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons(
                            'Cancelado',
                            'Tu imagen no ha sido borrada',
                            'error'
                        )
                    }
                })
            });

        });

        function ListarImagenesRecarga() {
            $.ajax({
                type: 'GET',
                url: 'servicio/ListarRecargaImagen',
                success: function (response) {
                    var contenedor = $(".contenedor");
                    $(contenedor).empty();

                    $.each(response, function (ind, data) {
                        debugger
                        if ( data.imagen_adjunta !== "") {
                            $(contenedor).append('<div class="col-lg-3 img-re-' + data.id + '">\n' +
                                '                <div class="panel panel-default">\n' +
                                '                    <div class="panel-body">\n' +
                                '                        <img src="../assets/images/' + data.imagen_adjunta + '" class="rounded" alt="...">\n' +
                                '                    </div>\n' +
                                '                    <div class="panel-footer">\n' +
                                '                        <div class="panel-heading"><button type="button" class="btn btn-success btn-block btnBorrar" data-id="' + data.id + '">Borrar Imagen</button></div>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '            </div>');
                        }
                    });


                }
            })
        }

        function BorrarImagen(id_data) {
            $.ajax({
                type: "POST",
                cache: false,
                url: 'servicio/EliminarImagen',
                dataType: "json",
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id_recarga': id_data
                },
                success: function (response) {
                    debugger
                    if (response.data = true) {
                        $(".img-re-" + id_data).remove();
                        //ListarImagenesRecarga();
                    }
                }
            });
        }
    </script>
@endpush
