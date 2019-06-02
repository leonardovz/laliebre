<?php 
	$headerContent = "header-v4";
	$headerContentShadow = "how-shadow1";
	require_once 'templates/header.php';
	// $conexion = conexion($bd_config);

	$conexion = conexion($bd_config);
	$conexionSLI = conexionSQLI($bd_config);
?>
	<?php 
	
		$idProducto = explode("-",$rutas[1]);
		$idProducto = $idProducto[0];
		$cardResult = buscarProducto($idProducto,$conexion);
    ?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="<?php echo $ruta;?>" class="stext-109 cl8 hov-cl1 trans-04">
				INICIO
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="<?php echo $ruta.$ubicacion['tienda'];?>" class="stext-109 cl8 hov-cl1 trans-04">
                <?php 
                $categoria= $cardResult["idCategoria"];
                $categoria = obtenerCategoria($categoria,$conexion);
                $categoria = $categoria[0]['Nombre'];
                echo $categoria;
                ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $cardResult['Nombre'];?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo $ruta.$cardResult['imagen'];?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $ruta. $cardResult['imagen'];?>" alt="IMG-PRODUCT">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $ruta.''. $cardResult['imagen'];?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $cardResult['Nombre'];?>
						</h4>

						<span class="mtext-106 cl2">
                            $ <?php echo $cardResult['precio'];?> MXN
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $cardResult['Descripcion'];?>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Categoria :  <?php 
                $categoria= $cardResult["idCategoria"];
                $categoria = obtenerCategoria($categoria,$conexion);
                $categoria = $categoria[0]['Nombre'];
                echo $categoria;
                ?>
			</span>
		</div>
	</section>


	<!-- Related Products -->
	<?php 
		$categoria = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : $cardResult["idCategoria"];
		$inicio = (isset($_POST['inicio'])) ? $_POST['inicio'] : 0;
		$limite = (isset($_POST['limite'])) ? $_POST['limite'] : 8;
		$relacionados = traerProdRelacionados($conexionSLI,$categoria,$inicio,$limite);
		if($relacionados){ ?>
			<section class="sec-relate-product bg0 p-t-45 p-b-105">
				<div class="container">
					<div class="p-b-45">
						<h3 class="ltext-106 cl5 txt-center">
							Productos Relacionados
						</h3>
					</div>

					<!-- Slide2 -->
					<div class="wrap-slick2">
						<div class="slick2">
							<?php
								while($producto = $relacionados->fetch_assoc()){
									// id	Nombre	Descripcion	imagen	idCategoria	catNombre	precio	fecha	idUsuario	estado
										$idProducto = $producto['id'];
										$nombre = $producto['Nombre'];
										$descripcion= $producto['Descripcion'];
										$precio= $producto['precio'];
										$img= $producto['imagen'];
										$categoria = $producto['catNombre'];
										?>
										<div class="col-md-4 p-b-35 isotope-item <?php echo str_replace(' ', '', $categoria);?>">
											<!-- Block2 -->
											<div class="block2">
												<div class="block2-pic hov-img0">
													<img src="<?php echo $ruta.$img;?>" alt="IMG-PRODUCT">

													<a href="<?php echo $ruta .$ubicacion['productos'].'/'.  $idProducto;?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
														Vista Previa
													</a>
												</div>

												<div class="block2-txt flex-w flex-t p-t-14">
													<div class="block2-txt-child1 flex-col-l ">
														<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
															<?php echo $nombre;?>
														</a>

														<span class="stext-105 cl3">
														$ <?php echo $precio;?> MXN
														</span>
													</div>

													<div class="block2-txt-child2 flex-r p-t-3">
														<button class="btn-addwish-b2 dis-block pos-relative js-addwish-b2 producto-carrito"
															idproducto="<?php echo $idProducto;?>" 
															nombre="<?php echo $nombre;?>"
															precio="<?php echo $precio;?>"
															imagen="<?php echo $img;?>" >
															<img class="icon-heart1 dis-block trans-04" src="<?php echo $ruta;?>images/icons/icon-heart-01.png"alt="ICON">
															<img class="icon-heart2 dis-block trans-04 ab-t-l"src="<?php echo $ruta;?>images/icons/icon-hart-02.png" alt="ICON">
														</button>
													</div>
												</div>
											</div>
										</div>
									<?php 
								}
							?>
						</div>
					</div>
				</div>
			</section>
		<?php } ?>
		
	<?php require_once 'templates/footer.php';?>