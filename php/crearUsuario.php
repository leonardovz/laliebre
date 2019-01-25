<?php 
// session_start();
require '../config/config.php';
require '../config/funciones.php';
$conexion = conexion($bd_config);

if (!$conexion) {
	// header('Location: ../error.php');
}
// session_start(); $_SESSION['type']>0
if(true){
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Nombre = $_POST['nombreUser'];//Nombre de el producto
	$Contraseña = $_POST['password'];//Nombre de el producto
	$Contraseña2 = $_POST['password2'];//Nombre de el producto
    $tipoUser = $_POST['tipoUser'];//Descripcion Copleta

	$subir = "INSERT INTO `usersys` (`nameU`, `password`, `prioridad`) VALUES ('$Nombre', '$Contraseña', '$tipoUser');";
	$statement = $conexion->prepare($subir);
	$statement->execute();
	$statement-> fetchall();
	echo '<script language="javascript">alert("Registro Guardado con exito");</script>';
	header('Location: ../account.php');
	// $conexion->close();
}
}else header('Location: index.php');
?>