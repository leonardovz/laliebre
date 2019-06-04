<?php 
$headerContent = false;
include('templates/header.php');

$conexion = conexion($bd_config);
?>


<br>
<br>
<br>
<br>
<div class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <table class="table">
                    <thead>
                        <tr class="text-center">
                            <th scope="col"></th>
                            <th scope="col">Producto</th>
                            <th scope="col">precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col" style="width: 100px;">Sub Total</th>
                            <!-- <th scope="col">Handle</th> -->
                        </tr>
                    </thead>
                    <tbody id="listaCarrito">
                    </tbody>
                </table>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Total Carrito
                    </h4>
                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2">
                                Subtotal:
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2" id="subtotal" total="0">
                                $00.00 MXN
                            </span>
                        </div>
                    </div><br>
                    <h4 class="mtext-109 cl2 p-b-30">
                        ¡Atento!
                    </h4>
                    <p class="stext-111 cl6 p-t-2">
                        Los precios de los productos ofrecidos en esta Tienda Online pueden tener variaciones mínimas de
                        precio en cuanto a la tienda física de la empresa Supermercado La Liebre. <br> En caso de
                        pedidos, puede haber variación en precios si los productos no son recogidos en un lapso de
                        <strong>6hrs</strong> . </p>
                    <br>
                    <a href="<?php echo $ruta;?>imprimir" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" id="pasarCarrito">
                        Imprimir mi Lista de Compras
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once('templates/footer.php');?>
<script src="<?php echo $ruta;?>js/recursos/carritoCompras.js"></script>

</body>

</html>