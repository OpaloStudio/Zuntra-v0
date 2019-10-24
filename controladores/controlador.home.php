
<?php

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $userName = $_SESSION['username'];
    $userType = $_SESSION['userType'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    $userType = '0';
    //echo $idsesion;
}

?>

<script>

var idUser = <?php echo $idsesion; ?>;
var tipoUser = <?php echo $userType; ?>;

$(document).ready(function() {
    console.log(idUser);
    console.log(tipoUser);
    
    /*function mensajito(){
            $('#agregar').modal('toggle')
}setTimeout(mensajito,3000);*/
    
if(tipoUser == 6){
        $("#linkSwipe").attr("onclick","noInvitados()");
        $("#linkReservar").attr("onclick","noInvitados()");
        $("#homeCerrarSesion").removeAttr("hidden");
        $("#homeIniciarSesion").hide();
    }
     else if(idUser != 0){
        console.log("Sesión Iniciada");
        $("#linkSwipe").attr("href","?page=8");
        $("#linkReservar").attr("href","?page=17");
        $("#homeComentarios").removeAttr("hidden");
        $("#homeCerrarSesion").removeAttr("hidden");
        $("#homeIniciarSesion").hide();
    }
    else if(idUser == 0){
        console.log("Por Favor Inicia Sesión");
        $("#linkSwipe").attr("href","?page=1&log=swipe");
        $("#linkReservar").attr("href","?page=1&log=reserva");
    }
    if(!('serviceWorker' in navigator)){
        console.log('Service Worker not supported');
        return;
    }
    
    navigator.serviceWorker.register('service-worker.js')
    .then(function(registration) {
        console.log('SW register! Scoper is:', registration.scope);
    }); //.cath a registration error
    //Manifest

    let deferredPrompt;
    const addBtn = document.getElementById('btnAdd')

    
    //addBtn.style.display = 'none';  

    //window.addEventListener('beforeinstallprompt', (e) => {
    window.addEventListener('beforeinstallprompt', (e) => {
      // Prevent Chrome 67 and earlier from automatically showing the prompt
      //e.preventDefault();
      // Stash the event so it can be triggered later.
      deferredPrompt = e;
      // Update UI to notify the user they can add to home screen
      showInstallPromotion();
      addBtn.style.display = 'block';   

      

      addBtn.addEventListener('click', (e) => {
        // hide our user interface that shows our A2HS button
        addBtn.style.display = 'none';
        // Show the prompt
        deferredPrompt.prompt();
        // Wait for the user to respond to the prompt
        deferredPrompt.userChoice.then((choiceResult) => {
            if (choiceResult.outcome === 'accepted') {
              console.log('User accepted the A2HS prompt');
            } else {
              console.log('User dismissed the A2HS prompt');
            }
            deferredPrompt = null;
          });
      });
    });


    

});

function irPromos(){
    window.location.href = '?page=3&voy=promo';
}

function irLogin(){
    window.location.href = '?page=1&log=index';
}

function noInvitados(){
    alert("Solo Usuarios Registrados Pueden Accedera Esta Sección");
}

function irEventos(){
    window.location.href = '?page=3&voy=evento';
}

function showInstallPromotion(){
    $('#agregar').modal('toggle');
}
function logout(){
    $.ajax({
        url: "modelos/modelo.cerrarSesion.php",
        type: "POST",
        success: function(msg) {
            var nuevoLink = "?page=13";
            window.location.href = nuevoLink;
            	
        },
        dataType: "json"
    });
}

function sendComentarios(){

var titulo = document.getElementById('tituloCom').value;
var comentario = document.getElementById('comentario').value;
var tipo = 1;


    if(titulo.length > 0){
        if(comentario.length > 0){
            document.getElementById("btnEnviarComent").disabled = true;
            $.ajax({
                url: "modelos/modelo.comentario.php",
                type: "POST",
                data: ({
                    titulo:titulo,
                    comentario:comentario,
                    tipo:tipo,
                }),
                success: function(msg) {
                    console.log(msg);
                    switch(msg){
                        case 1:
                            alert("Gracias por enviarnos tu comentario.");
                            document.getElementById("btnEnviarComent").disabled = false;
                            document.getElementById('tituloCom').value = "";
                            document.getElementById('comentario').value = "";
                        break;

                        case 'default':
                            alert("Ha ocurrido un error interno, inténtalo más tarde.");
                            document.getElementById("btnEnviarComent").disabled = false;
                            console.log(msg);
                        break;
                    }
                },
                dataType: "json"
            });
        }else{
            alert('Ingresa un comentario.');
        }
    }else{
        alert('Ingresa un título.');
    }

}


</script>