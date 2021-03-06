<?php include_once ('administrador/templates/header.php');?>
<!-- <body class="hold-transition login-page"> -->

<body class="hold-transition skin-black-light login-page layout-top-nav">

    <div class="wrapper">
        <header class="main-header">
            <a href="<?php echo $ruta;?>" class="logo">
                <span class="logo-mini text-dark"><b>H</b>M</span>
                <span class="logo-lg"><b>HELLO</b>MARKET</span>
            </a>
            <nav class="navbar navbar-static-top">


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-cart-arrow-down"></i>
                                <span class="label label-success" id="cantidad">0</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Carrito</li>
                                <li>
                                    <ul class="menu" id="items">
                                        <!-- <li>
                                  <a href="#">
                                  <div class="pull-left">
                                      <img src="<?php echo $ruta;?>imagenes_a_subir/0750101312203M.jpg" class="img-circle" alt="User">
                                  </div>
                                  <h4>
                                      Categoria
                                      <small><i class="fa fa-clock-o"></i> 5</small>
                                  </h4>
                                  <p>Chelas para calor 700 ml</p>
                                  </a>
                              </li> -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="<?php echo $ruta;?>carrito">Ver mi Carrito</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo $ruta;?>"><b>HELLO</b>MARKET</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Ingresa tus datos para ir a tu perfil</p>

                <form id="registrarme" method="post">
                    <div class="form-group has-feedback">
                        <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre(s)">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellido(s)">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="correo" name="correo" type="email" class="form-control" placeholder="Correo">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password1" name="password1" type="password" class="form-control" placeholder="Contraseña">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input id="password2" name="password2" type="password" class="form-control" placeholder="Repite tu Contraseña">
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
                        <div class="col-xs-12 text-center">
                            <div id="errores">
                               
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
                        <a href="<?php echo $ruta.$ubicacion['registro'];?>" class="text-center">Registrarme</a>
                    </div><br>
                    <br>
                </div>
                <!-- .social-auth-links -->
            </div>
            <!-- /.login-box-body -->
        </div>
    </div>
    <?php include_once ('administrador/templates/footer.php');?>
    <!-- <script src="<?php //echo $ruta;?>js/recursos/login.js"></script> -->
    <!-- <script src="<?php //echo $ruta;?>js/recursos/impresiones.js"></script> -->
</body>

</html>