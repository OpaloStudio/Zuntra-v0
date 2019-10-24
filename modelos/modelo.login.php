<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
    include ("modelo.conexion.php");

    $opcion = $_POST["opcion"];

    switch($opcion) {
        case "1":   //Usuarios registrados
            $email = $_POST['email'];
            $password = $_POST['password'];
            $status = '999';
            
            $sql = "SELECT * FROM usuarios WHERE correo = '$email'";
            $result = $conexion->query($sql);
            if($result->num_rows == 0){
                $status = '0';
            } else {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if(password_verify($password, $row['contrasena'])){
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['userId'] = $row['idUser'];
                    $_SESSION['username'] = $row['nombre'];
                    $_SESSION['userPhone'] = $row['telefono'];
                    $_SESSION['userEmail'] = $row['correo'];
                    $_SESSION['userCumple'] = $row['cumpleanos'];
                    $_SESSION['userEmail'] = $row['correo'];
                    $_SESSION['userpicture'] = $row['fotoPerfil'];
                    $_SESSION['userChat'] = $row['fotosNasty'];
                    $_SESSION['userSexo'] = $row['idTIpoSexo'];
                    $_SESSION['userCita'] = $row['idTipoCita'];
                    $_SESSION['userBusco'] = $row['idBusco'];
                    $_SESSION['userBio'] = $row['biografia'];
                    $_SESSION['userETS'] = $row['idTipoETS'];
                    $_SESSION['userType'] = $row['idTipoUsuario'];
                    
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);
                    
                    $userId = $_SESSION['userId'];
            
                    session_write_close();
                    $status = '1';
            
                }
                else{
                    $status = '997';
                }
            }
            echo $status;
            break;
        case "2":   //Usuarios guest
            $nombre = $_POST["nombre"];
            $telefono = $_POST["telefono"];
            $result = $conexion->query("SELECT * FROM guest WHERE telefono LIKE '$telefono' AND nombre LIKE '$nombre'");
            if($result->num_rows > 0) {     //Guest ya registrado
                $row = $result->fetch_assoc();
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION["userId"] = $row["telefono"];
                $_SESSION["username"] = $row["nombre"];
                $_SESSION["userType"] = 6;     //Usuario guest

                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);
                    
                $userId = $_SESSION['userId'];

                echo "1";
            } else {    //Guest nuevo
                $result->free();
                if($conexion->query("INSERT INTO guest (telefono, nombre) VALUES ('$telefono', '$nombre')")) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION["userId"] = $telefono;
                    $_SESSION["username"] = $nombre;
                    $_SESSION["userType"] = 6;     //Usuario guest

                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (50 * 60);
                    
                    $userId = $_SESSION['userId'];

                    echo "1";
                } else
                    echo "0";
            }
            break;
    }
?>