<?php 

require 'config/config.php';
require 'config/funciones.php';
require 'config/rutas.php';

if(isset($_POST['cantidadProd'])){
    $numeroProductos = $_POST['cantidadProd']+$galeria_config['post_por_pagina'];
}else{
    $numeroProductos = $galeria_config['post_por_pagina'];
}
$conexion = conexion($bd_config);
$posts = obtener_post($numeroProductos, $conexion);
$ruta = ruta();


//******************************** */
// ********Lista blanca de URLS ** */
//******************************** */



if(isset($_GET['ruta'])){
    $rutas = explode("/",$_GET['ruta']);

    if($rutas[0]==='tienda'){                    ////// TIENDA
        require 'views/product.view.php';
    }
    elseif($rutas[0]==='productos'){            //////PRODUCTOS
    require 'views/product-detail.view.php';
    }
    elseif($rutas[0]==='acercade'){            //////ACERCA DE 
    require 'views/acercade.php';
    }
    elseif($rutas[0]==='contacto'){            ////// CONTACTO
    require 'views/contact.php';
    }
    elseif($rutas[0]==='perfil'){            ////// perfil
    require 'views/account.php';
    }
    
}else{                                          ////// INDEX
     require_once 'views/index.view.php';
}


