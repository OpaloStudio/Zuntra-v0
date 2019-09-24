<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$rpReserva = $_POST['rpReserva'];
$tipoReserva = $_POST['tipoReserva'];
$fechaReserva = $_POST['fechaReserva'];
$numPersonasReserva = $_POST['numPersonasReserva'];
$laReserva = $_POST['laReserva'];

$date = strtr($fechaReserva, '/', '/');
$newDate = date("Y-m-d", strtotime($date));


$status = '999';


$sql="UPDATE reservaciones SET idTipoRes='$tipoReserva', numPersonas='$numPersonasReserva', fecha='$newDate', idRp='$rpReserva' WHERE idRes='$laReserva'";


if($conexion->query($sql)){
    $sql2="UPDATE invitados SET personasTotales='$numPersonasReserva' WHERE idRes='$laReserva'";

    if($conexion->query($sql2)){
    
        $status = '1';

    } else{

        $status = '997';//Error al actualizar info
    } 

} else{
    $status = '998';//Error al actualizar info
} 

echo $status;

?>