<?php 

// function ruta(){
//     return "http://localhost/modularv2/";
// }
function ruta(){
    $ruta = $_SERVER['HTTP_HOST'];
    return 'https://'.$ruta.'/ModularV2/';
}

$ubicacion = array(
	'index'=> '',
	'tienda'=> 'tienda',
	'productos'=> 'productos',
	'acercade'=> 'acercade',
	'contacto'=> 'contacto',
	'perfil'=> 'compras',
	'registros'=> 'registros',
	'login'=> 'login',
	'carrito'=> 'carrito',
	'registro'=> 'registro',
);

?>