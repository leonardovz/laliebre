<?php include_once ('administrador/templates/header.php');?>


<?php include_once ('administrador/templates/header.view.php');?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Configuración de mi perfil
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Cuenta</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 box"><br><br>
                <form id="formRegistroUser" class="form-horizontal" action="<?php echo $ruta;?>php/usuario.php" method="POST" >
                    <div class="box-body">
                        <input id="titulo" name="titulo" class="form-control input-lg" type="text" placeholder="Nombre del Producto" required><br>
                        <div class="form-group m-auto">
                            <label style="margin-left:10vw;">
                            <input name="publicacion" value="Inicio" type="radio" class="flat-red" >
                                Activa
                            </label>
                            <label style="margin-left:10vw;">
                            <input name="publicacion" value="Blog" type="radio" class="flat-red" checked>
                                Inactica
                            </label>
                            <label style="margin-left:10vw;">
                            <input name="publicacion" value="Galeria" type="radio" class="flat-red">
                                Oferta
                            </label>
                        </div>
                        <textarea id="contenidoText" name="contenidoText" class="form-control" placeholder="Escribe aquí la descripción de tu publicación" style="max-width: 100%;  min-width: 100%; max-height: 200px; min-height: 80px;" required></textarea>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inGaleria">Selecciona la imagen del producto</label>
                                <input type="file" id="inGaleria" name="imagen" required>
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inRangoUser" class="col-md-2 control-label">Categoria</label>
                            <div class="col-md-4">
                                <select  name ="inRangoUser" id="inRangoUser" class="form-control select2" style="width:100%;">
                                    <option value="">Costo del producto</option>
                                    <option value="1">Implan</option>
                                    <option value="2">Director</option>
                                    <option value="3">Usuario</option>
                                </select>
                            </div>
                        <div class="col-md-6">
                        <input id="titulo" name="titulo" class="form-control" type="text" placeholder="Costo del Producto $precio.00" required><br>

                        </div>
                        </div>
                        
                        <div class="form-group">
                            <div id="errores"></div>
                        </div>
                        <button type="submit" class="btn btn-block btn-warning btn-lg">Enviar formulario</button>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Guardar Cambios</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>


</div>

<?php include_once('templates/footer.php');?>
<script>
$(document).ready(function() {
    $('.select2').select2();
    //Money Euro
    $('[data-mask]').inputmask();
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-red',
      radioClass   : 'iradio_flat-green'
    });
});

</script>
</body>

</html>