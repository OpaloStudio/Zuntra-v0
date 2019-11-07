<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    require_once("modelo.enviarCorreo.php");

    if(isset($_POST["opcion"])) {
        $conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error) {
            die("La conexion falló: " . $conexion->connect_error);
        }

        switch($_POST["opcion"]) {
            case '1':   //Enviar correo
                $correo = $_POST["correo"];

                $result = $conexion->query("SELECT idUser, nombre FROM usuarios WHERE correo LIKE '$correo'");
                if($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $idUser = $row["idUser"];
                    $nombre = $row["nombre"];

                    $token = md5(uniqid(rand(), true));
                    $url = "https://".$_SERVER["SERVER_NAME"]."?page=18&usuario=".$idUser."&token=".$token;

                    $mensaje = "$nombre ha solicitado un cambio de contraseña, haga <a href='$url'>click aquí</a> para recuperar su contraseña";

                    if($conexion->query("UPDATE usuarios SET tokenPass = '$token' WHERE correo LIKE '$correo'")) {
                        //mail($correo, "Zuntra Pop Club recupera tu contraseña", $mensaje);
                        enviarCorreo("ZuntraPopClub", $nombre, $correo, "ZuntraPopClub cambia tu contraseña", $mensaje);
                        echo "1";
                    } else
                        echo "0";
                } else
                    echo "-1";

                $result->free();
                break;
        }

        $conexion->close();
    }
 ?>