<?php include_once ('administrador/templates/header.php');?>

<body class="hold-transition login-page">
    <div class="conteiner">
        <div class="row">
            <div class="login-box">
                <div class="login-logo">
                    <a href="<?php echo $ruta;?>"><b>HELLO</b>MARKET</a>
                </div>
                <!-- /.login-logo -->
                <div class="login-box-body">
                    <p class="login-box-msg">Ingresa sus datos para registrar la cuenta</p>

                    <form action="<?php echo $ruta;?>php/registro.php" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Nombre(s)">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="Apellido(s)">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="email" class="form-control" placeholder="Correo">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Contraseña">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control" placeholder="Repite tu Contraseña">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Registrarme</button>
                            </div>
                            <div class="col-xs-12 text-center">
                                <div class="checkbox icheck">
                                    <label>
                                        <input type="checkbox"> Acepto los <a href="#">Terminos y Condiciones</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="social-auth-links text-center">
                        <p>- Acciones-</p>
                        <!-- <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                                Facebook</a>
                            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                                Google+</a> -->
                        <div class="col-md-12 text-center">
                            <a href="#">Recuperar mi contraseña</a><br>
                            <a href="<?php echo $ruta.$ubicacion['login'];?>" class="text-center">Iniciar Sesión</a>
                        </div><br>
                        <br>
                    </div>
                    <!-- .social-auth-links -->



                </div>
                <!-- /.login-box-body -->
            </div>
        </div>
    </div>



    <?php include_once ('administrador/templates/footer.php');?>
    <script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
    </script>
</body>

</html>