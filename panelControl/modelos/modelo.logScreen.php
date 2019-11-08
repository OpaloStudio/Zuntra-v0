<?php
    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if($conexion->connect_error)
            die("La conexion falló: " . $conexion->connect_error);

        switch($_POST["opcion"]) {
            case "1":   //Iniciar sesion
                $correo = $conexion->real_escape_string($_POST["correo"]);
                $password = $conexion->real_escape_string($_POST["password"]);
                $result = $conexion->query("SELECT idUser, contrasena, panelControl FROM usuarios WHERE correo LIKE '$correo'");
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if(password_verify($password, $row["contrasena"]) && $row["panelControl"] == "1") {
                        session_start();
                        $_SESSION["idUser"] = $row["idUser"];
                        $_SESSION["panelControl"] = $row["panelControl"];
                        echo "1";
                    } else  //Password incorrecto
                        echo "-1";
                } else  //El usuario no existe
                    echo "0";
                break;
            case "2":   //Velidar session
                session_start();
                if(isset($_SESSION["idUser"]))
                    echo "1";
                else 
                    echo "0";
                break;
        }

        $conexion->close();
    }
 ?>