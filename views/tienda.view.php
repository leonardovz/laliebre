<?php 
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('templates/header.php');
$conexion = conexion($bd_config);

?>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button id = "categorias" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 " data-filter="*">
						Todos los Productos
					</button>
                    
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
						<button id="tiendabuscar"class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>
						<input  type="text" id="buscarProd" name ="buscarProd" class="mtext-107 cl2 size-114 plh2 p-r-15" placeholder="Buscar" value="<?php echo (isset($rutas[1]) && !empty($rutas[1])) ? str_replace('-', ' ',$rutas[1]) : ""; ?>">
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
										<a href="<?php echo $ruta.$ubicacion['tienda'];?>/<?php echo str_replace(' ', '-', eliminar_tildes($categoriaD['Nombre']));?>" class="filter-link stext-106 trans-04">
											<?php echo $categoriaD['Nombre'];?>
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="targeta"></div>

			<!-- Load more -->
			<form class="flex-c-m flex-w w-full p-t-45" id="traerMas" method="post">
            	<button class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" type="submit">Ver
				más</button>
		</form>
		</div>
	</div>
	
	
	<?php require_once 'templates/footer.php';?>
	<script src="<?php echo $ruta;?>js/peticion.js"></script>
	<script>
		$(document).ready(function(){
			$("#categorias").on('click',function(){
				window.location.replace(<?php echo "'" . $ruta . $ubicacion['tienda'] . "'"?>);
			})
		});
	</script>
</body>
</html>
