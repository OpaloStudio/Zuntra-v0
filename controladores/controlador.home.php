<?php

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $userName = $_SESSION['username'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    //echo $idsesion;
}

?>

<script>

var idUser = <?php echo $idsesion; ?>;

$( document ).ready(function() {
    if(idUser != 0){
        console.log("Sesión Iniciada");
        $("#linkSwipe").attr("href","?page=8");
        $("#linkReservar").attr("href","?page=4");
    } else{
        console.log("Por Favor Inicia Sesión");
        $("#linkSwipe").attr("href","?page=1");
        $("#linkReservar").attr("href","?page=4");
    }
});

function irPromos(){
    window.location.href = '?page=3';
}


</script>