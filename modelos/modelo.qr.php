<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$idUser = $_POST['idUser'];
$idReservacion = $_POST['idReservacion'];

//Variable especificas de opcion 1
$usuarioReservacion = $_POST['usuarioReservacion'];
$opcion = $_POST['opcion'];

//Variable especificas de opcion 2
$nombreUser = $_POST['nombreUser'];
$baseString = $_POST['baseString'];
$personasTotales = $_POST['personasTotales'];

$final = '999';

switch($opcion){

	case 1:

		$sql = "SELECT * FROM invitados WHERE idRes='$idReservacion'";
		$result = $conexion->query($sql);


		$final = array();

		while($row = mysqli_fetch_array($result)){
			array_push($final, $row);
		}


		if(sizeof($final) == 0){
			$final = false;
		}
		echo json_encode($final);
	break;
	
	case 2:

		$sql2 = "INSERT INTO invitados (idUser, nombreInvitado, idRes, userRes, personasTotales, invitadoQR) VALUES ('$idUser', '$nombreUser', '$idReservacion', '$usuarioReservacion', '$personasTotales', '$baseString')";
		
		if($conexion->query($sql2)){

			$final = '1';
	
		} else{

			$final = '998';//Error

		}
		echo json_encode($final);
	break;
	
	case 3:
		$sql = "SELECT * FROM reservaciones WHERE idUser = '$idUser' AND idRes='$idReservacion' AND activa='1'";
		$result = $conexion->query($sql);
		
		if($result->num_rows == 0){
			$status = '999';
		}
		else{
			$status = '1';
		}

		echo $status;
    break;

}



?>









