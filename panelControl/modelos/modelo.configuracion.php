<?php
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $telefono = $conexion->real_escape_string($_POST["telefono"]);
    $puesto = $conexion->real_escape_string($_POST["puesto"]);
    $mail = $conexion->real_escape_string($_POST["mail"]);
    $password = password_hash($conexion->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);
    $cumpleanos = $conexion->real_escape_string($_POST["cumpleanos"]);
    $scanner = $conexion->real_escape_string($_POST["scanner"]);
    $panelControl = $conexion->real_escape_string($_POST["panelControl"]);
    
    $sql = "SELECT correo FROM usuarios WHERE correo = '$mail'";
    $result = $conexion->query($sql);
        
        
    if($result->num_rows > 0 )
        echo "-1"; //Registrado
    else {
        $sql2 = "INSERT INTO usuarios (nombre, telefono, cumpleanos, correo, contrasena, scanner, panelControl, idTipoUsuario) SELECT '$nombre', '$telefono', '$cumpleanos', '$mail', '$password', $scanner, $panelControl, idTipoUsuario FROM tipoUsuario WHERE tipoUsuario LIKE '$puesto'";
        
        if($conexion->query($sql2))
            echo $conexion->insert_id;
        else
            echo "0";
    }

    $conexion->close();
 ?>