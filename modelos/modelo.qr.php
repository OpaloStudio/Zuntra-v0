<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$session = $_POST['session'];
$telefono = $_SESSION['userPhone'];
$status = '999';

$sql = "SELECT idQr FROM reservaciones WHERE telefono='$telefono'";
$result = $conexion->query($sql);


$arregloIDqr = array();

while($row = mysqli_fetch_array($result)){
	array_push($arregloIDqr, (int)$row[0]);
}

$final = array();

for($i = 0; $i < sizeof($arregloIDqr); $i++){
	
	$sql2 = "SELECT imgQr FROM qr WHERE idQr='$arregloIDqr[$i]'";
	$result2 = $conexion->query($sql2);

	while($row = mysqli_fetch_array($result2)){
		array_push($final, $row);
	}

}

if(sizeof($final) == 0){
	$final = false;
}

echo json_encode($final);

?>