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
if ($conexion->connect_errno){
	$respuesta = array(
		'respuesta'=> 'error',
		'Texto'=> 'Hay un problema al conectar con el servidor'
	);
	die(json_encode($respuesta));
}

if(isset($_POST['email'])) {
	$correo		= $_POST['email'];
	$pass		= $_POST['password'];

    $encriptarPass = md5($pass);

	//--------------------------------- //
	//-----------VALIDACION ----------- //
	//--------------------------------- //
	if(preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/',$correo) && preg_match('/^[a-zA-Z0-9]*$/',$pass)){
		if($resultado = compararUsuario($conexion,$correo)){
            
			if($resultado['tipoUser']<1){
				$respuesta = array(
					'respuesta'=> 'error',
					'Texto'=> 'No tienes permitido ingresar al sistema'
                );

			}else if($encriptarPass==$resultado['password']){
				$_SESSION['validarSesion']	= 	"ok";
				$_SESSION['idUsuario']		= 	$resultado['idUsuario'];
				$_SESSION['nombre']			= 	$resultado['nombre'];
				$_SESSION['apellidos']		= 	$resultado['apellidos'];
				$_SESSION['correo']			= 	$resultado['correo'];
				$_SESSION['tipoUser']		=	$resultado['tipoUser'];
				$respuesta = array(
					'respuesta'=> 'exito',
					'Texto'=> 'Iniciando Sesión'
				);
			}else{
				$respuesta = array(
					'respuesta'=> 'error',
					'Texto'=> 'correo o contraseña incorrectos'
				);
			}
        }else{
                $respuesta = array(
                    'respuesta'=> 'error',
                    'Texto'=> 'El usuario no existe'
                );
		}
	}else{
		$respuesta = array(
			'respuesta'=> 'error',
			'Texto'=> 'No puede enviar Caracteres especiales Revice la información'
		);
	}

	
die(json_encode($respuesta));
}

function compararUsuario($conexion, $correo){
	$sql = "SELECT `idUsuario`, `nombre`, `apellidos`, `correo`, `password`, `tipoUser` FROM `usuarios` WHERE  correo = '$correo';";
	$resultado = $conexion->query($sql);
	if($resultado->num_rows){
		$fila = $resultado->fetch_assoc();
			return $fila;
	}else {
		return false;
	}
}
?>