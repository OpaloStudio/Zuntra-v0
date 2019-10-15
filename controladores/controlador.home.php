
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
    console.log(idUser);
    /*function mensajito(){
            $('#agregar').modal('toggle')
}setTimeout(mensajito,3000);*/
    
    
    if(idUser != 0){
        console.log("Sesión Iniciada");
        $("#linkSwipe").attr("href","?page=8");
        $("#linkReservar").attr("href","?page=17");
    } else{
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

function irEventos(){
    window.location.href = '?page=3&voy=evento';
}

function showInstallPromotion(){
    $('#agregar').modal('toggle');
}



</script>