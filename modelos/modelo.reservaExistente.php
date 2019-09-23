<?php
include ("modelo.conexion.php");
    
$user = $_POST['miSesion'];
$reserva = $_POST['laReserva'];
$status = '999';
 
$sql = "SELECT * FROM reservaciones WHERE idUser = '$user' AND idRes='$reserva' AND activa='1'";
$result = $conexion->query($sql);

if($result->num_rows == 0){
    $status = '999';
}
else{
    $status = '1';
}

echo $status;


?>