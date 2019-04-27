<?php
include_once ('../config/config.php');
include_once ('../config/funciones.php');
include_once ('../config/rutas.php');

$conexion = conexionSQLI($bd_config);

if ($conexion->connect_errno) {
    $respuesta = array(
        'respuesta' => 'error',
        'Texto' => 'Hay un problema al conectar con el servidor'
    );
    die(json_encode($respuesta));
}
$ruta = ruta();
// $_POST['accion'] = "principal";
// // $_POST['busqueda'] = 'cereal';
// $_POST['actual'] = 0;

if( isset($_POST['accion']) &&  isset($_POST['actual']) ){
    $respuesta = false;
    if( isset($_POST['busqueda']) ){
        $respuesta = obtenerproductos($conexion,$_POST['accion'],$_POST['busqueda'],$_POST['actual']);
        // die($_POST['accion'].$_POST['busqueda'].$_POST['actual']);
    }else{
        $respuesta = obtenerproductos($conexion,$_POST['accion'],NULL,$_POST['actual']);
    }

    if($respuesta){
        echo '<div class="row isotope-grid">';
        while ($post = $respuesta->fetch_assoc()) {
            $id = $post['id'];
            $nombre = $post['Nombre'];
            $descripcion= $post['Descripcion'];
            $precio= $post['precio'];
            $img= $post['imagen'];
            $idCategoria = $post['idCategoria'];
            $categoria = $post['catNombre'];?>
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo str_replace(' ', '', $categoria);?>">
                <!-- Block2 -->
                <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="<?php echo $ruta.'imagenes_a_subir/'.$img;?>" alt="IMG-PRODUCT">

                        <a href="<?php echo $ruta .$ubicacion['productos'].'/'. $id;?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                            Vista Previa
                        </a>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                <?php echo $nombre;?>
                            </a>

                            <span class="stext-105 cl3">
                            $ <?php echo $precio;?> MXN
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                <img class="icon-heart1 dis-block trans-04" src="<?php echo $ruta;?>images/icons/icon-heart-01.png" alt="ICON">
                                <img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo $ruta;?>images/icons/icon-heart-02.png" alt="ICON">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } 
        echo '</div>';
    }else{
        echo "no hay respuesta";
    }
}
else {
    echo "no hay datos";
}

?>