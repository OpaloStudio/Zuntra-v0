<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '999';

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$cumple = $_POST['cumple'];
$date = str_replace('/', '-', $cumple );
$newDate = date("Y-m-d", strtotime($date));
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "SELECT correo FROM usuarios WHERE correo = '$email' ";
$result = $conexion->query($sql);


if($result->num_rows > 0){
    $status = 0; //Registrado
} else{
    
    $sql2 = "INSERT INTO usuarios (nombre, telefono, correo, cumpleanos, contrasena, idTipoUsuario) VALUES ('$nombre', '$telefono', '$email', '$newDate', '$password', '5')";
    
    if($conexion->query($sql2)){
        $status = '1';
    } else{
        $status = '997';//Error al registrar al usuario
    }

}

echo $status;

?>
