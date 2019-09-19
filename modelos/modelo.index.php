<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$sesion = $_POST['sesion'];
$status = '999';



$sql = "SELECT * FROM salaChat WHERE usuario1='$sesion' OR usuario2='$sesion'";
$result = $conexion->query($sql);

$lista = array();
while($row = mysqli_fetch_array($result)){
	array_push($lista, $row);
}


if(sizeof($lista) == 0){
	$lista = false;
}

echo json_encode($lista);

?>