<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$userId = $_SESSION['userId'];
$status = '999';

$titulo = $_POST['titulo'];
$comentario = $_POST['comentario'];
$tipo = $_POST['tipo'];

$sql = "INSERT INTO comentarios (tipoTexto, idUser, titulo, texto) VALUES ('$tipo', '$userId', '$titulo', '$comentario')";
    
if($conexion->query($sql)){
    $status = '1';
} else{
    $status = '997';//Error al registrar al usuario
}


echo $status;

?>
