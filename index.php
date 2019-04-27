<?php 

require 'config/config.php';
require 'config/funciones.php';
require 'config/rutas.php';

$ruta = ruta();
if(isset($_GET['ruta'])){
    $rutas = explode("/",$_GET['ruta']);

    if($rutas[0]==='tienda'){                    ////// TIENDA
        require_once 'views/product.view.php';
    }
    elseif($rutas[0]==='productos'){            //////PRODUCTOS
        require_once 'views/product-detail.view.php';
    }
    elseif($rutas[0]==='acercade'){            //////ACERCA DE 
        require_once 'views/acercade.php';
    }
    elseif($rutas[0]==='contacto'){            ////// CONTACTO
        require_once 'views/contact.php';
    }
    elseif($rutas[0]==='account' ){            ////// perfil
        require_once 'administrador/index.php';
    }
    elseif($rutas[0]==='login' ){            ////// perfil
        require_once 'administrador/login.php';
    }else{
        require_once 'error.php';
    }
    
}else{                                             ////// INDEX
     require_once 'views/index.view.php';
}


