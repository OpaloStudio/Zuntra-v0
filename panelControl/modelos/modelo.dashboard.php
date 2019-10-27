<?php
    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error)
            die("La conexion falló: " . $conexion->connect_error);
        switch($_POST["opcion"]) {
            case '1':
                $result1 = $conexion->query("SELECT SUM(numPersonas) AS total FROM reservaciones");
                $result2 = $conexion->query("SELECT COUNT(*) AS total FROM invitados WHERE scan = 1");
                $result3 = $conexion->query("SELECT COUNT(*) AS total FROM invitadosGuest WHERE scan = 1");

                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();
                $row3 = $result3->fetch_assoc();
                echo $row1["total"]."-".($row2["total"] + $row3["total"]);

                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
            case '2':
                $result1 = $conexion->query("SELECT SUM(numPersonas) AS total FROM reservaciones WHERE idTipoRes = 1");
                $result2 = $conexion->query("SELECT COUNT(*) AS total FROM reservaciones, invitados WHERE reservaciones.idTipoRes = 1 AND invitados.idRes = reservaciones.idRes AND invitados.scan = 1");
                $result3 = $conexion->query("SELECT COUNT(*) AS total FROM reservaciones, invitadosGuest WHERE reservaciones.idTipoRes = 1 AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 1");

                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();
                $row3 = $result3->fetch_assoc();
                echo $row1["total"]."-".($row2["total"] + $row3["total"]);

                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
            case '3':
                $result1 = $conexion->query("SELECT SUM(numPersonas) AS total FROM reservaciones WHERE idTipoRes = 2");
                $result2 = $conexion->query("SELECT COUNT(*) AS total FROM reservaciones, invitados WHERE reservaciones.idTipoRes = 1 AND invitados.idRes = reservaciones.idRes AND invitados.scan = 2");
                $result3 = $conexion->query("SELECT COUNT(*) AS total FROM reservaciones, invitadosGuest WHERE reservaciones.idTipoRes = 1 AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 2");

                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();
                $row3 = $result3->fetch_assoc();
                echo $row1["total"]."-".($row2["total"] + $row3["total"]);
                
                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
            case '4':
                $result1 = $conexion->query("SELECT SUM(numPersonas) AS total FROM reservaciones WHERE idTipoRes = 3");
                $result2 = $conexion->query("SELECT COUNT(*) AS total FROM reservaciones, invitados WHERE reservaciones.idTipoRes = 1 AND invitados.idRes = reservaciones.idRes AND invitados.scan = 3");
                $result3 = $conexion->query("SELECT COUNT(*) AS total FROM reservaciones, invitadosGuest WHERE reservaciones.idTipoRes = 1 AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 3");

                $row1 = $result1->fetch_assoc();
                $row2 = $result2->fetch_assoc();
                $row3 = $result3->fetch_assoc();
                echo $row1["total"]."-".($row2["total"] + $row3["total"]);
                
                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
            case '5':
                $result1 = $conexion->query("SELECT usuarios.idUser, usuarios.nombre, COUNT(*) AS total FROM invitados, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitados.idRes = reservaciones.idRes AND invitados.scan = 1 GROUP BY usuarios.idUser");
                $result2 = $conexion->query("SELECT usuarios.idUser, usuarios.nombre, COUNT(*) AS total FROM invitadosGuest, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 1 GROUP BY usuarios.idUser");
                $result3 = $conexion->query("SELECT usuarios.idUser, usuarios.nombre, '0' AS total, SUM(reservaciones.numPersonas) AS personas FROM usuarios, reservaciones WHERE usuarios.idUser = reservaciones.idRp GROUP BY reservaciones.idRp");

                $rps = array();
                while($row = $result3->fetch_assoc()) {
                    if(file_exists("../vistas/img/usuarios/".$row["idUser"]."/perfil/perfil.jpg"))
                        $row["foto"] = "vistas/img/usuarios/".$row["idUser"]."/perfil/perfil.jpg";
                    else
                        $row["foto"] = "vistas/img/logo.png";
                    $rps[] = $row;
                }
                while($row = $result1->fetch_assoc())
                    for($i = 0; $i < count($rps); $i++)
                        if($row["idUser"] == $rps[$i]["idUser"]) 
                            $rps[$i]["total"] += $row["total"];
                while($row = $result2->fetch_assoc())
                    for($i = 0; $i < count($rps); $i++)
                        if($row["idUser"] == $rps[$i]["idUser"]) 
                            $rps[$i]["total"] += $row["total"];

                echo json_encode($rps);

                $result1->free();
                $result2->free();
                $result3->free();
                $conexion->close();
                break;
        }
    }
 ?>