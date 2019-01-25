<?php 
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('views/header.php');
require 'php/showProduct.php';
?>
    <?php 
    $idProducto = $_GET['search'];
    $cardResult = buscarProducto($idProducto,$conexion);
    ?>
	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				INICIO
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.html" class="stext-109 cl8 hov-cl1 trans-04">
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
								<div class="item-slick3" data-thumb="imagenes_a_subir/<?php echo $cardResult['imagen'];?>">
									<div class="wrap-pic-w pos-relative">
										<img src="imagenes_a_subir/<?php echo $cardResult['imagen'];?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="imagenes_a_subir/<?php echo $cardResult['imagen'];?>">
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
                <?php foreach ($posts as $post) {
					$nombre = $post['Nombre'];
					$descripcion= $post['Descripcion'];
					$precio= $post['precio'];
					$img= $post['imagen'];
					$idCategoria = $post['id'];
					$categoria = obtenerCategoria($idCategoria,$conexion);
					$categoria = $categoria[0]['Nombre'];
					Targeta($nombre,$descripcion,$precio,$img,$categoria,$idCategoria);
				} 
				?>
				</div>
			</div>
		</div>
	</section>
		
	<?php include('views/footer.php');?>