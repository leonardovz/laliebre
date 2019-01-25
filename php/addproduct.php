<?php 
require 'formProducto.php';
function Herramientas(){?>
    <div class="accordion" id="accordionExample">
        <div class="card border-0 rounded-0 active">
            <div class="card-header" id="headingOne">
            <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Agregar producto
                </button>
            </h5>
            </div>

            <div id="collapseOne" class="collapsed show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <?php formularioProducto(); ?>
            </div>
            </div>
        </div>
        <div class="card border-0 rounded-0 ">
            <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Añadir Categoria
                </button>
            </h5>
            </div>
            <div id="collapseTwo" class="collapse rounded-0" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body ">
                    <?php formularioCategoria(); ?>
                </div>
            </div>
        </div>
        <div class="card border-0 rounded-0">
            <div class="card-header" id="heading4">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                    Añadir Usuario
                </button>
            </h5>
            </div>
            <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordionExample">
            <div class="card-body">
                <?php formularioUsuario(); ?>
            </div>
            </div>
        </div>
        <div class="card border-0 rounded-0">
            <div class="card-header" id="heading5">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                    Visualizar Contenido del Sitio
                </button>
            </h5>
            </div>
            <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordionExample">
                <div class="flex-c-m flex-w w-full p-t-45">
                    <a href="registros.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                        Productos
                    </a>
                </div>
                <div class="flex-c-m flex-w w-full p-t-45">
                    <a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                        Categoria
                    </a>
                </div>
                <div class="flex-c-m flex-w w-full p-t-45">
                    <a href="registros.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                        Usuarios
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php }?>

