<?php 
include_once ('../config/rutas.php');

$ruta = ruta();
session_start();

session_destroy();

header('Location: '.$ruta);
?>