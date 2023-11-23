<?php
require_once("mecanico.php");
 
 
//$contraseña = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
 
$objMecanico = new mecanico($_POST["nombre"], $_POST["apellido"], $_POST["especializacion"], $contraseña);
 
 
$objMecanico->guardarmecanico() . $objMecanico->getId();
 
?>