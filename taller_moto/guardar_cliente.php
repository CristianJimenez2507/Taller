<?php
require_once("cliente.php");
 
 
$contraseña = password_hash($_POST['contrasenia'], PASSWORD_DEFAULT);
 
$objCliente = new cliente($_POST["nombre"], $_POST["apellido"], $_POST["celular"], $_POST["email"], $contraseña);
 
 
$objCliente->guardar();
 
?>