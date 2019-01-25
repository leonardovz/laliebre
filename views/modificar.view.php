<?php 
include('config/config.php');
include('config/funciones.php');
$headerContent = "header-v4";
$headerContentShadow = "how-shadow1";
include('views/header.php');
$conexion = conexion($bd_config);
$categorias = Categoria($conexion);
// $productos = allProductos($conexion);
?>

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="cl5">
					MODIFICAR <span class="ltext-103 text-success"> <?php echo $_POST['Nombre'];?></span>
				</h3>
			</div>
            <form  action="" enctype="multipart/form-data" method="post" >
                <div class="form-row">
                    <div class="col-md-6 mb-6">
                        <input type="text" id="idProduct"hidden>
                        <label for="nombreProducto">Nombre del Producto</label>
                        <input type="text" class="form-control" id= "nombreProducto" name="nombreProducto" placeholder="Nombre" value = "<?php echo $_POST['Nombre'] ?>"required>
                    </div>
                    <div class="col-md-6 mb-6">
                        <label for="precioProducto">Precio</label>
                        <input type="text" class="form-control" id="precioProducto" name="precioProducto" placeholder="$$$$-$$$$" value = "<?php echo $_POST['precio'] ?>" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-8 mb-8">
                        <label for="categoriaProducto">Selecciona tu Categoria</label>
                        <select style="width: 100%;"id="categoriaProducto" name="categoriaProducto" class="custom-select custom-select-lg mb-3">
                            <option selected>Selecciona la Categoria</option>
                            <?php foreach ($categorias as $categoria) {
                                if($_POST['idCategoria']== $categoria['id'] ){
                                    echo '<option value="'.$categoria['id'].'" selected>'.$categoria['Nombre'].'</option>';
                                }else{
                                    echo '<option value="'.$categoria['id'].'">'.$categoria['Nombre'].'</option>'; 
                                }
                            }?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 m-b-6">
                        <div class="custom-file m-b-12">
                            <label class ="config_filemanager"for="thumb"><i class="fas fa-upload"></i> <span>Modificar imagen</span></label>
                            <input type="file" name="thumb" id="thumb">
                            <span id="nameFileNew"></span>
                        </div>
                    </div>
                </div>
                <div class="form-row m-t-12">
                    <label for="descripcionProducto">Descripción</label>
                    <textarea class="form-control m-b-12" id="descripcionProducto" name = "descripcionProducto" rows="5" placeholder="Ingresa el texto que describe tu producto"><?php echo $_POST['Descripcion'] ?></textarea>
                </div>
                
                <button id="btnModificar" class="bflex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" type="submit">Guardar Producto</button>
            </form>
		</div>
	</section>

<script src="js/modProdc.js"></script>
<script type="application/javascript">
    jQuery('input[type=file]').change(function(){
    var filename = jQuery(this).val().split('\\').pop();
    var file = jQuery(this).val();
    var idname = jQuery(this).attr('id');
    document.getElementById('nameFileNew').innerHTML = filename;
    });
</script>
<?php require 'views/footer.php';?>