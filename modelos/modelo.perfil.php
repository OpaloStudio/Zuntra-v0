<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$userId = $_SESSION['userId'];
$status = '999';

$tipoSexo = $_POST['tipoSexo'];
$tipoCita = $_POST['tipoCita'];
$busco = $_POST['busco'];
$biografia = $_POST['biografia'];
$tipoETS = $_POST['tipoETS'];


$sql="UPDATE usuarios SET idTIpoSexo='$tipoSexo', idTipoCita='$tipoCita', idBusco='$busco', biografia='$biografia', idTipoETS='$tipoETS' WHERE idUser='$userId'";

if($conexion->query($sql)){
    $_SESSION['userSexo'] = $tipoSexo;
    $_SESSION['userCita'] = $tipoCita;
    $_SESSION['userBusco'] = $busco;
    $_SESSION['userBio'] = $biografia;
    $_SESSION['userETS'] = $tipoETS;
    $status = '1';
} else{
    $status = '997';//Error al actualizar info
}

echo $status;

?>