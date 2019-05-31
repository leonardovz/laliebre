<?php 

function limpiarDatos($datos){
	$datos = trim($datos);
	$datos = stripslashes($datos);
	$datos = htmlspecialchars($datos);
	return $datos;
}
function conexionSQLI($bd_config){
	$conexion = new mysqli($bd_config['host'],$bd_config['usuario'],$bd_config['pass'],$bd_config['basedatos']);
	$conexion->set_charset("utf8");
	return $conexion;
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
/***************************************************** */
/***************************************************** */
/***************************************************** */
// En esta seccion solo utiliso mysqli
/***************************************************** */
/***************************************************** */
/***************************************************** */
function obtenerproductos($conexion,$accion,$busqueda,$actual){
	$mostrados = 8;
	$actual = $mostrados*$actual;
	$sql="SELECT productos.*, categoria.Nombre as catNombre FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id WHERE idCategoria = 0";
	switch ($accion) {
		case 'principal':
			$sql="SELECT productos.*, categoria.Nombre as catNombre FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id LIMIT $actual,$mostrados";
			break;
		case 'busqueda':
			$sql="SELECT productos.*, categoria.Nombre as catNombre FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id WHERE categoria.Nombre LIKE '%$busqueda%' OR productos.Nombre LIKE '%$busqueda%' OR productos.Descripcion LIKE '%$busqueda%'  LIMIT $actual,$mostrados";
		break;
		case 'categoria':
			$sql="SELECT productos.*, categoria.Nombre as catNombre FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id WHERE `idCategoria` =  $busqueda LIMIT $actual,$mostrados";
		break;
	}
	$respuesta= $conexion->query($sql);
	if($respuesta->num_rows){
        return $respuesta;
    }else{
        return  false;
    }
}
function obtenerPaginacion($conexion,$accion,$busqueda){
	
			$sql="SELECT  COUNT(*) AS Total FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id WHERE idCategoria = 0";
	switch ($accion) {
		case 'principal':
			$sql="SELECT COUNT(*) AS Total FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id";
			break;
		case 'busqueda':
			$sql="SELECT  COUNT(*) AS Total FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id WHERE categoria.Nombre LIKE '%$busqueda%' OR productos.Nombre LIKE '%$busqueda%' OR productos.Descripcion LIKE '%$busqueda%' ";
		break;
		case 'categoria':
			$sql="SELECT  COUNT(*) AS Total FROM `productos` INNER JOIN categoria ON productos.idCategoria = categoria.id WHERE `idCategoria` =  $busqueda";
		break;
	}
	$respuesta= $conexion->query($sql);
	if($respuesta->num_rows){
		$respuesta->fetch_assoc();
        return $respuesta['Total'];
    }else{
        return  false;
    }
}

function traerCategoriasSQLI($conexion){
	$sql = "SELECT Nombre FROM categoria ORDER BY Nombre ASC";
	$resultado = $conexion->query($sql);
    return ($resultado->num_rows) ? true : false;
}
function traerProdRelacionados($conexion,$categoria,$inicio,$limite){
	$sql="SELECT p.id, p.Nombre, p.Descripcion, p.imagen, p.idCategoria, c.Nombre AS catNombre, p.precio, p.fecha, p.idUsuario, p.estado FROM productos p INNER JOIN categoria c ON c.id = p.idCategoria WHERE p.idCategoria = $categoria LIMIT ".(($inicio) ? " $inicio,":"")."$limite";
	$resultado = $conexion->query($sql);
    return ($resultado->num_rows) ? $resultado : false;
}

/***************************************************** */
/***************************************************** */
/***************************************************** */

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
	function eliminar_tildes($cadena){ //Tomada de https://www.neoguias.com/eliminar-acentos-con-php/ 	

		//Codificamos la cadena en formato utf8 en caso de que nos de errores
		// $cadena = utf8_encode($cadena);
	
		//Ahora reemplazamos las letras
		$cadena = str_replace(
			array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
			array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
			$cadena
		);
	
		$cadena = str_replace(
			array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
			array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
			$cadena );
	
		$cadena = str_replace(
			array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
			array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
			$cadena );
	
		$cadena = str_replace(
			array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
			array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
			$cadena );
	
		$cadena = str_replace(
			array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
			array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
			$cadena );
	
		$cadena = str_replace(
			array('ñ', 'Ñ', 'ç', 'Ç'),
			array('n', 'N', 'c', 'C'),
			$cadena
		);
	
		return $cadena;
	}
?>