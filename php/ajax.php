<?php
session_start();
require_once '../config/config.php';
require_once '../config/funciones.php';
require_once '../config/rutas.php';

    $conexion = conexionSQLI($bd_config);

if (!$conexion) {
    $respuesta = array(
        'respuesta' => 'error',
        'Texto' => 'Hay un problema al conectar con el servidor'
    );
    die(json_encode($respuesta));
}

 $_POST['opcion']="prodRelacionado";
 $_POST['idCategoria']=1;
$ruta = ruta(); //Usamos la ruta absoluta para no tener conflicto con las direcciones
if(!isset($_POST['opcion'])){
    // echo '<script>window.location.replace("' . $ruta . '");</script>';
    // die();
}
switch ($_POST['opcion']) {
    case 'prodRelacionado':
        
    break;
}

?> 