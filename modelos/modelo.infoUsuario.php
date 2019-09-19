<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$elId = $_POST['elId'];
$status = '999';



$sql = "SELECT nombre FROM usuarios WHERE idUser='$elId'";
$result = $conexion->query($sql);

while($row = mysqli_fetch_array($result)){
	$final = $row[0];
}


if($final == null){
	$final = false;
}

echo json_encode($final);

?>