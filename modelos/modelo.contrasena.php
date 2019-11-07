<?php
    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error) {
            die("La conexion falló: " . $conexion->connect_error);
        }

        switch($_POST["opcion"]) {
            case '1':   //Validar usuario y token
                $usuario = $conexion->real_escape_string($_POST["usuario"]);
                $token = $conexion->real_escape_string($_POST["token"]);
                $result = $conexion->query("SELECT tokenPass FROM usuarios WHERE idUser = $usuario AND tokenPass LIKE '$token'");
                if($result->num_rows > 0)
                    echo "1";
                else
                    echo "0";
                $result->free();
                break;
            case '2':   //Cambiar contraseña
                $usuario = $_POST["usuario"];
                $token = $_POST["token"];
                $password = password_hash($conexion->real_escape_string($_POST["password"]), PASSWORD_DEFAULT);

                if($conexion->query("UPDATE usuarios SET contrasena = '$password', tokenPass = '' WHERE idUser = $usuario AND tokenPass LIKE '$token'"))
                    echo "1";
                else
                    echo "0";
                break;
        }

        $conexion->close();
    }
 ?>