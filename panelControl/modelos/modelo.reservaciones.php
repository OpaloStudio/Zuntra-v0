<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error)
            die("La conexion falló: " . $conexion->connect_error);
        $conexion->set_charset("utf8"); //Cambiar la codificacion a utf8 para que se haga el parse a JSON

        switch($_POST["opcion"]) {
            case '1':
                $query = "SELECT reservaciones.nombre AS usuario, tipoReservacion.tipoRes, usuarios.nombre AS staff, reservaciones.numPersonas FROM reservaciones, usuarios, tipoReservacion WHERE tipoReservacion.idTipoRes = reservaciones.idTipoRes AND reservaciones.idRp = usuarios.idUser";
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
            case '2':
                $result1 = $conexion->query("SELECT SUM(numPersonas) AS total FROM reservaciones");
                $result2 = $conexion->query("SELECT COUNT(*) AS total FROM invitados WHERE scan = 1");
                $result3 = $conexion->query("SELECT COUNT(*) AS total FROM invitadosGuest WHERE scan = 1");

                if($result1->num_rows > 0 && $result2->num_rows > 0 && $result3->num_rows > 0) {
                    $row1 = $result1->fetch_assoc();
                    $row2 = $result2->fetch_assoc();
                    $row3 = $result3->fetch_assoc();
                    echo $row1["total"]."-".($row2["total"] + $row3["total"]);
                } else
                    echo "0";
                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
        }
    }
 ?>