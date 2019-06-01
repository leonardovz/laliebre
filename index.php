<?php 

require_once 'config/config.php';
require_once 'config/funciones.php';
require_once 'config/rutas.php';

$ruta = ruta();//Obtenngo una variable ruta donde me da la URL de el Sitio, para que sea siempre ruta absoluta
if(isset($_GET['ruta'])){
    //Separo la Ruta y la convierto en un arrelo para declarar cuales son las URIS amigables
    $rutas = explode("/",strtolower($_GET['ruta'])); 
    //cada condicional se hace cargo de traer la vista necesaria o la que esta solicitando el cliente
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
    // if (false) {

    // }
    elseif($rutas[0]==='carrito'){             ////// CONTACTO
        require_once 'views/carrito.view.php';
    }
    elseif($rutas[0]===$ubicacion['perfil'] ){  
        require_once 'administrador/index.php';
    }
    elseif($rutas[0]=='registros'){
        require_once 'administrador/productos.php';
    }
    elseif($rutas[0]=='configuracion'){
        require_once 'administrador/cuenta.php';
    }
    elseif($rutas[0]=='StokProductos'){
        require_once 'administrador/cuenta.php';
    }

    elseif($rutas[0]==='login' ){               ////// perfil
        require_once 'administrador/login.php';
    }
    elseif($rutas[0]==='notas' ){               ////// perfil
        require_once 'administrador/notas.php';
    }
    elseif($rutas[0]==='usuariossistema' ){               ////// perfil
        require_once 'administrador/clientes.php';
    }
    elseif($rutas[0]==='registro' ){               ////// perfil
        require_once 'administrador/registro.php';
    }
    else{
        require_once 'error.php';
    }
    
}else{                                             ////// INDEX
     require_once 'views/index.view.php';
}


