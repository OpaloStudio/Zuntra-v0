<?php
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    if(isset($_POST["rps"])) {
        $result = $conexion->query("SELECT usuarios.nombre, usuarios.idUser, 0 AS total, 0 AS personas FROM usuarios, tipoUsuario WHERE NOT(tipoUsuario.tipoUsuario LIKE 'Cliente') AND NOT(tipoUsuario.tipoUsuario LIKE 'Admin') AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
        $result1 = $conexion->query("SELECT usuarios.idUser, COUNT(*) AS total FROM invitados, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitados.idRes = reservaciones.idRes AND invitados.scan = 1 GROUP BY usuarios.idUser");
        $result2 = $conexion->query("SELECT usuarios.idUser, COUNT(*) AS total FROM invitadosGuest, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 1 GROUP BY usuarios.idUser");
        $result3 = $conexion->query("SELECT usuarios.idUser, '0' AS total, SUM(reservaciones.numPersonas) AS personas FROM usuarios, reservaciones WHERE usuarios.idUser = reservaciones.idRp GROUP BY reservaciones.idRp");
        if($result->num_rows === 0)
            echo "0";
        else {
            $rows = array();
            while($row = $result->fetch_assoc()) {
                if(file_exists("../vistas/img/usuarios/".$row["idUser"]."/perfil/perfil.jpg"))
                    $row["foto"] = "vistas/img/usuarios/".$row["idUser"]."/perfil/perfil.jpg";
                else
                    $row["foto"] = "vistas/img/perfil.jpg";
                $rows[] = $row;
            }
            while($row = $result1->fetch_assoc()) 
                for($i = 0; $i < count($rows); $i++)
                    if($row["idUser"] == $rows[$i]["idUser"])
                        $rows[$i]["total"] += $row["total"];
            while($row = $result2->fetch_assoc()) 
                for($i = 0; $i < count($rows); $i++)
                    if($row["idUser"] == $rows[$i]["idUser"])
                        $rows[$i]["total"] += $row["total"];
            while($row = $result3->fetch_assoc()) 
                for($i = 0; $i < count($rows); $i++)
                    if($row["idUser"] == $rows[$i]["idUser"])
                        $rows[$i]["personas"] = $row["personas"];
            echo json_encode($rows);
        }
        $result->free();
    } else if(isset($_POST["tipoStaff"])) {
        $staff = $_POST["tipoStaff"];
        $result = $conexion->query("SELECT usuarios.nombre,usuarios.idUser FROM usuarios, tipoUsuario WHERE tipoUsuario.idTipoUsuario = $staff AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
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