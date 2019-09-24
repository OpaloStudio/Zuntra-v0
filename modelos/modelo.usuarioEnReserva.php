<?php
include ("modelo.conexion.php");
    
$user = $_POST['nameGuest'];
$idUser = $_POST['celGuest'];
$status = '999';
 
$sql = "SELECT * FROM invitados WHERE idUser = '$idUser' AND nombreInvitado='$user'";
$result = $conexion->query($sql);

if($result->num_rows == 0){
    $status = '999';
}
else{
    $status = '1';
}

echo $status;


?>