<?php 

require 'config/config.php';
require 'config/funciones.php';

$conexion = conexion($bd_config);
$posts = obtener_post($productos['post_por_pagina'], $conexion);

require 'views/datos.view.php';

?>