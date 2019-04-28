<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ultimatepro-admin-templates.multipurposethemes.com/main/pages/auth_login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Aug 2018 17:45:45 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../ico.ico">

    <title>Conectate :: Bitel ::</title>

    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="../css/bootstrap-extend.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="../css/master_style.css">

    <!-- UltimatePro Admin skins -->
    <link rel="stylesheet" href="../css/skins/_all-skins.css">


</head>
<body class="hold-transition bg-img" style="background-image: url(../assets/images/bg.jpg)" data-overlay="3">

<div class="auth-2-outer row align-items-center h-p100 m-0">
    <div class="auth-2">
        <div class="auth-logo font-size-30">
            <a href="../index-2.html" class="text-dark"><b>Conecate</b>Bitel</a>
        </div>
        <!-- /.login-logo -->
        <div class="auth-body">
            <p class="auth-msg">Inicia sesión para comenzar tu sesión</p>

            <form action="{{route('login')}}" method="post" class="form-element">
                {{csrf_field()}}
                <div class="form-group has-feedback">
                    <input type="text" name="dni" class="form-control" placeholder="Ingrese su DNI">
                    <span class="ion ion-email form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña">
                    <span class="ion ion-locked form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="checkbox">
                            <input type="checkbox" id="basic_checkbox_1">
                            <label for="basic_checkbox_1">Recuerdame</label>
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-block mt-10 btn-success">Login</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
    </div>

</div>


<!-- jQuery 3 -->
<script src="../assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- popper -->
<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

</body>

<!-- Mirrored from ultimatepro-admin-templates.multipurposethemes.com/main/pages/auth_login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Aug 2018 17:45:45 GMT -->
</html>
