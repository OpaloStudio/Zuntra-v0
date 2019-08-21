<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$idTipoRes = $_POST['idTipoRes'];
$numPersonas = $_POST['numPersonas'];
$nombre = $_POST['nombre'];
$idTipoUsuario = $_POST['idTipoUsuario'];
$telefono = $_POST['telefono'];
$baseString = $_POST['baseString'];
$session = $_POST['session'];
$qrIndividual = $_POST['qrIndividual'];


$status = '999';





$sql = "INSERT INTO reservaciones (idTipoRes, numPersonas, activa, nombre, idQr, idTipoUsuario, telefono) VALUES ('$idTipoRes', '$numPersonas', '0', '$nombre', NULL, '$idTipoUsuario', '$telefono')";

if($conexion->query($sql)){
  
  $sql2 = "SELECT idRes FROM reservaciones WHERE idQr IS NULL AND telefono='$telefono'";
  $result2 = $conexion->query($sql2);

  $reservacionID = array();
  while($row = mysqli_fetch_array($result2)){
    $reservacionID = (int)$row[0];
  }
  
  if($reservacionID != 0){
    
    $sql3 = "INSERT INTO qr (imgQr, scan, numRes, idRes) VALUES ('$baseString', '0', '$qrIndividual', '$reservacionID')";

    if($conexion->query($sql3)){

      $sql4 = "SELECT idQr FROM qr WHERE imgQr='$baseString' AND scan='0' AND numRes='$qrIndividual' AND idRes='$reservacionID'";
      $result4 = $conexion->query($sql4);

      while($row = mysqli_fetch_array($result4)){
        $cuErreID = (int)$row[0];
      }

      if($cuErreID != 0){

        $sql5="UPDATE reservaciones SET idQr='$cuErreID', activa='1' WHERE idRes='$reservacionID'";
        
        if($conexion->query($sql5)){
          
          $status = '1';//Exito
          
        } else{
          
          $status = '995';//Error en el quinto SQL
          
        }
        
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

echo $status;

?>