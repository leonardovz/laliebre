<?php 
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('views/header.php');
include('modificar/tablas.php');
require 'php/showProduct.php';

$productos = allProductos($conexion);
?>
    
    <div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Cuenta
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
	
			<span class="stext-109 cl4">
				Productos
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<?php tableProducts($productos);?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<script src="js/delproducts.js"></script>
<?php include('views/footer.php');?>