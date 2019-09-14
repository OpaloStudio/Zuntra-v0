<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$userId = $_SESSION['userId'];
$status = '999';

$option = $_POST['option'];
$numPic = $_POST['numPic'];


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

    $sql = "SELECT fotosNasty FROM usuarios WHERE idUser='$userId'";
    $result = $conexion->query($sql);

    while($row = mysqli_fetch_array($result)){
      $stringNasty = $row[0];
    }

    $nastyPic1 = substr($stringNasty,0,1);
    $nastyPic2 = substr($stringNasty,1,1);
    $nastyPic3 = substr($stringNasty,2,1);
    $nastyPic4 = substr($stringNasty,3,1);
    $nastyPic5 = substr($stringNasty,4,1);
      
    
    $carpetaDestino = "../vistas/img/usuarios/".(string)$userId."/";
    mkdir($carpetaDestino); 
    $carpetaDestinoFinal = (string)$carpetaDestino."chat/";
    mkdir($carpetaDestinoFinal); 

    switch($numPic){

        case '1';

            $nombresImg = (string)$userId."-1.jpg";
            $targetPath = $carpetaDestinoFinal. $nombresImg;
            $foto = $_FILES['picNasty'];

            $pic = $targetPath;
        
            if(isset($foto)){
            
              unlink($pic);
            
              if(move_uploaded_file($foto['tmp_name'], $targetPath)){

                $newString = "1".$nastyPic2.$nastyPic3.$nastyPic4.$nastyPic5;
                $sql="UPDATE usuarios SET fotosNasty='$newString' WHERE idUser='$userId'";

                if($conexion->query($sql)){
                    $status = '1';
                } else{
                    $status = '998';//Error al actualizar info
                } 


              } else {
                $status = 999999;
              }
          
            }

            echo $status;

        break;
            
        case '2';
            $nombresImg = (string)$userId."-2.jpg";
            $targetPath = $carpetaDestinoFinal. $nombresImg;
            $foto = $_FILES['picNasty'];

            $pic = $targetPath;
            
            if(isset($foto)){
            
              unlink($pic);
            
              if(move_uploaded_file($foto['tmp_name'], $targetPath)){

                $newString = $nastyPic1."1".$nastyPic3.$nastyPic4.$nastyPic5;
                $sql="UPDATE usuarios SET fotosNasty='$newString' WHERE idUser='$userId'";

                if($conexion->query($sql)){
                    $status = '1';
                } else{
                    $status = '998';//Error al actualizar info
                } 


              } else {
                $status = 999999;
              }
          
            }

            echo $status;
        break;
            
        case '3';
            $nombresImg = (string)$userId."-3.jpg";
            $targetPath = $carpetaDestinoFinal. $nombresImg;
            $foto = $_FILES['picNasty'];

            $pic = $targetPath;
            
            if(isset($foto)){
            
              unlink($pic);
            
              if(move_uploaded_file($foto['tmp_name'], $targetPath)){

                $newString = $nastyPic1.$nastyPic2."1".$nastyPic4.$nastyPic5;
                $sql="UPDATE usuarios SET fotosNasty='$newString' WHERE idUser='$userId'";

                if($conexion->query($sql)){
                    $status = '1';
                } else{
                    $status = '998';//Error al actualizar info
                } 


              } else {
                $status = 999999;
              }
          
            }

            echo $status;
        break;
            
        case '4';
            $nombresImg = (string)$userId."-4.jpg";
            $targetPath = $carpetaDestinoFinal. $nombresImg;
            $foto = $_FILES['picNasty'];

            $pic = $targetPath;
            
            if(isset($foto)){
            
              unlink($pic);
            
              if(move_uploaded_file($foto['tmp_name'], $targetPath)){

                $newString = $nastyPic1.$nastyPic2.$nastyPic3."1".$nastyPic5;
                $sql="UPDATE usuarios SET fotosNasty='$newString' WHERE idUser='$userId'";

                if($conexion->query($sql)){
                    $status = '1';
                } else{
                    $status = '998';//Error al actualizar info
                } 


              } else {
                $status = 999999;
              }
          
            }

            echo $status;
        break;
            
        case '5';
            $nombresImg = (string)$userId."-5.jpg";
            $targetPath = $carpetaDestinoFinal. $nombresImg;
            $foto = $_FILES['picNasty'];

            $pic = $targetPath;
            
            if(isset($foto)){
            
              unlink($pic);
            
              if(move_uploaded_file($foto['tmp_name'], $targetPath)){

                $newString = $nastyPic1.$nastyPic2.$nastyPic3.$nastyPic4."1";
                $sql="UPDATE usuarios SET fotosNasty='$newString' WHERE idUser='$userId'";

                if($conexion->query($sql)){
                    $status = '1';
                } else{
                    $status = '998';//Error al actualizar info
                } 


              } else {
                $status = 999999;
              }
          
            }

            echo $status;
        break;
            
        }
        
        
        
  break;
}

?>