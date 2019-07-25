<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '999';

$bloqueador = $_POST['bloqueador'];
$bloqueado = $_POST['bloqueado'];

$sql = "INSERT INTO bloqueos (nombre, telefono, correo, cumpleanos, contrasena, idTipoUsuario) VALUES ('$nombre', '$telefono', '$email', NULL, '$password', '5')";

if($conexion->query($sql)){
    $status = '1';
} else{
    $status = '997';//Error al registrar al usuario
}



echo $status;

?>
