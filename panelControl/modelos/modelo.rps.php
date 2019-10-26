<?php
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    if(isset($_POST["rps"])) {
        $result = $conexion->query("SELECT usuarios.nombre FROM usuarios, tipoUsuario WHERE NOT(tipoUsuario.tipoUsuario LIKE 'Cliente') AND NOT(tipoUsuario.tipoUsuario LIKE 'Admin') AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
        if($result->num_rows === 0)
            echo "0";
        else {
            $rows = array();
            while($row = $result->fetch_assoc())
                $rows[] = $row;
            echo json_encode($rows);
        }
        $result->free();
    } else if(isset($_POST["tipoStaff"])) {
        $staff = $_POST["tipoStaff"];
        $result = $conexion->query("SELECT usuarios.nombre FROM usuarios, tipoUsuario WHERE tipoUsuario.tipoUsuario LIKE '$staff' AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
        if($result->num_rows === 0)
            echo "0";
        else {
            $rows = array();
            while($row = $result->fetch_assoc())
                $rows[] = $row;
            echo json_encode($rows);
        }
        $result->free();
    }

    $conexion->close();
 ?>