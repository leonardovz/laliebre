<?php 
$headerContent = false;
include('views/header.php');

$conexion = conexion($bd_config);
?>


<br>
<br>
<br>
<br>
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Producto</th>
                                <th class="column-2"></th>
                                <th class="column-3">Precio</th>
                                <th class="column-4">Cantidad</th>
                                <th class="column-5">Total</th>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">   
                                    <div class="how-itemcart1">
                                        <img src="<?php echo $ruta;?>imagenes_a_subir/0750101312203M.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Fresh Strawberries</td>
                                <td class="column-3">$ 36.00</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="text" name="num-product1" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 36.00</td>
                            </tr>

                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="<?php echo $ruta;?>imagenes_a_subir/0750101312203M.jpg" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">Lightweight Jacket</td>
                                <td class="column-3">$ 16.00</td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product" type="text" name="num-product2" value="1">

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">$ 16.00</td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                
            </div>
        </div>
    </div>
</form>
		

<?php include_once('views/footer.php');?>

    </body>
</html>