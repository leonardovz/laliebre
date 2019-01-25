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
	$Nombre = $_POST['nombreProducto'];//Nombre de el producto
	$Precio = $_POST['precioProducto'];//Nombre de el producto
    $Descripcion = $_POST['descripcionProducto'];//Descripcion Copleta
	$Categoria = $_POST['categoriaProducto'];//Llamada el Id de la categoria donde se estara Registrando

		//////////////////// Guardado de la imagen///////////////////////
		
	$thumb = $_FILES['thumb']['name'];//Nombre de la imagen
	$thumbFile = $_FILES['thumb']['tmp_name'];//Ruta de la imagen
	$ruta= "../imagenes_a_subir";//Ruta de la carpeta donde se moveran
	$ruta = $ruta."/".$thumb;
	move_uploaded_file($thumbFile,$ruta);
	$subir = "INSERT INTO `productos`(`Nombre`, `Descripcion`, `imagen`, `idCategoria`,`precio`) VALUES ('$Nombre','$Descripcion','$thumb',$Categoria,$Precio);";
	$statement = $conexion->prepare($subir);
	$statement->execute();
	$statement-> fetchall();
	echo '<script language="javascript">alert("Registro Guardado con exito");</script>';
	header('Location: ../account.php');
	// $conexion->close();
}
}else header('Location: index.php');
?>