<?php
session_start();
require_once '../config/config.php';
require_once '../config/funciones.php';
require_once '../config/rutas.php';

    $conexion = conexionSQLI($bd_config);
    $respuesta;
if (!$conexion) {
    $respuesta = array(
        'respuesta' => 'error',
        'Texto' => 'Hay un problema al conectar con el servidor'
    );
    die(json_encode($respuesta));
}

//  $_POST['opcion']="prodRelacionado";
 $_POST['idCategoria']=1;
$ruta = ruta(); //Usamos la ruta absoluta para no tener conflicto con las direcciones
if(!isset($_POST['opcion'])){
    // echo '<script>window.location.replace("' . $ruta . '");</script>';
    // die();
}
switch ($_POST['opcion']) {
    case 'categoriaOption':
        $categorias = traerCategoriasSQLI($conexion);
        echo '<select  name ="categoria" id="categoria" class="form-control select2" style="width:100%;">';
        if($categorias){
            while ($categoria = $categorias->fetch_assoc()) {
                echo '<option value ="'.$categoria['id'].'">'.$categoria['Nombre']. ' </option>';
            }
        }else{
            echo '<option value =""> No hay Categorias</option>';
        }
        echo '</select>';
    break;
    case 'nuevaCategoria':
        $categoria = (isset($_POST['nombreCat'])) ? $_POST['nombreCat']:false;
        if($categoria && valDomicilio($categoria)){
            $statement=$conexion->prepare('INSERT INTO `categoria`( `Nombre`) VALUES(?)');
            $statement->bind_param('s',$categoria);
            $statement->execute();
            if ($statement->affected_rows >= 1) {
                $respuesta = array(
                    'respuesta'=>'exito',
                    'texto' => 'Insercion realizada con exito '
                );
                $idPublicacion = $statement->insert_id;
            }else{
                $respuesta = array(
                    'respuesta'=>'error',
                    'texto' => 'Error al realizar el registro -> ' .$statement->error,
                );
            }
        }else{
            $respuesta = array(
                'respuesta'=>'error',
                'texto' => 'Introdugiste caracteres no validos',
            );
        }
        
        echo json_encode($respuesta);
    break;

}

?> 