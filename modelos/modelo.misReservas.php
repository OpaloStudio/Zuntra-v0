<?php
include ("modelo.conexion.php");
    
$user = $_POST['miSesion'];
$status = '999';
$opcion = $_POST['opcion'];
 


switch($opcion){

    case 1:

        $sql = "SELECT idRes FROM invitados WHERE NOT userRes='$user' AND idUser='$user'";
        $result = $conexion->query($sql);

        $idRes = array();

        while($row = mysqli_fetch_array($result)){
            array_push($idRes, $row[0]);
        }


        if(sizeof($idRes) == 0){
            $idRes = false;
        }else {
            $final = array();
        
            for($i = 0; $i < sizeof($idRes); $i++){
            
                $x = $idRes[$i];
                $sql2 = "SELECT * FROM reservaciones WHERE idRes='$x'";
                $result2 = $conexion->query($sql2);
            
            
                while($row = mysqli_fetch_array($result2)){
                    array_push($final, $row);
                }

                if(sizeof($final) == 0){
                    $final = false;
                }
            
            }
        }


        echo json_encode($final);

    break;

    case 2:
        $sql = "SELECT * FROM reservaciones WHERE idUser = '$user'";
        $result = $conexion->query($sql);

        $final = array();
        
        while($row = mysqli_fetch_array($result)){
            array_push($final, $row);
        }

        if(sizeof($final) == 0){
            $final = false;
        }

        echo json_encode($final);
    break;
}


?>