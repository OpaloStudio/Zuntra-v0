<?php
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }
    $conexion->set_charset("utf8");

    if(isset($_POST["staff"])) {
        //Obtener a todos los usuarios de staff registrados
        $result = $conexion->query("SELECT usuarios.nombre, usuarios.idUser, usuarios.picPerfil AS foto, 0 AS total, 0 AS personas FROM usuarios, tipoUsuario WHERE NOT(tipoUsuario.tipoUsuario LIKE 'Cliente') AND NOT(tipoUsuario.tipoUsuario LIKE 'Admin') AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
        $result1 = $conexion->query("SELECT usuarios.idUser, COUNT(*) AS total FROM invitados, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitados.idRes = reservaciones.idRes AND invitados.scan = 1 GROUP BY usuarios.idUser");
        $result2 = $conexion->query("SELECT usuarios.idUser, COUNT(*) AS total FROM invitadosGuest, usuarios, reservaciones WHERE reservaciones.idRp = usuarios.idUser AND invitadosGuest.idRes = reservaciones.idRes AND invitadosGuest.scan = 1 GROUP BY usuarios.idUser");
        $result3 = $conexion->query("SELECT usuarios.idUser, '0' AS total, SUM(reservaciones.numPersonas) AS personas FROM usuarios, reservaciones WHERE usuarios.idUser = reservaciones.idRp GROUP BY reservaciones.idRp");
        if($result->num_rows === 0)
            echo "0";
        else {
            $rows = array();
            while($row = $result->fetch_assoc()) {
                /*if(file_exists("../vistas/img/usuarios/".$row["idUser"]."/perfil/perfil.jpg"))
                    $row["foto"] = "vistas/img/usuarios/".$row["idUser"]."/perfil/perfil.jpg";
                else
                    $row["foto"] = "vistas/img/perfil.jpg";*/
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
    } else if(isset($_POST["editar"])) { 
        //Obtener la informacion del staff que se desea editar
        $idUser = $_POST["idUser"];
        $result = $conexion->query("SELECT usuarios.nombre, usuarios.telefono, tipoUsuario.idTipoUsuario, usuarios.correo, usuarios.cumpleanos, usuarios.scanner, usuarios.panelControl, usuarios.picPerfil AS foto FROM usuarios, tipoUsuario WHERE usuarios.idUser = $idUser AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
        if($result->num_rows === 0)
            echo "0";
        else {
            $row = $result->fetch_assoc();
            /*if(file_exists("../vistas/img/usuarios/".$idUser."/perfil/perfil.jpg"))
                $row["foto"] = "vistas/img/usuarios/".$idUser."/perfil/perfil.jpg";
            else
                $row["foto"] = "vistas/img/cuadroCarga.svg";*/
            echo json_encode($row);
        }
    } else if(isset($_POST["registrar"])) { //Registrar a un nuevo usuario
        $foto = $_POST["foto"];
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
            //Guardar la información del nuevo usuario en la base de datos
            $sql2 = "INSERT INTO usuarios (nombre, telefono, cumpleanos, correo, contrasena, scanner, panelControl, idTipoUsuario, picPerfil) VALUES ('$nombre', '$telefono', '$cumpleanos', '$mail', '$password', $scanner, $panelControl, $puesto, '$foto')";
            
            if($conexion->query($sql2)) {
                $userId = $conexion->insert_id;
                /*$userDir = "../vistas/img/usuarios/".(string)$userId."/";
                
                mkdir($userDir);
                mkdir($userDir."perfil/");

                unlink($userDir."perfil/perfil.jpg");
                move_uploaded_file($_FILES["foto"]["tmp_name"], $userDir."perfil/perfil.jpg");*/

                echo $userId;
            } else
                echo "0";
        }
    } else if(isset($_POST["actualizar"])) {    //Actualizar la informacion de un usuario
        $idUser = $conexion->real_escape_string($_POST["idUser"]);
        $foto = $_POST["foto"];
        $nombre = $conexion->real_escape_string($_POST["nombre"]);
        $telefono = $conexion->real_escape_string($_POST["telefono"]);
        $puesto = $conexion->real_escape_string($_POST["puesto"]);
        $mail = $conexion->real_escape_string($_POST["mail"]);
        $cumpleanos = $conexion->real_escape_string($_POST["cumpleanos"]);
        $scanner = $conexion->real_escape_string($_POST["scanner"]);
        $panelControl = $conexion->real_escape_string($_POST["panelControl"]);
        
        //Verificar si se desea cambiar el email del usuario
        $sql = "SELECT correo FROM usuarios WHERE idUser = $idUser AND NOT(correo LIKE '$mail')";
        $result = $conexion->query($sql);
            
        if($result->num_rows > 0) { //Se quiere cambiar el email
            $result->free();
            //Validar que el email no ha sido registrado anteriormente
            $sql = "SELECT correo FROM usuarios WHERE correo LIKE '$mail'";
            $result = $conexion->query($sql);
            if($result->num_rows > 0)
                echo "-1"; //Registrado
            else {
                //Verificar si el password va a cambiar
                if($_POST["password"] == "")
                    $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', correo='$mail', cumpleanos='$cumpleanos', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl, picPerfil='$foto' WHERE idUser=$idUser";
                else {
                    $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', correo='$mail', cumpleanos='$cumpleanos', contrasena='$password', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl, picPerfil='$foto' WHERE idUser=$idUser";
                    $password = password_hash($conexion->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);
                }
                
                if($conexion->query($sql2)) {
                    /*if(isset($_FILES["foto"])) {
                        $userDir = "../vistas/img/usuarios/".(string)$userId."/";
                
                        mkdir($userDir);
                        mkdir($userDir."perfil/");

                        unlink($userDir."perfil/perfil.jpg");
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $userDir."perfil/perfil.jpg");
                    }*/
                    echo "1";
                } else
                    echo "0";
            }
        } else {
            if($_POST["password"] == "")
                $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', cumpleanos='$cumpleanos', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl, picPerfil='$foto' WHERE idUser=$idUser";
            else {
                $password = password_hash($conexion->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);
                $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', cumpleanos='$cumpleanos', contrasena='$password', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl, picPerfil='$foto' WHERE idUser=$idUser";
            }

            if($conexion->query($sql2)) {
                /*if(isset($_FILES["foto"])) {
                    $userDir = "../vistas/img/usuarios/".(string)$idUser."/";
            
                    mkdir($userDir);
                    mkdir($userDir."perfil/");

                    unlink($userDir."perfil/perfil.jpg");
                    move_uploaded_file($_FILES["foto"]["tmp_name"], $userDir."perfil/perfil.jpg");
                }*/
                echo "1";                
            } else
                echo "$sql2";
        }
    } else if(isset($_POST["eliminar"])) {
        $idUser = $_POST["idUser"];
        if($conexion->query("DELETE FROM usuarios WHERE idUser = $idUser")) {
            //recurseRmdir("../vistas/img/usuarios/".(string)$idUser."/");
            echo "1";
        } else
            echo "0";
    } else if(isset($_POST["promos"])) {
        $titulo = $conexion->real_escape_string($_POST["titulo"]);
        $tipo = $conexion->real_escape_string($_POST["tipo"]);
        $dia = $conexion->real_escape_string($_POST["dia"]);
        $fotoh = $conexion->real_escape_string($_POST["fotoh"]);
        $fotov = $conexion->real_escape_string($_POST["fotov"]);
        if($conexion->query("INSERT INTO promos (titulo, tipo, fotoH, fotoV, dia) VALUES ('$titulo', $tipo, '$fotoh', '$fotov', $dia)"))
            echo $conexion->insert_id;
        else
            echo "0";
    } else if($_POST["publicaciones"]) {
        $result = $conexion->query("SELECT idPromo, titulo FROM promos");
        if($result->num_rows > 0) {
            $rows = array();
            while($row = $result->fetch_assoc())
                $rows[] = $row;
            echo json_encode($rows);
        } else
            echo "0";
        $result->free();
    } else if(isset($_POST["changePublicacion"])) {
        $tipo = $_POST["tipo"];
        $result = $conexion->query("SELECT idPromo, titulo FROM promos WHERE tipo = $tipo");
        if($result->num_rows > 0) {
            $rows = array();
            while($row = $result->fetch_assoc())
                $rows[] = $row;
            echo json_encode($rows);
        } else
            echo "0";
        $result->free();
    } else if(isset($_POST["changePublicacionDia"])) {
        $dia = $_POST["dia"];
        $result = $conexion->query("SELECT idPromo, titulo FROM promos WHERE dia = $dia");
        if($result->num_rows > 0) {
            $rows = array();
            while($row = $result->fetch_assoc())
                $rows[] = $row;
            echo json_encode($rows);
        } else
            echo "0";
        $result->free();
    } else if(isset($_POST["eliminarPublicacion"])) {
        $idPromo = $_POST["idPublicacion"];
        if($conexion->query("DELETE FROM promos WHERE idPromo = $idPromo"))
            echo "1";
        else
            echo "0";
    } else if(isset($_POST["cerrar"])) {
        session_start();
        session_destroy();
        echo "1";
    }

    $conexion->close();
 ?>