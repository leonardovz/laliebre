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
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">Carrito</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?php echo $ruta;?>imagenes_a_subir/0750101312203M.jpg"
                                                        class="img-circle" alt="User">
                                                </div>
                                                <h4>
                                                    Jumex
                                                    <small><i class="fa fa-clock-o"></i> 5</small>
                                                </h4>
                                                <p>Bebida 700 ml</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">Leonardo Vázquez</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">

                                    <p>
                                        Alexander Pierce - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Followers</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Sales</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="#">Friends</a>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
                    <li class="<?php if($rutas[0]=='registros') echo 'active';?>">
                        <a href="<?php echo $ruta;?>registros">
                            <i class="fa fa-th"></i> <span>Productos</span>
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
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>