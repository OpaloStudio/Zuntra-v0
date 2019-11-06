<?php

$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}


$status = '9999';

$option = $_POST['option'];

$nombre = $_POST['nombre'];
$codigo = $_POST['codigo'];
$fecha = $_POST['fecha'];

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

    case '3':
        // Se obtiene el id de la reservacion a partir de la invitacion
        $sql = "SELECT idRes FROM invitados WHERE nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0' AND fecha = '$fecha'";
        $result = $conexion->query($sql);
        
        while($row = mysqli_fetch_array($result)) {  
            $idRes = (int)$row[0];
        }

        if($idRes == null){
            $status = 999; //No existe reserva
        }else{
            //Se revisa si la reservacion esta activa
            $sql2 = "SELECT * FROM reservaciones WHERE idRes='$idRes' AND activa='1' AND fecha = '$fecha'";
            $result2 = $conexion->query($sql2);

            while($row = mysqli_fetch_array($result2)) {  
                $reserva = (int)$row[0];
            }

            if($reserva == null){
                $status = 998; //No reserva no activa, no existente o fecha no coincide
            }else{
                //Se cambia el estado de la invitacion a 1 = escaneado
                $sql3 = "UPDATE invitados SET scan='1' WHERE idRes='$idRes' AND nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0' AND fecha = '$fecha'";
                $result3 = $conexion->query($sql3); 
        
                if($conexion->query($sql3)){
                    $status = 1; //Actualizacion exitosa
                }else{
                    $status = 997; //Error al actualizar
                }
            }
        }

        
        echo $status;
    break;

    case '4':
        // Se obtiene el id de la reservacion a partir de la invitacion
        $sql = "SELECT idRes FROM invitadosGuest WHERE nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0' AND fecha = '$fecha'";
        $result = $conexion->query($sql);
        
        while($row = mysqli_fetch_array($result)) {  
            $idRes = (int)$row[0];
        }

        if($idRes == null){
            $status = 999; //No existe reserva
        }else{
            //Se revisa si la reservacion esta activa
            $sql2 = "SELECT * FROM reservaciones WHERE idRes='$idRes' AND activa='1' AND fecha = '$fecha'";
            $result2 = $conexion->query($sql2);

            while($row = mysqli_fetch_array($result2)) {  
                $reserva = (int)$row[0];
            }

            if($reserva == null){
                $status = 998; //No reserva no activa, no existente o fecha no coincide
            }else{
                //Se cambia el estado de la invitacion a 1 = escaneado
                $sql3 = "UPDATE invitadosGuest SET scan='1' WHERE idRes='$idRes' AND nombreInvitado='$nombre' AND idUser='$codigo' AND scan='0' AND fecha = '$fecha'";
                $result3 = $conexion->query($sql3); 
            
                if($conexion->query($sql3)){
                    $status = 1; //Actualizacion exitosa
                }else{
                    $status = 997; //Error al actualizar
                }
            }
        }


        echo $status;
    break;
    
}



?>