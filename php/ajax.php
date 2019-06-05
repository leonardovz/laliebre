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
                    'Texto' => 'Insercion realizada con exito '
                );
                $idPublicacion = $statement->insert_id;
            }else{
                $respuesta = array(
                    'respuesta'=>'error',
                    'Texto' => 'Error al realizar el registro -> ' .$statement->error,
                );
            }
        }else{
            $respuesta = array(
                'respuesta'=>'error',
                'Texto' => 'Introdugiste caracteres no validos',
            );
        }
        
        echo json_encode($respuesta);
    break;
    case 'traerUsuarios':
      
        // $inicio =       (isset($_POST['inicio']) )      ? $_POST['inicio'] : false;
        // $fin =          (isset($_POST['fin']) )         ? $_POST['fin'] : false;
        $usuarios = buscarUsuarios($conexion);
        if($usuarios){
            while($usuario = $usuarios->fetch_assoc()){
                // idUsuario`, `nombre`, `apellidos`, `correo`,`fecha
            ?>
                <tr>
                    <td><?php echo $usuario['nombre'].' '.$usuario['apellidos'];?> </td>
                    <td><?php echo $usuario['correo'];?> </td>
                    <td><?php echo $usuario['fecha'];?> </td>
                    
                    <td>
                        <?php if($usuario['validar']==0){ ?>
                            <a class="btn btn-block btn-danger btn-sm activarUser" idusuario="<?php echo $usuario['idUsuario'];?>" nombre="<?php echo $usuario['idUsuario'];?>"><span class=" glyphicon glyphicon-lock "></span></a></td>
                        <?php } else { ?>
                            <a class="btn btn-block btn-success btn-sm bloquearUser" idusuario="<?php echo $usuario['idUsuario'];?>" nombre="<?php echo $usuario['idUsuario'];?>"><span class="glyphicon glyphicon-ok"></span></a></td>
                        <?php }  ?>
                    
                    <td>
                        <button class="btn btn-block btn-danger btn-sm delUsuario" idusuario="<?php echo $usuario['idUsuario'];?>" nombre="<?php echo $usuario['idUsuario'];?>" > <i class="glyphicon glyphicon-trash"></i></button>
                    </td>
                </tr>
            <?php
            }
        }
        else{
            // echo 'no hay datos';
        }
    break;
    case 'traerCategorias':

    $categorias = traerCategoriasSQLI($conexion);
    if($categorias){
        while($categoria = $categorias->fetch_assoc()){
            // idUsuario`, `nombre`, `apellidos`, `correo`,`fecha
        ?>
            <tr>
                <td><?php echo $categoria['Nombre'];?> </td>
                <td>
                    <button class="btn btn-block btn-white btn-sm editarCategoria" idcategoria="<?php echo $categoria['id'];?>" nombre="<?php echo $categoria['Nombre'];?>" > <i class="	glyphicon glyphicon-edit"></i></button>
                </td>
            </tr>
        <?php
        }
    }
    else{
        // echo 'no hay datos';
    }
    break;
    case 'updateCategoria':

        $idCategoria      = (isset($_POST['idCategoria'])) ? $_POST['idCategoria'] : false;
        $nombreCategoria         = (isset($_POST['nombreCategoria'])) ? $_POST['nombreCategoria'] : 0;
        // updateCategoria
        // idCategoria
        // nombreCategoria
            // $idOficio = (isset($_POST['idOficio'])) ? $_POST['idOficio'] : false; 
        $respuesta;
        if($idCategoria){
            $sql = "UPDATE `categoria` SET `Nombre`='$nombreCategoria' WHERE id = $idCategoria";
            $resultado = $conexion->query($sql);
            if($resultado){
                $respuesta = array(
                    'respuesta'=> 'exito',
                    'Texto'=> 'Categoria actualizada con éxito'
                );
            }else{
                $respuesta = $respuesta = array(
                    'respuesta'=> 'error',
                    'Texto'=> 'Error al actualizar categoria'
                ); 
            }
        }else{
            $respuesta = $respuesta = array(
                'respuesta'=> 'error',
                'Texto'=> 'La categoria no puede ser modificado'
            );
        }
            
            echo (json_encode( $respuesta) );
    break;
    case 'activarUsuario':

        $idUsuario      = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : false;
        $status         = (isset($_POST['status'])) ? $_POST['status'] : 0;

            // $idOficio = (isset($_POST['idOficio'])) ? $_POST['idOficio'] : false; 
        $respuesta;
        if($idUsuario && $idUsuario!= $_SESSION['idUsuario']){
            $sql = "UPDATE `usuarios` SET `validar`=$status  WHERE `idUsuario` = $idUsuario AND tipoUser != 1";
            $resultado = $conexion->query($sql);
            if($resultado){
                $respuesta = array(
                    'respuesta'=> 'exito',
                    'Texto'=> 'Usuario actualizado con éxito'
                );
            }else{
                $respuesta = $respuesta = array(
                    'respuesta'=> 'error',
                    'Texto'=> 'Error al actualizar usuario'
                ); 
            }
        }else{
            $respuesta = $respuesta = array(
                'respuesta'=> 'error',
                'Texto'=> 'Este usuario no puede ser modificado'
            );
        }
            
            echo (json_encode( $respuesta) );
    break;
    case 'eliminarUsuario':

        $idUsuario      = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : false;
        $status         = (isset($_POST['status'])) ? $_POST['status'] : 0;

            // $idOficio = (isset($_POST['idOficio'])) ? $_POST['idOficio'] : false; 
        $respuesta;
        if($idUsuario && $idUsuario!= $_SESSION['idUsuario']){
            $sql = "DELETE FROM `usuarios` WHERE `idUsuario` = $idUsuario AND `idUsuario` != ".$_SESSION['idUsuario']." AND `tipoUser` != 1 AND validar = 0";
            $resultado = $conexion->query($sql);
            if($resultado){
                // echo
                $respuesta = array(
                    'respuesta'=> 'exito',
                    'Texto'=> 'Usuario eliminador con éxito'
                );
            }else{
                $respuesta = $respuesta = array(
                    'respuesta'=> 'error',
                    'Texto'=> 'Error al eliminar usuario'
                ); 
            }
        }else{
            $respuesta = $respuesta = array(
                'respuesta'=> 'error',
                'Texto'=> 'Este usuario no puede ser eliminado'
            );
        }
            
            echo (json_encode( $respuesta) );
    break;
    case 'updateUsuario':

        $idUsuario      = (isset($_POST['idUsuario'])) ? $_POST['idUsuario'] : false;
        $status         = (isset($_POST['status'])) ? $_POST['status'] : 0;

            // $idOficio = (isset($_POST['idOficio'])) ? $_POST['idOficio'] : false; 
        $respuesta;
        if($idUsuario && $idUsuario!= $_SESSION['idUsuario']){
            $sql = "DELETE FROM `usuarios` WHERE `idUsuario` = $idUsuario AND `idUsuario` != ".$_SESSION['idUsuario']." AND `tipoUser` != 1 AND validar = 0";
            $resultado = $conexion->query($sql);
            if($resultado){
                // echo
                $respuesta = array(
                    'respuesta'=> 'exito',
                    'Texto'=> 'Usuario eliminador con éxito'
                );
            }else{
                $respuesta = $respuesta = array(
                    'respuesta'=> 'error',
                    'Texto'=> 'Error al eliminar usuario'
                ); 
            }
        }else{
            $respuesta = $respuesta = array(
                'respuesta'=> 'error',
                'Texto'=> 'Este usuario no puede ser eliminado'
            );
        }
            
            echo (json_encode( $respuesta) );
    break;

}

?> 