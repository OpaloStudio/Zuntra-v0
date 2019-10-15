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
            btnGuest.style.display = 'none';
        break;

        case "perfil":
            nuevoLink = "?page=4&log=perfil";
            btnGuest.style.display = 'none';
        break;

        case "inbox":
            nuevoLink = "?page=4&log=inbox";
            btnGuest.style.display = 'none';
        break;

        case "chat":
            nuevoLink = "?page=4&log=chat";
            btnGuest.style.display = 'none';
        break;

        case "reserva":
            nuevoLink = "?page=4&log=reserva";
        break;

        case "escaner":
            nuevoLink = "?page=4&log=escaner";
            btnGuest.style.display = 'none';
        break;

        case "firstLog":
            nuevoLink = "?page=4&log=firstLog";
            btnGuest.style.display = 'none';
        break;

        case "editar":
            var usuarioReservacion = <?php echo $user; ?>;
            var idReservacion = <?php echo $reservacion; ?>;
            nuevoLink = "?page=4&log=editar&usuario="+usuarioReservacion+"&reservacion="+idReservacion;
            btnGuest.style.display = 'none';
        break;

        default:
            nuevoLink = "?page=4";
            btnGuest.style.display = 'none';
        break;


    }
    
});

function irLogin(){
    var newLink = nuevoLink;
    window.location.href = newLink;
}

function irGuest(){
    var newLink = nuevoLink+"&log=guestLS"
    window.location.href = newLink;
}

function irRegistro(){
    window.location.href = '?page=5';
}
</script>