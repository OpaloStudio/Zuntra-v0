<?php
include ("modelo.conexion.php");
    
$user = $_POST['miSesion'];
$reserva = $_POST['laReserva'];
$status = '999';
 
$sql = "SELECT * FROM reservaciones WHERE idUser = '$user' AND idRes='$reserva' AND activa='1'";
$result = $conexion->query($sql);

$final = array();

while($row = mysqli_fetch_array($result)){
    array_push($final, $row);
}

if(sizeof($final) == 0){
    $final = false;
}

echo json_encode($final);


?>