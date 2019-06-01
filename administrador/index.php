<?php include_once ('administrador/templates/header.php');?>


<?php include_once ('administrador/templates/header.view.php');?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Historial de Compras
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li><a href="#">Mis Compras</a></li>
            <li class="active">Linea de compras</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->

                    <li class="time-label">
                        <span class="bg-red">
                            30 de Mayo de 2019
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">En estado de entrega</a> recoger en sucursal</h3>

                            <div class="timeline-body">
                                El total de tu compra fue <strong>$ 8,00.00 MXN</strong>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">Revisar Nota</a>
                                <!-- <a class="btn btn-danger btn-xs"></a> -->
                            </div>
                        </div>
                    </li>
                    <li class="time-label">
                        <span class="bg-red">
                            27 de enero de 2019
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Tu compra </a> Fue retirada en sucursal</h3>

                            <div class="timeline-body">
                                El total de tu compra fue <strong>$ 3,650.00 MXN</strong>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">Revisar Nota</a>
                                <!-- <a class="btn btn-danger btn-xs"></a> -->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline time label -->

                    <li class="time-label">
                        <span class="bg-red">
                            30 de Mayo de 2019
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-green"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">En estado de entrega</a> recoger en sucursal</h3>

                            <div class="timeline-body">
                                El total de tu compra fue <strong>$ 8,00.00 MXN</strong>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">Revisar Nota</a>
                                <!-- <a class="btn btn-danger btn-xs"></a> -->
                            </div>
                        </div>
                    </li>
                    <li class="time-label">
                        <span class="bg-red">
                            27 de enero de 2019
                        </span>
                    </li>
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">Tu compra </a> Fue retirada en sucursal</h3>

                            <div class="timeline-body">
                                El total de tu compra fue <strong>$ 3,650.00 MXN</strong>
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-xs">Revisar Nota</a>
                                <!-- <a class="btn btn-danger btn-xs"></a> -->
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
        </div>

    </section>
    <!-- /.content -->
</div>

<?php include_once('templates/footer.php');?>
<script>
$(document).ready(function() {
    $('.select2').select2();
    //Money Euro
    $('[data-mask]').inputmask();
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass: 'iradio_flat-green'
    });
});
</script>
</body>

</html>