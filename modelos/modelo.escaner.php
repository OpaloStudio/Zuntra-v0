<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '9999';

$option = $_POST['option'];

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];

switch($option){

    case '1';

        $sql = "SELECT cover FROM qr WHERE idQr='1'";
        $result = $conexion->query($sql); 

        while($row = mysqli_fetch_array($result)){  
            $numCover = (int)$row[0];
        } 
        
        $newCover = (int)$numCover + 1;

        $sql2 = "UPDATE qr SET cover='$newCover' WHERE idQr='1'";
        $result2 = $conexion->query($sql2); 
        
        if($conexion->query($sql2)){
            $status = '1';
        } else{
            $status = '999';//No es cover
        }

        echo $status;

    break;

    case '2';

        $sql = "SELECT cortesia FROM qr WHERE idQr='1'";
        $result = $conexion->query($sql); 

        while($row = mysqli_fetch_array($result)){  
            $numCortesia = (int)$row[0];
        } 

        $newCortesia = (int)$numCortesia + 1;

        $sql2 = "UPDATE qr SET cortesia='$newCortesia' WHERE idQr='1'";
        $result2 = $conexion->query($sql2); 

        if($conexion->query($sql2)){
            $status = '1';
        } else{
            $status = '998';//No es cortesia
        }

        echo $status;

    break;

    case '3';
        $sql = "SELECT idRes FROM invitados WHERE nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0'";
        $result = $conexion->query($sql);   


        while($row = mysqli_fetch_array($result)){  
            $idRes = (int)$row[0];
        }   

        
        $sql2 = "SELECT * FROM reservaciones WHERE idRes='$idRes' AND activa='1'";
        $result2 = $conexion->query($sql2); 
        
        $arregloIDqr = array(); 
        
        while($row = mysqli_fetch_array($result2)){
            array_push($arregloIDqr, $row);
        }   
        

        if(sizeof($arregloIDqr) == 0){  
        $status = "997"; //No hay publicaciones con esas características o no está activa
        } else{ 
        
            $sql3 = "UPDATE invitados SET scan='1' WHERE nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0'";
            $result3 = $conexion->query($sql3); 
        
            if($conexion->query($sql3)){

                $sql4 = "SELECT * FROM usuarios WHERE idUser='$codigo'";
                $result4 = $conexion->query($sql4);

                while($row = mysqli_fetch_array($result4)){
                    $status = $row;
                }

                if($status == null){

                    $sql5 = "SELECT * FROM invitados WHERE idUser='$codigo'";
                    $result5 = $conexion->query($sql5);

                    while($row = mysqli_fetch_array($result5)){
                        $status = $row;
                    }

                    if($status == null){
                        $status = false;
                    }
                }
                

            } else{
                $status = '996';//Error al actualizar info
            }   
        
        }

        echo json_encode($status);

    break;

}



?>