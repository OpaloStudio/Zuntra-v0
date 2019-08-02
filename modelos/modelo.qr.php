<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$session = $_POST['session'];
$status = '999';

$sql = "SELECT * FROM qr WHERE idRes='$session'";
$result = $conexion->query($sql);
$row_cnt = $result->num_rows;
$final = array();

while($row = mysqli_fetch_array($result)){
	array_push($final, $row);
}

if(sizeof($final) == 0){
	$final = false;
}

echo json_encode($final);

?>