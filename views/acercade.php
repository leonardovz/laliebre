<?php 
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('templates/header.php')?>

	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/acercade.png');">
		<h2 class="ltext-105 cl0 txt-center">
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							MISIÓN
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Diferenciarnos por la excelencia humana y profesional de nuestros colaboradores siendo la mejor elección 
						para la compra diaria, ofreciendo calidad, bajos precios y una amplia gama de productos.</p>
					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="<?php echo $ruta;?>images/mision.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							VISIÓN
						</h3>

						<p class="stext-113 cl6 p-b-26">
						Convertir a Supermercado La Liebre en la mejor opción competitiva y confiable de compra para así 
						llegar a mas hogares, manteniendo una relación sostenible con nuestros clientes.	</p>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="<?php echo $ruta;?>images/vision.png" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
		

<?php include('templates/footer.php');?>