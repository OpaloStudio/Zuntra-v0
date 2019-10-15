<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$laSala = $_POST['laSala'];
$status = '999';



$sql = "SELECT mensaje FROM mensaje WHERE idSala='$laSala'";
$result = $conexion->query($sql);

$mensajes = array();
while($row = mysqli_fetch_array($result)){
	array_push($mensajes, $row[0]);
}


if(sizeof($mensajes) == 0){
    $mensajes = false;
}

$x = sizeof($mensajes) - 1;


$ultimoMsj = $mensajes[$x];

echo json_encode($ultimoMsj);

?>