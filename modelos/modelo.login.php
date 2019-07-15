<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}
    
$email = $_POST['email'];
$password = $_POST['password'];
$status = '999';
 
$sql = "SELECT * FROM usuarios WHERE correo = '$email'";
$result = $conexion->query($sql);
if($result->num_rows == 0){
    $status = '0';
}
else{
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
        $_SESSION['userSexo'] = $row['idTIpoSexo'];
        $_SESSION['userCita'] = $row['idTipoCita'];
        $_SESSION['userBusco'] = $row['idBusco'];
        $_SESSION['userBio'] = $row['biogrfia'];
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


?>