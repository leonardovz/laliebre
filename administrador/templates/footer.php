<script src="<?php echo $ruta;?>administrador/recursos/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/plugins/iCheck/icheck.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/dist/js/adminlte.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/dist/js/demo.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $ruta;?>administrador/recursos/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $ruta;?>vendor/sweetalert/sweetalert2.all.min.js"></script>
<script>
    $("#cerrarSesion").on('click',function(e){
        e.preventDefault();
        var t = void 0;
        Swal.fire({
            title: "Cerrando Sesión",
            html: "Cerrando <strong></strong>",
            timer: 2000,
            onBeforeOpen: function() {
            Swal.showLoading(), t = setInterval(function() {
                Swal.getContent().querySelector("strong").textContent = Swal.getTimerLeft()
            }, 100)
            },
            onClose: function() {
            clearInterval(t)
            }
        }).then(function(t) {
            window.location.replace("<?php echo $ruta;?>php/cerrarSesion.php");
            // t.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer")
        })
        
    });
</script>