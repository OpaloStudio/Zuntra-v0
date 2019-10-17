<?php 
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    if(isset($_POST["rps"])) {
        $result = $conexion->query("SELECT usuarios.nombre FROM usuarios, tipoUsuario WHERE tipoUsuario.tipoUsuario LIKE 'RP' AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
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