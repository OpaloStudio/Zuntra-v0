<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd2");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

?>