<?php include_once ('administrador/templates/header.php');?>

<body onload="window.print();">
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice" >
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <!-- <i class="fa fa-globe"></i>  -->
                        HelloMarket | Supermercado la Liebre
                        <small class="pull-right" id="fecha"></small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">

                    <address>
                        <strong>Jalostotitlán , Jal.</strong><br>
                        Rio papaloapan 13<br>
                        431 746 0233<br>
                        superlaliebre@gmail.com<br>
                    </address>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Cantidad</th>
                                <th>Nombre</th>
                                <th>Costo</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody id="listaCarrito">
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Metodos de pago:</p>
                        <!-- <img src="../../dist/img/credit/visa.png" alt="Visa">
                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express"> -->
                    <img src="<?php echo $ruta;?>images/icons/icon-pay-01.png" alt="ICON-PAY">

                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Los precios de los productos ofrecidos en esta Tienda Online pueden tener variaciones mínimas de
                        precio en cuanto a la tienda física de la empresa Supermercado La Liebre. <br>
                        En caso de pedidos, puede haber variación en precios si los productos no son recogidos en un
                        lapso de 6hrs .
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <!-- <p class="lead">Amount Due 2/22/2014</p> -->

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td id="subtotal"> </td>
                            </tr>
                            <tr>
                                <th>Envio:</th>
                                <td id="envio">$0.00</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td id="total">$00.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <?php include_once('administrador/templates/footer.php');?>
    <!-- ./wrapper -->
    <script>
    var meses = new Array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre",
        "Octubre", "Noviembre", "Diciembre");
    var diasSemana = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    var f = new Date();
    $('#fecha').html(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f
        .getFullYear());
    </script>
    <script src="<?php echo $ruta?>/js/recursos/impresiones.js"></script>
</body>

</html>