<?php 
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('views/header.php');
require 'php/showProduct.php';
?>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter="*">
						Todos los Productos
					</button>
                    <?php 
                        $Categorias= traerCategorias($conexion);
                        foreach ($Categorias as $categoria) {
                            MostrarCategorias($categoria['Nombre']);
					    }
					?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Filtrar
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Buscar
					</div>
				</div>
				
				<!-- Busqueda con AJAX -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input  type="text" id="buscarProd" name ="buscarProd" class="mtext-107 cl2 size-114 plh2 p-r-15" placeholder="Search">
					</div>	
				</div>

				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
							<?php $categoriasD = traerCategorias($conexion);?>
								<?php foreach ($categoriasD as $categoriaD): ?>
									<li class="p-b-6">
										<a href="?search=<?php echo str_replace(' ', '', $categoriaD['Nombre']);?>" class="filter-link stext-106 trans-04">
											<?php echo $categoriaD['Nombre'];?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row isotope-grid" id="Targeta">
			<?php foreach ($posts as $post) {
					$id = $post['id'];
					$nombre = $post['Nombre'];
					$descripcion= $post['Descripcion'];
					$precio= $post['precio'];
					$img= $post['imagen'];
					$idCategoria = $post['idCategoria'];
					$categoria = obtenerCategoria($idCategoria,$conexion);
					$categoria = $categoria[0]['Nombre'];?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo str_replace(' ', '', $categoria);?>">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="<?php echo $ruta.'imagenes_a_subir/'.$img;?>" alt="IMG-PRODUCT">

								<a href="<?php echo $ruta.$ubicacion['productos'].'/'.$id;?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
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
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div>
							</div>
						</div>
					</div>

				<?php } ?>
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
	<script src="js/peticion.js"></script>
	
	<?php require_once 'views/footer.php';?>