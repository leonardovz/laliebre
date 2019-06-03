<?php 
session_start();
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
    elseif($rutas[0]==='carrito'){             ////// CONTACTO
        require_once 'views/carrito.view.php';
    }
    
    elseif($rutas[0]===$ubicacion['perfil'] ){  
        if(validarSesion()){
            require_once 'administrador/index.php';
        }else{
            reloadLogin($ruta,$ubicacion);
        }
    }
    elseif($rutas[0]=='registros'){
        if(validarSesion()){
            require_once 'administrador/productos.php';
        }else{
            reloadLogin($ruta,$ubicacion);
        }
    }
    elseif($rutas[0]=='configuracion'){             ////// perfil
        if(validarSesion()){
            require_once 'administrador/cuenta.php';
        }else{
            reloadLogin($ruta,$ubicacion);
        }
    }
    elseif($rutas[0]=='StokProductos'){             ////// perfil
        if(validarSesion()){
            require_once 'administrador/cuenta.php';
        }else{
            reloadLogin($ruta,$ubicacion);
        }
    }
    elseif($rutas[0]==='notas' ){                   ////// perfil
        if(validarSesion()){
            require_once 'administrador/notas.php';
        }else{
            reloadLogin($ruta,$ubicacion);
        }
    }
    elseif($rutas[0]==='usuariossistema' ){         ////// perfil
        if(validarSesion()){
            require_once 'administrador/clientes.php';
        }else{
            reloadLogin($ruta,$ubicacion);
        }
    }

    elseif($rutas[0]==='login'){                    ////// perfil
        if(validarSesion()){
            echo '<script>window.location.replace("' . $ruta . $ubicacion['perfil'] . '");</script>';
        }else{
            require_once 'administrador/login.php';
        }
    }
    elseif($rutas[0]==='registro' ){
        if(validarSesion()){
            echo '<script>window.location.replace("' . $ruta . $ubicacion['perfil'] . '");</script>';
        }else{
            require_once 'administrador/registro.php';
        }
    }
    else{
        require_once 'error.php';
    }
    
}else{                                             ////// INDEX
     require_once 'views/index.view.php';
}


function validarSesion(){
    if(isset($_SESSION['validarSesion']) && $_SESSION['validarSesion'] == 'ok'){
        return true; 
    }else{
        return false;
    }
}
function reloadLogin($ruta,$ubicacion){
    echo '<script>window.location.replace("' . $ruta . $ubicacion['login'].'");</script>';
}
