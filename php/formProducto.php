<?php function formularioProducto(){ 
    require 'config/config.php';
    require 'config/funciones.php';
    $conexion = conexion($bd_config);
    $categorias = Categoria($conexion);
    ?>
    <div class="col-md-12">
        <form  action="php/crearProducto.php" enctype="multipart/form-data" method="post" >
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="nombreProducto">Nombre del Producto</label>
                    <input type="text" class="form-control" id= "nombreProducto" name="nombreProducto" placeholder="Nombre" required>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="precioProducto">Precio</label>
                    <input type="text" class="form-control" id="precioProducto" name="precioProducto" placeholder="$$$$-$$$$" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8 mb-8">
                    <label for="categoriaProducto">Selecciona tu Categoria</label>
                    <select style="width: 100%;"id="categoriaProducto" name="categoriaProducto" class="custom-select custom-select-lg mb-3">
                        <option selected>Selecciona la Categoria</option>
                        <?php foreach ($categorias as $categoria) {
                            echo '<option value="'.$categoria['id'].'">'.$categoria['Nombre'].'</option>';
                        }?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 m-b-6">
                    <div class="custom-file m-b-12">
                        <label for="thumb">Selecciona tu imagen</label>
                        <input type="file" name="thumb" id="thumb">
                    </div>
                </div>
            </div>
            <div class="form-row m-t-12">
                <label for="descripcionProducto">Descripción</label>
                <textarea class="form-control m-b-12" id="descripcionProducto" name = "descripcionProducto" rows="5" placeholder="Ingresa el texto que describe tu producto"></textarea>
            </div>
            
            <button class="bflex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" type="submit">Guardar Producto</button>
        </form>
    </div>
<?php }?>
<?php function formularioCategoria(){ ?>
    <div class="col-md-12">
        <form action="php/crearCategoria.php" method="post">
            <div class="form-row">
                <div class="col-md-6 m-b-12">
                    <label for="nombreCategoria">Nueva Categoria</label>
                    <input type="text" class="form-control" id= "nombreCategoria" name="nombreCategoria" placeholder="Categoría" required>
                </div>
            </div>
            <button class="bflex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" type="submit">Guardar Categoria</button>
        </form>
    </div>
<?php }?>

<?php function formularioUsuario(){ ?>
    <div class="col-md-12">
        <form action="php/crearUsuario.php" method="post">
            <div class="form-row">
                <div class="col-md-8 mb-8">
                    <label for="nombreUser">Nombre de Usuario</label>
                    <input type="text" class="form-control" id= "nombreUser" name="nombreUser" placeholder="Nombre" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-6">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña"  required>
                </div>
                <div class="col-md-6 mb-6">
                    <label for="password2">Repetir Contraseña</label>
                    <input type="password" class="form-control" id="password2" name="password2" placeholder="repite tu contraseña"  required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-8 mb-8">
                    <label for="tipoUser">Selecciona tipo de Usuario</label>
                    <select style="width: 100%;"id="tipoUser" name="tipoUser" class="custom-select custom-select-lg mb-3">
                        <option selected>Tipo de usuario</option>
                        <option value="user">Usuario</option>
                        <option value="admin">Administrador</option>
                        <option value="root">Programador</option>
                    </select>
                </div>
            </div>

            <button class="bflex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04" type="submit">Hacer Registro</button>
        </form>
    </div>
<?php }?>

