<?php 

// function ruta(){
//     return "http://localhost/modularv2/";
// }
function ruta(){
    $ruta = $_SERVER['HTTP_HOST'];
    return 'https://'.$ruta.'/modularv2/';
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