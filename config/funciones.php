<?php 

function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}

function conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host='.$bd_config['host'].';dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass'],array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}
function obtener_post($post_por_pagina, $conexion){
	$inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
	$sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM productos LIMIT $inicio, $post_por_pagina");
	$sentencia->execute();
	return $sentencia->fetchAll();
}
function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}
function obtenerCategoria($idCategoria,$conexion){
	$sentencia = $conexion->prepare("SELECT Nombre FROM categoria WHERE id = $idCategoria");
	$sentencia->execute();
	return $sentencia->fetchAll();
}
function traerCategorias($conexion){
	$sentencia = $conexion->prepare("SELECT Nombre FROM categoria ORDER BY Nombre ASC");
	$sentencia->execute();
	return $sentencia->fetchAll();
}
function Categoria($conexion){
	$sentencia = $conexion->prepare("SELECT * FROM categoria ORDER BY Nombre ASC");
	$sentencia->execute();
	return $sentencia->fetchAll();
}
?>
<?php function mostrarCategorias($categoria){ ?>
    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo str_replace(' ', '', $categoria);?> ">
        <?php echo $categoria; ?>
    </button>
<?php } ?>

<?php 
	function buscarProducto($idProducto,$conexion){
		$sentencia = $conexion->prepare("SELECT * FROM productos WHERE id = $idProducto");
		$sentencia->execute();
		$valores =  $sentencia->fetchAll();
		return $valores[0];
	}
	function allProductos($conexion){
		$sentencia = $conexion->prepare("SELECT * FROM productos ORDER BY id ASC");
		$sentencia->execute();
		return $sentencia->fetchAll();
		
	}
?>