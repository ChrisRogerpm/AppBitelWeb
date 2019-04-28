<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Listado de Puntos de Venta - QR CODE</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('pdf/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('pdf/css/thumbnail-gallery.css')}}" rel="stylesheet">

</head>

<body>
<div class="container-fluid">
        @foreach($punto_venta as $pdv)
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">{{$pdv->nombre_punto_venta}}</div>
                    <div class="panel-body text-center"><img src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->size(250)->generate($pdv->nombre_punto_venta . '-' . $pdv->id . '-' . $pdv->id)) }} "></div>
                </div>
            </div>
            <br>
        </div>
        @endforeach
</div>
<!-- /.container -->

<!-- Bootstrap core JavaScript -->
<script src="{{asset('pdf/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('pdf/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
