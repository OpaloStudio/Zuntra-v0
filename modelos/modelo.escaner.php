<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '999';

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$numPersonasIndividual = $_POST['numPersonasIndividual'];
$numPersonasTotal = $_POST['numPersonasTotal'];

$sql = "SELECT idQr FROM reservaciones WHERE nombre='$nombre' AND telefono='$telefono' AND numPersonas='$numPersonasTotal' AND activa='1'";
$result = $conexion->query($sql);

$arregloIDqr = array();

while($row = mysqli_fetch_array($result)){
	array_push($arregloIDqr, (int)$row[0]);
}

if(sizeof($arregloIDqr) == 0){
	$status = "999"; //No hay publicaciones con esas características o no está activa
} else{

    for($i = 0; $i < sizeof($arregloIDqr); $i++){
        
        $sql2 = "SELECT scan FROM qr WHERE idQr='$arregloIDqr[$i]' AND numRes='$numPersonasIndividual'";
        $result2 = $conexion->query($sql2);
    
        while($row = mysqli_fetch_array($result2)){
            $final = (int)$row[0];
            $idQRchido = $arregloIDqr[$i];
        }
    
    }

}

if($final == 1){

    $status = "998"; //Publicaión ya escaneada

} else if($final == 0){
    $status = "997"; //Publicaión no escaneada

    $sql3="UPDATE qr SET scan='1' WHERE idQr='$idQRchido'";

    if($conexion->query($sql3)){
        $status = '1'; //Éxito al actualizar
    } else{
        $status = '996';//Error al actualizar info
    }
}


echo $status;

?>