<?php 
$headerContent = "header-v4";
require_once 'views/header.php';
require_once 'php/addproduct.php';
?>
    <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/cuenta.png');">
		<h2 class="ltext-105 cl0 txt-center">
			<!-- Cuenta -->
		</h2>
	</section>

    	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Administrador
						</h3>

						<p class="stext-113 cl6 p-b-26">
							El administrador es capaz de modificar datos necesarios de la pagina
						</p>
                        <div class="list-group stext-113 cl6 p-b-26">
                              <?php Herramientas();?>
                        </div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/about-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php require_once 'views/footer.php';?>