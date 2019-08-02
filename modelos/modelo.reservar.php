<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$userId = $_POST['session'];
$status = '999';

$baseString = $_POST['baseString'];

$sql = "INSERT INTO qr (imgQr, scan, numRes, idRes) VALUES ('$baseString', '1', '1', '$userId')";
    
if($conexion->query($sql)){
    $status = '1';
} else{
    $status = '997';//Error al registrar al usuario
}

echo $status;

?>