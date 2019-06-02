<?php
    session_start();
    require_once '../config/config.php';
    require_once '../config/funciones.php';
    // require_once '../config/sesiones.php';
    validarImagen();

    $conexion = conexionSQLI($bd_config);

    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        die('ERROR');
    }
    $_SESSION['idusuario'] =1;
    if( isset( $_POST['nombreProd']) && isset( $_POST['publicacion'])&& isset( $_POST['Descripcion'])&& isset( $_POST['categoria'])&& isset( $_POST['precio']) ){
        
        $Nombre =   $_POST['nombreProd'];
        $publicacion =  $_POST['publicacion'];
        $Descripcion =  $_POST['Descripcion'];
        $idCategoria =    $_POST['categoria'];
        $precio =       $_POST['precio'];
        $estado = 'ac';


    }else{
        $respuesta = array(
            'respuesta'=>'error',
            'texto' => 'Los datos no se enviaron de manera Correcta'
        );
        die(  json_encode($respuesta) );
    }

    $tipo = $_FILES["imagen"]["type"];
    $tipo = explode("/",$tipo);

    (int)$idUsuario = $_SESSION['idusuario'];
    $directorios = 'images/productos/';
    $idPublicacion = 0;

        $tipo = $_FILES["imagen"]["type"];
        // $admitidos = ["image/jpg", "image/jpeg", "image/gif", "image/bmp", "image/png"];
        // if(array_search($tipo, $admitidos)){
        $tipo = explode("/",$tipo);
        $filename = $idCategoria.'_prodc_'.time().'.'.$tipo[1]; //Obtenemos el nombre original del archivo
        $filename = str_replace(" ","",$filename);
        $source = $_FILES["imagen"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
        $directorio = '../'.$directorios; //Declaramos un  variable con la ruta donde guardaremos los archivos OJO si la ruta no es Abtoluta lo guardara en la misma ruta donde se ejecute el php
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        // echo $directorio;
        if(!file_exists($directorio)){
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracción");	
        }
        
        $dir=opendir($directorio); //Abrimos el directorio de destino
        $target_path = $directorio.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
        
        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        

        if(move_uploaded_file($source, $target_path)) {
            
            $imagen=$directorios.$filename;
            $statement=$conexion->prepare('INSERT INTO `productos`(`Nombre`, `Descripcion`, `imagen`, `idCategoria`, `precio`, `idUsuario`, `estado`) VALUES (?,?,?,?,?,?,?);');
            $statement->bind_param('sssisis',$Nombre,$Descripcion,$imagen,$idCategoria,$precio,$idUsuario,$estado);
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
        
        
        
        } else {	
            $respuesta = array(
                'respuesta'=>'error',
                'texto' => 'Ha ocurrido un error, por favor inténtelo de nuevo.'
            );
        }
        closedir($dir); //Cerramos el directorio de destino
//   }  
    
    die(json_encode($respuesta));


function validarImagen(){
    if(!isset($_FILES) || empty($_FILES)){
        die(json_encode(array(
            'respuesta'=>'error',
            'texto' => 'No hay Imagenes'
        )));
    }
        $tipo = $_FILES["imagen"]["type"];
        $admitidos = ["image/jpg", "image/jpeg", "image/gif", "image/bmp", "image/png"];
        if(array_search($tipo, $admitidos)){
            $imagen = getimagesize($_FILES['imagen']['tmp_name']);
            if($_FILES['imagen']['size'] > 750000){
                die(json_encode(array(
                    'respuesta'=>'error',
                    'texto' => 'tamaño exedido ' .$_FILES["imagen"]['name'] .' solo se permiten 0.75mb'
                )));
            }else{
                // this.width.toFixed(0) !=  this.height.toFixed(0)  && ( this.width.toFixed(0)<950 || this.width.toFixed(0)> 1200
                if($imagen[0] != $imagen[1] && ($imagen[0] <950 || $imagen[0]> 1200) ){
                    die(json_encode(array(
                        'respuesta'=>'error',
                        'texto' => 'Error el ancho = '.$imagen[0].'px y el alto = '.$imagen[1] .'px'. '. Se debe de subir en las medidas 1920px x 1280px'
                    )));
                }
            }
        }else{
            die(json_encode(array(
                'respuesta'=>'error',
                'texto' => 'tamaño exedido '
            )));
        }
        
    //  die(json_encode(array('respuesta'=>'error','texto' => 'Prueva de imagenes ancho = '.$ancho.' alto = '.$alto)));
}

?>