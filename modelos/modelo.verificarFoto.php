<?php

session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$userId = $_POST['sesion'];
//$final = "kk";


$final = array();
$carpetaImg = array();

for($x = 1; $x<=5; $x++){

    $foto = "vistas/img/usuarios/".(string)$userId."/perfil";
    $kk = (string)$foto."/".(string)$userId."-".$x.".jpg";
    $masKK = $_SERVER['DOCUMENT_ROOT']."vistas/img/usuarios/16/perfil/16-1.jpg";
    //array_push($carpetaImg, $masKK);

    $w = $x - 1;
    
    if(file_exists($masKK)){
        array_push($final, "si");
    }else{
        array_push($final, "no");
    }
    
}


if(sizeof($final) == 0){
    $final = false;
}
    
    
echo json_encode($final);
?>