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
                <form  id="nuevoProducto"  method="POST" enctype="multipart/form-data" >
                    <div class="box-body">
                        <input id="nombreProd" name="nombreProd" class="form-control input-lg" type="text" placeholder="Nombre del Producto" required><br>
                        <div class="form-group m-auto">
                            <label style="margin-left:10vw;">
                            <input name="publicacion" value="ac" type="radio" class="flat-red" >
                                Activa
                            </label>
                            <label style="margin-left:10vw;">
                            <input name="publicacion" value="in" type="radio" class="flat-red" checked>
                                Inactica
                            </label>
                            <label style="margin-left:10vw;">
                            <input name="publicacion" value="promo" type="radio" class="flat-red">
                                Oferta
                            </label>
                        </div>
                        <textarea id="Descripcion" name="Descripcion" class="form-control" placeholder="Escribe aquí la descripción de tu publicación" style="max-width: 100%;  min-width: 100%; max-height: 200px; min-height: 80px;" required></textarea>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inGaleria">Selecciona la imagen del producto</label>
                                <input type="file" id="inGaleria" name="imagen" required>
                                <p class="help-block">Example block-level help text here.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="categoria" class="col-md-2 control-label">Categoria</label>
                            <div class="col-md-4" id="contCategoria">
                                <select  name ="categoria" id="categoria" class="form-control select2" style="width:100%;">
                                    <option value="">Categiria</option>
                                </select>
                            </div>
                        <div class="col-md-6">
                            <input id="precio" name="precio" class="form-control" type="text" placeholder="Costo del Producto $precio.00" required><br>
                        </div>
                        </div>
                        
                        <div class="form-group">
                            
                        </div>
                        <button type="submit" class="btn btn-block btn-success   btn-lg">Enviar formulario</button>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <!-- <button type="submit" class="btn btn-info pull-right">Guardar Cambios</button> -->
                    </div>
                    <!-- /.box-footer -->
                </form>
                <div class="col-md 12">
                    <div id="errores"></div>
                </div>
            </div>
            <div class="col-md-12 box"><br><br>
                <form  id="registroCategoria"  method="POST" enctype="multipart/form-data" >
                    <div class="col-md-8">
                        <div class="form-group">
                            <input id="nombreCategoria" name="nombreCategoria" class="form-control  " type="text" placeholder="Nueva Categoria" required>
                        </div>
                    </div>
                        <div class="col-md-4">
                        <button type="submit" class="btn bg-green pull-right btn-block">Guardar Categoria</button>

                        </div>
                    <div class="box-footer">
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer> -->
</div>

<?php include_once('administrador/templates/footer.php');?>
<script src="<?php echo $ruta;?>js/recursos/producto.js"></script>
</body>

</html>