<?php 

require_once 'config/config.php';
require_once 'config/funciones.php';
require_once 'config/rutas.php';

$ruta = ruta();
if(isset($_GET['ruta'])){
    $rutas = explode("/",$_GET['ruta']);

    if($rutas[0]==='tienda'){                    ////// TIENDA
        require_once 'views/tienda.view.php';
    }
    elseif($rutas[0]==='productos'){            //////PRODUCTOS
        require_once 'views/product-detail.view.php';
    }
    elseif($rutas[0]==='acercade'){             //////ACERCA DE 
        require_once 'views/acercade.php';
    }
    elseif($rutas[0]==='contacto'){             ////// CONTACTO
        require_once 'views/contact.php';
    }
    elseif($rutas[0]==='carrito'){             ////// CONTACTO
        require_once 'views/carrito.view.php';
    }
    elseif($rutas[0]===$ubicacion['perfil'] ){  ////// perfil
        if( isset($rutas[1]) && !empty($rutas[1]) ){
            if($rutas[1]=='productos'){
                require_once 'administrador/productos.php';
            }
            elseif($rutas[1]=='usuarios'){
                require_once 'administrador/cuenta.php';
            }
            else{
                require_once 'error.php';
            }
        }else{
            require_once 'administrador/index.php';
        }
    }

    elseif($rutas[0]==='login' ){               ////// perfil
        
        require_once 'administrador/login.php';
    }else{
        require_once 'error.php';
    }
    
}else{                                             ////// INDEX
     require_once 'views/index.view.php';
}


