<?php include_once ('templates/header.php');?>


<?php include_once ('templates/header.view.php');?>


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
            <div class="col-md-12 box red-border"><br><br>
                <form id="formRegistroUser" class="form-horizontal" action="<?php echo $ruta;?>php/usuario.php" method="POST" >
                    <div class="box-body">
                        <div class="form-group">
                        <label for="correo" class="col-sm-2 control-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="correo" id="correo" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="telefono" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="telefono"  id="telefono" data-inputmask='"mask": "(999) 999-9999"' placeholder="(___) ___-____" data-mask>
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="inNombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inNombre" id="inNombre" placeholder="Nombre">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inApellidos" class="col-sm-2 control-label">Apellidos</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="inApellidos" id="inApellidos" placeholder="Apellidos">
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="inRangoUser" class="col-sm-2 control-label">Nivel de Usuario</label>
                            <div class="col-md-10">
                                <select  name ="inRangoUser" id="inRangoUser" class="form-control select2" style="width:100%;">
                                    <option value="">Seleccione un Nivel</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Vendedor</option>
                                    <option value="3">Usuario</option>
                                </select>
                            </div>
                        
                        </div>
                        <div class="form-group">
                        <label for="inPassword" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="inPassword" id="inPassword" placeholder="Password">
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div id="pswd_info">
                                <h4>La contraseña debería cumplir con los siguientes requerimientos:</h4>
                                <ul>
                                    <li id="letter">Al menos debería tener <strong class="text-danger">una letra</strong></li>
                                    <li id="capital">Al menos debería tener <strong class="text-danger">una letra en mayúsculas</strong></li>
                                    <li id="number">Al menos debería tener <strong class="text-danger">un número</strong></li>
                                    <li id="length">Debería tener <strong class="text-danger">8 carácteres</strong> como mínimo</li>
                                </ul>
                            </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inPasswordR" class="col-sm-3 control-label">Repite la contraseña</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="inPasswordR" id="inPasswordR" placeholder="Password">
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div id="pswdR_info" class="text-danger">
                                <h4>Las Contraseñas no coinciden</h4>
                            </div>
                        </div>
                        <div class="col-md-12" ><div id=""></div></div>
                        
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="errores"></div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Registrar</button>
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
<script src="<?php echo $ruta;?>/js/recursos/usuario.js"></script>
<script>
$(document).ready(function() {
    $('.select2').select2()
    //Money Euro
    $('[data-mask]').inputmask()
});
</script>
</body>

</html>