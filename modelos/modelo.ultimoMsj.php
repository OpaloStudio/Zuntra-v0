<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$salasID = $_POST['saveData'];
$status = '999';


$ultimoMsj = array();

for($i = 0; $i < sizeof($salasID); $i++ ){
  $laSala = $salasID[$i];
  $sql = "SELECT mensaje FROM mensaje WHERE idSala='$laSala'";
  $result = $conexion->query($sql);

  $mensajes = array();
  while($row = mysqli_fetch_array($result)){
	  array_push($mensajes, $row[0]);
  }

  if(sizeof($mensajes) == 0){
    $mensajes = false;
  }

  $x = sizeof($mensajes) - 1;

  array_push($ultimoMsj, $mensajes[$x]);
}

echo json_encode($ultimoMsj);

?>