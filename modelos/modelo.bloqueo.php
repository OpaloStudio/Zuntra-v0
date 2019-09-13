<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '999';

$bloqueador = $_POST['bloqueador'];
$bloqueado = $_POST['bloqueado'];
$motivo = $_POST['motivo'];

$sql = "INSERT INTO bloqueos (idBloqueador, idBloqueado, motivo) VALUES ('$bloqueador', '$bloqueado', '$motivo')";

if($conexion->query($sql)){
    $status = '1';
} else{
    $status = '997';//Error al registrar al usuario
}



echo $status;

?>
