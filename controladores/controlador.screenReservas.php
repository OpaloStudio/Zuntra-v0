<?php

    if(isset($_SESSION['loggedin'])){
        $idsesion = $_SESSION['userId'];
        $userType = $_SESSION['userType'];
        $userName = $_SESSION['username'];
        //echo $idsesion;

    }else{
        $idsesion = '0';
        //echo $idsesion;
    }

?>
<script>

$( document ).ready(function() {
    
});

function irMiReserva(){

    window.location.href = '?page=2';
}


function irReservasAceptadas(){
    window.location.href = '?page=16';
}
</script>