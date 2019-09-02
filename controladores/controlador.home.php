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
    window.addEventListener('beforeinstallprompt',(e)=>{
        //Prevent Chrome 67 and earlier from automatically 
        //Showing the prompt
        e.preventDefault();
        //Stash the event so it can be triggered later.
        deferredPrompt = e;
        //Update UI notify the user they can add to homescreen.
        btnAdd.style.display = 'block';

    });

    btnAdd,addEventListener('click', (e)=> {
        deferredPrompt.prompt();
        deferredPrompt.userChoice.then((choiceResult) => {
            if(choiceResult.outcome === 'accepted') {
                console.log('User accepted the A2HS prompt');
            }
            deferredPrompt = null;
        });
    });
});

function irPromos(){
    window.location.href = '?page=3';
}


</script>