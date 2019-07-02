<?php

include ("modelo.conexion.php");
$status = 999;

$email = $_POST['email'];
$password=password_hash($_POST['password'], PASSWORD_DEFAULT);
$nombre = $_POST['nombre'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$id_escuela = $_POST['id_escuela'];
$enterado = $_POST['enterado'];

$sql = "SELECT email FROM usuarios WHERE email = '$email'";
$result = $conexion->query($sql);
if($result->num_rows > 0){
    $status = 0; //Registrado
}
else{
    $sql = "INSERT INTO usuarios(email, password, nombre, fecha_nacimiento, id_escuela, enterado)
    VALUES ('$email', '$password', '$nombre', '$fecha_nacimiento', '$id_escuela', '$enterado')";
    if($result = $conexion->query($sql)){
        $status = 1;
    }
}

echo $status;
