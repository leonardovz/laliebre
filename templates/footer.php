    <!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categorias
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="<?php echo $ruta.$ubicacion['tienda'];?>/cocina" class="stext-107 cl7 hov-cl1 trans-04">
								cocina
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?php echo $ruta.$ubicacion['tienda'];?>/bebidas" class="stext-107 cl7 hov-cl1 trans-04">
								bebidas
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?php echo $ruta.$ubicacion['tienda'];?>/comida" class="stext-107 cl7 hov-cl1 trans-04">
								comida
							</a>
						</li>

						<li class="p-b-10">
							<a href="<?php echo $ruta.$ubicacion['tienda'];?>/bebida" class="stext-107 cl7 hov-cl1 trans-04">
								bebida
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3">
					<h4 class="stext-301 cl0 p-b-30">
						Ayuda
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="<?php echo $ruta.$ubicacion['contacto'];?>" class="stext-107 cl7 hov-cl1 trans-04">
								Contactanos
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Nosotros
					</h4>

					<p class="stext-107 cl7 size-201">
						Encuentranos en nustras Redes Sociales
					</p>

					<div class="p-t-27">
						<a href="https://www.facebook.com/LaLiebreJalos/" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<!-- <a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a> -->
					</div>
				</div>
				<?php if (!isset($_SESSION['validarSesion'])){?>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Noticias
					</h4>

					<form>
						<!-- <div class="wrap-input1 w-full p-b-4">
							<input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
							<div class="focus-input1 trans-04"></div>
						</div> -->

						<div class="p-t-18">
							<a class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04" href="<?php echo $ruta.$ubicacion['registro'];?>">Registrate</a>
						</div>
					</form>
				</div>

				<?php }?>
			</div>

			<div class="p-t-10">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="<?php echo $ruta;?>images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>
					<!-- 
					<a href="#" class="m-all-1">
						<img src="<?php //echo $ruta;?>images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?php //echo $ruta;?>images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?php //echo $ruta;?>images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="<?php //echo $ruta;?>images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a> -->
				</div>

				<p class="stext-107 cl6 txt-center">
				Los precios de los productos ofrecidos en esta Tienda Online pueden tener variaciones mínimas de precio en cuanto a la tienda física de la empresa Supermercado La Liebre. <br>
				En caso de pedidos, puede haber variación en precios si los productos no son recogidos en un lapso de 6hrs . 
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a> -->

				</p>
			</div>
		</div>
	</footer>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>
	<script src="<?php echo $ruta;?>vendor/animsition/js/animsition.min.js"></script>
	<script src="<?php echo $ruta;?>vendor/bootstrap/js/popper.min.js"></script>
	<script src="<?php echo $ruta;?>vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo $ruta;?>vendor/daterangepicker/moment.min.js"></script>
	<script src="<?php echo $ruta;?>vendor/daterangepicker/daterangepicker.js"></script>
	<script src="<?php echo $ruta;?>vendor/slick/slick.min.js"></script>
	<script src="<?php echo $ruta;?>js/slick-custom.js"></script>
	<script src="<?php echo $ruta;?>vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo $ruta;?>vendor/isotope/isotope.pkgd.min.js"></script>
	<script src="<?php echo $ruta;?>vendor/sweetalert/sweetalert2.all.min.js"></script>
	<script src="<?php echo $ruta;?>js/main.js"></script>
	
