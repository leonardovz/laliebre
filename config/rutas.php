<?php 

// function ruta(){
//     return "http://localhost/modularv2/";
// }
function ruta(){
    $ruta = $_SERVER['HTTP_HOST'];
<<<<<<< HEAD
    return 'https://'.$ruta.'/';
=======
    return 'https://'.$ruta.'/modularv2/';
>>>>>>> e2aa427776707a24cedba6955098b208d6eb9b66
}

$ubicacion = array(
	'index'=> '',
	'tienda'=> 'tienda',
	'productos'=> 'productos',
	'acercade'=> 'acercade',
	'contacto'=> 'contacto',
	'perfil'=> 'account',
	'registros'=> 'registros',
	'login'=> 'login',
	'carrito'=> 'carrito',
);

?>