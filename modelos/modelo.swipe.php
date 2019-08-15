<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$sesion = $_POST['sesion'];
$status = '999';

$sql = "SELECT * FROM usuarios WHERE NOT idUser='$sesion'";
$sql2 = "SELECT idBloqueado FROM bloqueos WHERE idBloqueador='$sesion'";

$result = $conexion->query($sql);
$result2 = $conexion->query($sql2);

$row_cnt = $result->num_rows;
$row_cnt2 = $result2->num_rows;
$final = array();

while($row = mysqli_fetch_array($result)){
	array_push($final, $row);
}
while($row2 = mysqli_fetch_array($result2)){
	array_push($final, $row2);
}

if(sizeof($final) == 0){
	$final = false;
}

echo json_encode($final);

?>