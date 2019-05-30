<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hello Market | Super Mercado La liebre</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<meta http-equiv="Cache-control" content="no-cache">
	<meta http-equiv="Pragma" content="no-cache">
	<meta http-equiv="Expires" Content="0">
	<meta name="keywords" content="Super Mercado, Super mercado la liebre, la liebre Jalostotitlan, carniceria en Jalos, Dulceria en Jalostotitlan">
	<meta name="description" content="Super mercado la liebre, aquí encontraras los mejores productos al mejor precio, somos el super mercado numero uno en Jalostotitlan.">
	<meta name="robots" content="all">
	<meta name="author" content="Ingeniero - Leonardo Vázquez Angulo | Ingeniero - Ostmad Misael Campos Reynoso">

	<!-- Open Graph protocol -->
	<meta property="og:title" content="Super Mercado la Liebre" />
	<meta property="og:site_name" content="Lacteosaltenos" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://www.helloMarket.com.mx" />
	<meta property="og:image" content="<?php echo $ruta;?>images/icons/laLiebre.png" />
	<meta property="og:image:type" content="image/png" />
	<meta property="og:image:width" content="200" />
	<meta property="og:image:height" content="200" />
	<meta property="og:description" content="Super mercado la liebre, aquí encontraras los mejores productos al mejor precio, somos el super mercado numero uno en Jalostotitlan" />
	<meta name="twitter:title" content="Jalostotitlan | Super Mercado la Liebre | Jalisco" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="<?php echo $ruta;?>" />
	<meta name="twitter:card" content="" />
  
	<link rel="icon" type="image/png" href="<?php echo $ruta;?>images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $ruta;?>css/estilos.css">
	<link rel="stylesheet" href="<?php echo $ruta;?>vendor/sweetalert/sweetalert2.min.css">
	<script src="<?php echo $ruta;?>administrador/recursos/bower_components/jquery/dist/jquery.min.js"></script>
	<script>
	function ruta(){
		var ruta = "<?php echo $ruta;?>";
		return ruta;
	}
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135611325-2"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-135611325-2');
</script>

</head>
<body class="animsition">
	
	<!-- Header -->
	<header <?php if ($headerContent) echo 'class='.$headerContent.'';?>>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Revisa el Catalogo de Articulos $100
					</div>

					
					<div class="right-top-bar flex-w h-full">
						<a href="<?php echo $ruta. $ubicacion['carrito']?>" class="flex-c-m trans-04 p-lr-25">
							Carrito	
						</a>
						<a href="<?php echo $ruta. $ubicacion['login']?>" class="flex-c-m trans-04 p-lr-25">
							Cuenta
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop <?php if($headerContent) echo $headerContentShadow;?>">
				<nav class="limiter-menu-desktop container ">
					
					<!-- Logo desktop -->		
					
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li <?php if( !isset($rutas[0]) ) echo 'class="active-menu"'; ?>>
								<a href="<?php echo $ruta.$ubicacion['index'];?>">Inicio</a>
							</li>
							<li <?php echo ( isset($rutas[0]) && $rutas[0] == $ubicacion['tienda'])  ? 'class="active-menu label1"': 'class="label1"'; ?> data-label1="Ofertas">
								<a href="<?php echo $ruta.$ubicacion['tienda'];?>">Tienda</a>
                            </li>
                            <li <?php echo ( isset($rutas[0]) && $rutas[0] == $ubicacion['acercade'])  ? 'class="active-menu"': ''; ?>>
								<a href="<?php echo $ruta.$ubicacion['acercade'];?>">Acerca de</a>
							</li>
                            <li <?php echo ( isset($rutas[0]) && $rutas[0] == $ubicacion['contacto'])  ? 'class="active-menu"': ''; ?>>
								<a href="<?php echo $ruta.$ubicacion['contacto'];?>">Contactanos</a>
							</li>
						</ul>
					</div>	

				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?php echo $ruta;?>"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>
			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
			
				<li>
					<div class="left-top-bar">
						Revisa el Catalogo de Articulos $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="<?php echo $ruta. $ubicacion['carrito']?>" class="flex-c-m trans-04 p-lr-25">
							Carrito	
						</a>
						<a href="<?php echo $ruta.$ubicacion['perfil'];?>" class="flex-c-m p-lr-10 trans-04">
							Cuenta
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="<?php echo $ruta.$ubicacion['index'];?>">Inicio</a>
				</li>

				<li>
					<a href="<?php echo $ruta.$ubicacion['tienda'];?>" class="label1 rs1" data-label1="OFERTAS">Tienda</a>
				</li>

				<li>
					<a href="<?php echo $ruta.$ubicacion['acercade'];?>">Acercade</a>
				</li>

				<li>
					<a href="<?php echo $ruta.$ubicacion['contacto'];?>">Contactanos</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?php echo $ruta;?>images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>