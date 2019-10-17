<?php
    $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
    if ($conexion->connect_error) {
        die("La conexion falló: " . $conexion->connect_error);
    }

    if(isset($_POST["staff"])) {
        //Obtener a todos los usuarios de staff registrados
        $result = $conexion->query("SELECT usuarios.idUser, usuarios.nombre FROM usuarios, tipoUsuario WHERE NOT(tipoUsuario.tipoUsuario LIKE 'Cliente') AND NOT(tipoUsuario.tipoUsuario LIKE 'Guest') AND usuarios.idTipoUsuario = tipoUsuario.idTipoUsuario");
        if($result->num_rows === 0)
            echo "0";
        else {
            $rows = array();
            while($row = $result->fetch_assoc()) 
                $rows[] = $row;
            echo json_encode($rows);
        }
    } else if(isset($_POST["editar"])) { 
        //Obtener la informacion del staff que se desea editar
        $idUser = $_POST["idUser"];
        $result = $conexion->query("SELECT usuarios.nombre, usuarios.telefono, tipoUsuario.tipoUsuario, usuarios.correo, usuarios.cumpleanos, usuarios.scanner, usuarios.panelControl FROM usuarios, tipoUsuario WHERE usuarios.idUser = $idUser AND tipoUsuario.idTipoUsuario = usuarios.idTipoUsuario");
        if($result->num_rows === 0)
            echo "0";
        else {
            $row = $result->fetch_assoc();
            echo json_encode($row);
        }
    } else if(isset($_POST["registrar"])) { //Registrar a un nuevo usuario
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
            $sql2 = "INSERT INTO usuarios (nombre, telefono, cumpleanos, correo, contrasena, scanner, panelControl, idTipoUsuario) SELECT '$nombre', '$telefono', '$cumpleanos', '$mail', '$password', $scanner, $panelControl, idTipoUsuario FROM tipoUsuario WHERE tipoUsuario LIKE '$puesto'";
            
            if($conexion->query($sql2))
                echo $conexion->insert_id;
            else
                echo "0";
        }
    } else if(isset($_POST["actualizar"])) {    //Actualizar la informacion de un usuario
        $idUser = $conexion->real_escape_string($_POST["idUser"]);
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

        //Obtener el id del tipo de usuario
        $puesto = $conexion->query("SELECT idTipoUsuario FROM tipoUsuario WHERE tipoUsuario LIKE '$puesto'")->fetch_assoc()["idTipoUsuario"];
            
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
                    $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', correo='$mail', cumpleanos='$cumpleanos', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl WHERE idUser=$idUser";
                else {
                    $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', correo='$mail', cumpleanos='$cumpleanos', contrasena='$password', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl WHERE idUser=$idUser";
                    $password = password_hash($conexion->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);
                }
                
                if($conexion->query($sql2))
                    echo "1";
                else
                    echo "0";
            }
        } else {
            if($_POST["password"] == "")
                $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', cumpleanos='$cumpleanos', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl WHERE idUser=$idUser";
            else {
                $password = password_hash($conexion->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);
                $sql2 = "UPDATE usuarios SET nombre='$nombre', telefono='$telefono', cumpleanos='$cumpleanos', contrasena='$password', idTipoUsuario=$puesto, scanner=$scanner, panelControl=$panelControl WHERE idUser=$idUser";
            }
            
            if($conexion->query($sql2))
                echo "1";
            else
                echo "0";
        }
    } else if(isset($_POST["eliminar"])) {
        $idUser = $_POST["idUser"];
        if($conexion->query("DELETE FROM usuarios WHERE idUser = $idUser"))
            echo "1";
        else
            echo "0";
    }

    $conexion->close();
 ?>