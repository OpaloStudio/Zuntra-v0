<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$idTipoRes = $_POST['idTipoRes'];
$numPersonas = $_POST['numPersonas'];
$idUser = $_POST['session'];
$nombreUser = $_POST['nombreUser'];
$telefono = $_POST['telefono'];
$linkReservacion = $_POST['stringlink'];
$idRp = $_POST['rpReserva'];

$baseString = $_POST['baseString'];



$status = '999';





$sql = "INSERT INTO reservaciones (idTipoRes, numPersonas, activa, idUser, nombre, telefono, invitacion, idRp) VALUES ('$idTipoRes', '$numPersonas', '0', '$idUser', '$nombreUser', '$telefono', NULL, '$idRp')";

if($conexion->query($sql)){
  
  $sql2 = "SELECT idRes FROM reservaciones WHERE idUser='$idUser' AND telefono='$telefono' AND idRp='$idRp' AND activa='0'";
  $result2 = $conexion->query($sql2);

  while($row = mysqli_fetch_array($result2)){
    $reservacionID = (int)$row[0];
  }

  //echo $reservacionID;
  
  if($reservacionID != 0){

    //$nuevoLink = (string)$linkReservacion.(string)$reservacionID;
    $nuevoLink = "?page=6&usuario=".(string)$idUser."&reservacion=".(string)$reservacionID;
    
    $sql3 = "INSERT INTO invitados (idUser, nombreInvitado, idRes, personasTotales, invitadoQR) VALUES ('$idUser', '$nombreUser', '$reservacionID', '$numPersonas', '$baseString')";

    if($conexion->query($sql3)){

      $sql4="UPDATE reservaciones SET invitacion='$nuevoLink' WHERE idRes='$reservacionID'";

      if($conexion->query($sql4)){

        $status = $nuevoLink;

      } else{
        $status = '996';//Error en el cuarto SQL
      }

    } else{

      $status = '997';//Error en el tercer SQL

    }
  } else{

    $status = '998';//Error en el segundo SQL

  }

} else{

    $status = '999';//Error en el primer SQL

}

echo json_encode($status);

?>