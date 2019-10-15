<?php
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $telefono = $conexion->real_escape_string($_POST["telefono"]);
    $puesto = $conexion->real_escape_string($_POST["puesto"]);
    $scanner = $conexion->real_escape_string($_POST["scanner"]);
    $panelControl = $conexion->real_escape_string($_POST["panelControl"]);

    $conxion->query("INSERT INTO ");
 ?>