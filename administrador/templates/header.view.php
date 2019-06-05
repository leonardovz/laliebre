<body class="hold-transition skin-black fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo $ruta;?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>H</b>M</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>HELLO</b>MARKET</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Menú de Acciones</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

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
                                </ul>
                            </li>
                            <li class="footer"><a href="<?php echo $ruta;?>carrito">Ver mi Carrito</a></li>
                            </ul>
                        </li>

                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo $ruta;?>images/mision.png" class="img-circle" alt="User Image" style="width: 3vh;">

                                <span class="hidden-xs"><?php echo $_SESSION['nombre']. ' ' .$_SESSION['apellidos'];?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $ruta;?>images/mision.png" class="img-circle" alt="User Image">
                                    <p>
                                        <?php echo $_SESSION['nombre']. ' ' .$_SESSION['apellidos'];?>
                                    </p>
                                </li>
                              
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <!-- <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                                    </div>
                                    <div class="pull-right">
                                        <a id="cerrarSesion" href="#" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="<?php echo $ruta;?>configuracion"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menú de Opciones</li>

                    
                    <li class="<?php if($rutas[0]==$ubicacion['perfil']) echo 'active';?>">
                        <a href="<?php echo $ruta.$ubicacion['perfil'];?>">
                            <i class="fa fa-th"></i> <span>Compras</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">new</small>
                            </span>
                        </a>
                    </li>
                   
                    <li class="<?php if($rutas[0]=='configuracion') echo 'active';?>">
                        <a href="<?php echo $ruta;?>configuracion"><i class="fa fa-book"></i>
                            <span>Mis Datos</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">+</small>
                            </span>
                        </a>
                    </li>
                    <?php if(validarSesion() && validarSesionAdmin() ){?>
                    
                    <li class="<?php if($rutas[0]=='registros') echo 'active';?>">
                        <a href="<?php echo $ruta;?>registros">
                            <i class="fa fa-th"></i> <span>Productos</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">new</small>
                            </span>
                        </a>
                    </li>
                    
                    
                    <li class="<?php if($rutas[0]=='usuariossistema') echo 'active';?>">
                        <a href="<?php echo $ruta;?>UsuariosSistema"><i class="fa fa-book"></i>
                            <span>Usuarios Sistema</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">+</small>
                            </span>
                        </a>
                    </li>

                    <li class="<?php if($rutas[0]=='notas') echo 'active';?>">
                        <a href="<?php echo $ruta;?>Notas"><i class="fa fa-book"></i>
                            <span>Pedidos</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green">+</small>
                            </span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>