<?php

    if(isset($_GET['usuario'])){
        $user = $_GET['usuario'];
        $reservacion = $_GET['reservacion'];
        $tipoLink = $_GET['log'];
        //echo $idsesion;

    }else{
        $user = 0;
        $reservacion = 0;
        $tipoLink = $_GET['log'];
    }

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
var tipoLink = "<?php echo $tipoLink; ?>";
var nuevoLink;

$( document ).ready(function() {
    console.log(tipoLink);

    switch(tipoLink){
        case "invitados":
            var usuarioReservacion = <?php echo $user; ?>;
            var idReservacion = <?php echo $reservacion; ?>;
            nuevoLink = "?page=4&usuario="+usuarioReservacion+"&reservacion="+idReservacion;
        break;

        case "swipe":
            nuevoLink = "?page=4&log=swipe";
        break;

        case "perfil":
            nuevoLink = "?page=4&log=perfil";
        break;

        case "inbox":
            nuevoLink = "?page=4&log=inbox";
        break;

        case "chat":
            nuevoLink = "?page=4&log=chat";
        break;

        case "reserva":
            nuevoLink = "?page=4&log=reserva";
        break;

        default:
            nuevoLink = "?page=4";
        break;


    }
    
});

function irLogin(){
    var newLink = nuevoLink;
    window.location.href = newLink;
}

function irGuest(){
    var newLink = nuevoLink+"&log=guest"
    window.location.href = newLink;
}

function irRegistro(){
    window.location.href = '?page=5';
}
</script>