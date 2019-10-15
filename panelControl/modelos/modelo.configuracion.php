<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $telefono = $conexion->real_escape_string($_POST["telefono"]);
    $puesto = $conexion->real_escape_string($_POST["puesto"]);
    $mail = $conexion->real_escape_string($_POST["mail"]);
    $password = $conexion->real_escape_string($_POST["password"]);
    $cumpleanos = $conexion->real_escape_string($_POST["cumpleanos"]);
    $scanner = $conexion->real_escape_string($_POST["scanner"]);
    $panelControl = $conexion->real_escape_string($_POST["panelControl"]);

    $result = $conexion->query("INSERT INTO usuarios (nombre, telefono, cumpleanos, correo, contrasena, scanner, panelControl, idTipoUsuario) SELECT '$nombre', '$telefono', '$cumpleanos', '$mail', '$password', $scanner, $panelControl, idTipoUsuario FROM tipoUsuario WHERE tipoUsuario LIKE '$puesto'");
    if(!$result)
        echo "0";
    else
        echo $conexion->insert_id;
 ?>