<?php 
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('templates/header.php')?>

	<!-- Title page -->
	<!-- <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo $ruta;?>images/qr_img.png');">
		<h2 class="ltext-105 cl0 txt-center">
			Contacto
		</h2>
	</section>	 -->


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<!-- <h4 class="mtext-105 cl2 txt-center p-b-30">
							Enviar un Mensaje
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Correo Electronico">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Dudas o Aclaraciones"></textarea>
						</div>
						
						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Enviar
						</button> -->
						<div class="bor8 m-b-30">
							<img src ="<?php echo $ruta;?>images/qr_img.png" class="img-responsive" alt="Responsive image">
						</div>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Direccion
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Rio papaloapan #13	
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Llamanos
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<a href="tel:431-746-0233">+52 1 (431-746-0233)</a>
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Correo de Contacto
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								<a href="mailto:superlaliebre@gmail.com">superlaliebre@gmail.com</a>
							</p>
						</div>
					</div>
					<!-- <div class="flex-w w-full" style="width: 40%;">
						<img src ="<?php //echo $ruta;?>images/qr_img.png" class="img-responsive" alt="Responsive image">
					</div> -->
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					
				</div>
				
			</div>
		</div>
	</section>	
	
	
	<!-- Map -->
	<div class="container-fluid m-0 p-0">
		<div class="row">
		<div class="col-md">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3720.7777769427703!2d-102.46922058506512!3d21.16124018592683!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842912e3a00eeaa5%3A0xeeaffe134cd00bf!2sLa+Liebre!5e0!3m2!1ses-419!2smx!4v1540480772738" width="100%" height="466" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		</div>
	</div>
	
	<?php include('templates/footer.php');?>