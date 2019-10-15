<?php

    if(isset($_SESSION['loggedin'])){
        $idsesion = $_SESSION['userId'];
        $userType = $_SESSION['userType'];
        

    }else{
        $tipoLink = $_GET['tipo'];
        if($tipoLink == "guestLS"){
            $idsesion = $_GET['telefono'];
            $userType = '6';
            
        }else{
            $idsesion = '0';
            $userType = '0';
        
        }
        
    }

?>
<script>
var sesion = <?php echo $idsesion; ?>;
var userType = <?php echo $userType; ?>;

$( document ).ready(function() {
    console.log(sesion);
    console.log(userType);
    if(userType == 0){
        console.log("Por Favor Inicia Sesión");
        var linkSwipe = "?page=1&log=scrRes";
        window.location.href = linkSwipe;

        

    } else if(userType == 6){
        console.log("Sesión de Invitado");

    } else{
        console.log("Sesión Iniciada");
    }
    
});

function irMiReserva(){
    if(userType == 6){
        alert("Solo Usuarios Registrados Pueden Crear Reservaciones");
    }else{
        window.location.href = '?page=2';
    }
    
}


function irReservasAceptadas(){

    if(userType == 6){
        window.location.href = '?page=16&tipo=guestLS&telefono='+sesion;
    }else{
        window.location.href = '?page=16';
    }
    
}
</script>