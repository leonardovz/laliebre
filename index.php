<?php 

require 'config/config.php';
require 'config/funciones.php';

if(isset($_POST['cantidadProd'])){
    $numeroProductos = $_POST['cantidadProd']+$galeria_config['post_por_pagina'];
}else{
    $numeroProductos = $galeria_config['post_por_pagina'];
}
$conexion = conexion($bd_config);
$posts = obtener_post($numeroProductos, $conexion);


require 'views/index.view.php';

