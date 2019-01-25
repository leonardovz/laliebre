<?
/////// CONEXIÓN A LA BASE DE DATOS /////////
require '../config/config.php';
require '../config/funciones.php';
require 'showProduct.php';
$conexion = conexion($bd_config);

if (!$conexion)
{
	die("Fallo la conexion a la base de datos");
}

//////////////// VALORES INICIALES ///////////////////////

$targeta="";
$query="SELECT * FROM productos ORDER BY idCategoria";//La consulta

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['productos']))
{
	$q=($_POST['productos']);
	$query="SELECT * FROM productos WHERE 
		Nombre LIKE '%".$q."%' OR
        Descripcion LIKE '%".$q."%';";
}
        $sentencia = $conexion->prepare($query);
		$sentencia->execute();
		$valores =  $sentencia->fetchAll();

if ($valores)
{
    foreach ($valores as $valor) {
            $nombre = $valor['Nombre'];
            $descripcion= $valor['Descripcion'];
            $precio= $valor['precio'];
            $img= $valor['imagen'];
            $idCategoria = $valor['id'];
            $categoria = obtenerCategoria($idCategoria,$conexion);
            $categoria = $categoria[0]['Nombre'];
            $targeta = $targeta . 
            Targeta2($nombre,$descripcion,$precio,$img,$categoria,$idCategoria);
    }
	// Concatena los datos faltantes de la tabla y los imprime
	
} else
	{
		$targeta =  "No se encontraron coincidencias con sus criterios de búsqueda. + ";//Error al no encontrar resultados en la consulta
    }
    echo $targeta;
?>
