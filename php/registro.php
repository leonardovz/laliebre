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
//  $_POST['idCategoria']=1;
$ruta = ruta(); //Usamos la ruta absoluta para no tener conflicto con las direcciones

// die(json_encode($_POST));

if(isset($_POST['nombre']) &&  isset($_POST['apellidos']) &&  isset($_POST['correo']) &&  isset($_POST['password1']) &&  isset($_POST['password2'])){
    $nombre =  $_POST['nombre']; //
    $apellidos =  $_POST['apellidos'];//
    $correo =  $_POST['correo'];//
    $password1 =  $_POST['password1'];
    $password2 =  $_POST['password2'];
if(valEmail($correo)){
    if(valText($nombre) || valText($apellidos)){
        if(valDomicilio($password1)){
            $password = md5($password1);
            $correoEncript = md5($correo);
            $tipoUser = 2;
            $validar = 0;
            $modo = 'directo';



            if ($password1 == $password2) {
                $statement=$conexion->prepare('INSERT INTO `usuarios`(`nombre`, `apellidos`, `correo`, `password`, `tipoUser`, `validar`, `encriptado`, `modo`) VALUES (?,?,?,?,?,?,?,?)');
                $statement->bind_param('ssssiiss',$nombre,$apellidos,$correo,$password,$tipoUser,$validar,$correoEncript,$modo);
                $statement->execute();
                if ($statement->affected_rows >= 1) {
                    $respuesta = array(
                        'respuesta'=>'exito',
                        'Texto' => 'Registro Exitoso, contactenos para verificar y validar su Cuenta '
                    );
                    $idPublicacion = $statement->insert_id;
                }else{
                    $respuesta = array(
                        'respuesta'=>'error',
                        'Texto' => 'Error al realizar el registro  ' .(($statement->errno == 1062) ? $correo." ya esta registrado":$statement->error),
                    );
                }
            } else {
                $respuesta = array(
                    'respuesta'=>'error',
                    'Texto' => 'Las contraseñas no coinciden',
                );
            }
            
        }else{
            $respuesta = array(
                'respuesta'=>'error',
                'Texto' => 'Caracteres Invalidos en la contraseña',
            );
        }
    }else{
        $respuesta = array(
            'respuesta'=>'error',
            'Texto' => 'Caracteres invalidos en nombre u apellido, solo ingresa letras',
        );
    }
}else{
    $respuesta = array(
        'respuesta'=>'error',
        'Texto' => 'Introdugiste caracteres no validos',
    );
}
}else{
    $respuesta = array(
        'respuesta'=>'error',
        'Texto' => 'Correo electronico escrito de forma incorrecta',
    );
}


// $respuesta = array(
//     'respuesta'=>'error',
//     'Texto' => 'Introdugiste caracteres no validos',
// );

echo json_encode($respuesta);

?>