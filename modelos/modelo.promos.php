<?php
    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error) {
            die("La conexion falló: " . $conexion->connect_error);
        }

        switch($_POST["opcion"]) {
            case '1':   //Validar usuario y token
                $result = $conexion->query("SELECT * FROM promos WHERE tipo = 0");
                if($result->num_rows > 0){
                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
                echo json_encode($rows);
            }
            else
                    echo "0";
                $result->free();
                break;
            case '2':   //Validar usuario y token
                $result = $conexion->query("SELECT * FROM promos WHERE tipo = 1");
                if($result->num_rows > 0){
                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
                echo json_encode($rows);
            }
            else
                    echo "0";
                $result->free();
                break;
        }

        $conexion->close();
    }
 ?>