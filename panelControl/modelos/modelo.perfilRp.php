<?php
    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error)
            die("La conexion falló: " . $conexion->connect_error);
        switch($_POST["opcion"]) {
            case '1':
                $idUser = $_POST["rp"];
                $result1 = $conexion->query("SELECT COUNT(*) AS total FROM invitados, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitados.idRes = reservaciones.idRes AND invitados.scan = 1 AND usuarios.idUser = $idUser");
                $result2 = $conexion->query("SELECT COUNT(*) AS total FROM invitadosGuest, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 1 AND usuarios.idUser = $idUser");
                $result3 = $conexion->query("SELECT SUM(reservaciones.numPersonas) AS total FROM usuarios, reservaciones WHERE usuarios.idUser = reservaciones.idRp AND usuarios.idUser = $idUser");

                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();
                $row3 = $result3->fetch_assoc();

                echo $row3["total"]."-".($row1["total"] + $row2["total"]);

                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
            case '2':
                $query = "SELECT reservaciones.nombre AS usuario, tipoReservacion.tipoRes, usuarios.nombre AS staff, reservaciones.numPersonas FROM reservaciones, usuarios, tipoReservacion WHERE tipoReservacion.idTipoRes = reservaciones.idTipoRes AND reservaciones.idRp = usuarios.idUser AND usuarios.idUser = $idUser";
                $result = $conexion->query($query);
                $rows = array();
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc())
                        $rows[] = $row;
                    $result->free();
                    $query = "SELECT reservaciones.nombre AS usuario, tipoReservacion.tipoRes, 'Ninguno' AS staff, reservaciones.numPersonas FROM reservaciones, tipoReservacion WHERE tipoReservacion.idTipoRes = reservaciones.idTipoRes AND idRp = 0";
                    $result = $conexion->query($query);
                    if($result->num_rows > 0)
                        while($row = $result->fetch_assoc())
                            $rows[] = $row;
                    echo json_encode($rows);
                } else
                    echo "0";
                $result->free();
                $conexion->close();
                break;
        }
    }
 ?>