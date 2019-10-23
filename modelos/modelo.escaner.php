<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '9999';

$option = $_POST['option'];

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];

$dia1 = $_POST['dia1'];
$dia2 = $_POST['dia2'];



switch($option){

    case '1';

    $sql = "SELECT cover FROM qr WHERE fecha='$dia1' AND fecha2='$dia2'";
    $result = $conexion->query($sql); 

    while($row = mysqli_fetch_array($result)){  
        $numCover = (int)$row[0];
    } 

    if($numCover == null){
        //No hay entrada en db por lo que se crea

        $sql3 = "INSERT INTO qr (fecha, fecha2, cover, cortesia) VALUES ('$dia1', '$dia2', 1, 0)";

        if($conexion->query($sql3)){
            //Se creó
            $status = '1';
        } else{
            $status = '997';//No se creó
        }
        
        echo $status;
    } else{
        //Si hay por lo tanto se actualiza

        $newCover = (int)$numCover + 1;

        $sql2 = "UPDATE qr SET cover='$newCover' WHERE fecha='$dia1' AND fecha2='$dia2'";
        $result2 = $conexion->query($sql2); 

        if($conexion->query($sql2)){
            $status = '1';
        } else{
            $status = '998';//No es cortesia
        }

        echo $status;
    }

    break;

    case '2';

        $sql = "SELECT cortesia FROM qr WHERE fecha='$dia1' AND fecha2='$dia2'";
        $result = $conexion->query($sql); 

        while($row = mysqli_fetch_array($result)){  
            $numCortesia = (int)$row[0];
        } 

        if($numCortesia == null){
            //No hay entrada en db por lo que se crea

            $sql3 = "INSERT INTO qr (fecha, fecha2, cover, cortesia) VALUES ('$dia1', '$dia2', 0, 1)";

            if($conexion->query($sql3)){
                //Se creó
                $status = '1';
            } else{
                $status = '997';//No se creó
            }

            echo $status;
        } else{
            //Si hay por lo tanto se actualiza

            $newCortesia = (int)$numCortesia + 1;
    
            $sql2 = "UPDATE qr SET cortesia='$newCortesia' WHERE fecha='$dia1' AND fecha2='$dia2'";
            $result2 = $conexion->query($sql2); 
    
            if($conexion->query($sql2)){
                $status = '1';
            } else{
                $status = '998';//No es cortesia
            }
    
            echo $status;
        }


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

    case '4';
        $sql = "SELECT idRes FROM invitadosGuest WHERE nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0'";
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
        
            $sql3 = "UPDATE invitadosGuest SET scan='1' WHERE nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0'";
            $result3 = $conexion->query($sql3); 
        
            if($conexion->query($sql3)){

                $sql4 = "SELECT * FROM guest WHERE telefono='$codigo'";
                $result4 = $conexion->query($sql4);

                while($row = mysqli_fetch_array($result4)){
                    $status = $row;
                }

                if($status == null){

                    $sql5 = "SELECT * FROM invitadosGuest WHERE idUser='$codigo'";
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