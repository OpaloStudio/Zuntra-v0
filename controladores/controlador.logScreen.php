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

    if(isset($_GET['VIP'])){
        $vip = $_GET['VIP'];
    }else{
        $vip = "no";
    }
    if(isset($_GET['fecha'])){
        $fechaLink = $_GET['fecha'];
    }else{
        $fechaLink = "1970-01-01";
    }

?>
<script>
var tipoLink = "<?php echo $tipoLink; ?>";
var nuevoLink;

$( document ).ready(function() {
    console.log(tipoLink);

    switch(tipoLink){
        case "invitados":
            btnGuest.style.display = 'block';
            var usuarioReservacion = <?php echo $user; ?>;
            var idReservacion = <?php echo $reservacion; ?>;
            var fechaLink = "<?php echo $fechaLink; ?>";
            var vip = "<?php echo $vip; ?>";

            if(vip === "si")
                nuevoLink = "?page=4&usuario="+usuarioReservacion+"&reservacion="+idReservacion + "&log=invitados&VIP=si&fecha="+fechaLink;
            else
                nuevoLink = "?page=4&usuario="+usuarioReservacion+"&reservacion="+idReservacion + "&log=invitados&fecha="+fechaLink;

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
            btnGuest.style.display = 'block';
        break;

        case "index":
            nuevoLink = "?page=4&log=index";
            btnGuest.style.display = 'block';
        break;

        case "escaner":
            nuevoLink = "?page=4&log=escaner";
            btnGuest.style.display = 'none';
        break;

        case "firstLog":
            nuevoLink = "?page=4&log=firstLog";
            btnGuest.style.display = 'none';
        break;

        case "scrRes":
            nuevoLink = "?page=4&log=scrRes";
            btnGuest.style.display = 'block';
        break;

        case "listaRes":
            nuevoLink = "?page=4&log=listaRes";
            btnGuest.style.display = 'block';
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

function recoverPass(){
    $(".btnOscuro").hide();
    $(".linkPass").hide();
    $(".labelin").show();
    $("#emailRecover").show();
    $("#btnCorreo").show();
}

function enviarCorreo() {
    var correo = $("#emailRecover").val();

    if(correo != "") {
        $.ajax({
            type: "post",
            url: "modelos/modelo.logScreen.php",
            data: {
                "opcion": "1",
                "correo": correo
            },
            success: function(response) { alert(response);
                switch(response) {
                    case "-1":
                        alert("El correo no corresponde a ningun usuario registrado");
                        break;
                    case "0":
                        alert("Error interno el correo no pudo ser enviado");
                        break;
                    case "1":
                        alert("Se acaba de enviar un correo para recuperar su contraseña");
                        document.location = "?page=1";
                        break;
                    default:
                        alert("Error interno el correo no pudo ser enviado");
                        break;
                }
            }
        });
    } else
        alert("No debe haber campos vacios");
    
}

function irLogin(){
    var newLink = nuevoLink;
    window.location.href = newLink;
}

function irGuest(){
    var newLink;
    if(nuevoLink.includes("log=reserva"))
        newLink = nuevoLink + "&log=guestLS";
    else if(nuevoLink.includes("log=invitados"))
        newLink = nuevoLink + "&log=invitadosGuest";
    else
        newLink = nuevoLink;
    window.location.href = newLink;
}

function irRegistro(){
    window.location.href = '?page=5';
}
</script>