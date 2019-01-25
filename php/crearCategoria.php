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
    $Nombre = $_POST['nombreCategoria'];//Nombre de el producto	
    $subir = "INSERT INTO `categoria`(`Nombre`) VALUES ('$Nombre');";
    echo $subir;
    $statement = $conexion->prepare($subir);
    $statement->execute();
    $statement-> fetchall();
	echo '<script language="javascript">alert("Categoria Guardado con exito");</script>';
	header('Location: ../account.php');
	// $conexion->close();
}
}else header('Location: index.php');
?>