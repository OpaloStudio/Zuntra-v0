<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$userId = $_SESSION['userId'];
$status = '999';

$option = $_POST['option'];

$tipoSexo = $_POST['tipoSexo'];
$tipoCita = $_POST['tipoCita'];
$busco = $_POST['busco'];
$biografia = $_POST['biografia'];
$tipoETS = $_POST['tipoETS'];



switch($option){

  case '1';
    $sql = "SELECT * FROM usuarios WHERE idUser='$userId'";
    $result = $conexion->query($sql);

    while($row = mysqli_fetch_array($result)){
      $infoUsr = $row;
    }

    if(sizeof($infoUsr) == 0){
      $infoUsr = false;
    }
    
    echo json_encode($infoUsr);

  break;


  case '2';


    $sql="UPDATE usuarios SET idTIpoSexo='$tipoSexo', idTipoCita='$tipoCita', idBusco='$busco', biografia='$biografia', idTipoETS='$tipoETS' WHERE idUser='$userId'"; 

    if($conexion->query($sql)){
        $_SESSION['userSexo'] = $tipoSexo;
        $_SESSION['userCita'] = $tipoCita;
        $_SESSION['userBusco'] = $busco;
        $_SESSION['userBio'] = $biografia;
        $_SESSION['userETS'] = $tipoETS;
        $status = '1';
    } else{
        $status = '998';//Error al actualizar info
    } 
    
    $nombresImg = array();
    $targetPaths = array();
    $idFotos = array();
    $fotos = array();
    $carpetaDestino = "../vistas/img/usuarios/".(string)$userId."/";
    $carpetaDestinoFinal = (string)$carpetaDestino."perfil/";
    mkdir($carpetaDestino); 
    mkdir($carpetaDestinoFinal); 
    
    for($x=1; $x<=5; $x++){
      $nombresImg[$x] = (string)$userId."-".(string)$x.".jpg";
      $targetPaths[$x] = $carpetaDestinoFinal. $nombresImg[$x];
      $idFotos[$x] = "fotoPerfil".(string)$x;
      $fotos[$x] = $_FILES[$idFotos[$x]];
      
      $pic = (string)$carpetaDestino."perfil/".(string)$userId."-".(string)$x.".jpg";

      if(isset($fotos[$x])){

        unlink($pic);

        if(move_uploaded_file($fotos[$x]['tmp_name'], $targetPaths[$x])){
      
          //Update picture name in the database
          $status = $x;
        } else {
          $status = 999999;
        }
      }
    }

    $sql2="UPDATE usuarios SET fotoPerfil='1' WHERE idUser='$userId'"; 

    if($conexion->query($sql2)){
        $_SESSION['userpicture'] = 1;
        $status = '1';
    } else{
        $status = '999';//Error al actualizar info
    }
    
    $nombresImgNasty = array();
    $targetPathsNasty = array();
    $idFotosNasty = array();
    $fotosNasty = array();
    $carpetaDestinoNasty = "../vistas/img/usuarios/".(string)$userId."/";
    mkdir($carpetaDestinoNasty); 
    $carpetaDestinoFinalNasty = (string)$carpetaDestino."chat/";
    mkdir($carpetaDestinoFinalNasty); 

    for($x=1; $x<=5; $x++){
      $nombresImgNasty[$x] = (string)$userId."-".(string)$x.".jpg";
      $targetPathsNasty[$x] = $carpetaDestinoFinalNasty. $nombresImgNasty[$x];
      $idFotosNasty[$x] = "fotoNasty".(string)$x;
      $fotosNasty[$x] = $_FILES[$idFotosNasty[$x]];
      
      $pic = (string)$carpetaDestinoNasty."chat/".(string)$userId."-".(string)$x.".jpg";

      if(isset($fotosNasty[$x])){

        unlink($pic);

        if(move_uploaded_file($fotosNasty[$x]['tmp_name'], $targetPathsNasty[$x])){
      
          //Update picture name in the database

          /* switch(){
            case 1:
            break;
            case 1:
            break;
            case 1:
            break;
            case 1:
            break;
            case 1:
            break;
            case 1:
            break;
          } */
          $status = $x;
        } else {
          $status = 888;
        }
      }
    }

    if($status == 888){
      $status == 888;
    }else{
      $status == 1;
    }

    echo $status;
  break;
}

?>