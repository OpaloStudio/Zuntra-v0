<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    //echo $idsesion;
}

?>
<script>

function irSwipe(){

    var tipoSexo = document.getElementById('tipoSexo').value;
    var busco = document.getElementById('busco').value;
    var tipoCita = document.getElementById('tipoCita').value;
    var biografia = document.getElementById('biografia').value;
    var tipoETS = document.getElementById('ets').value;

    document.getElementById("btnActualizar").disabled = true;
    $.ajax({
        url: "modelos/modelo.perfil.php",
        type: "POST",
        data: ({
            tipoSexo:tipoSexo,
            tipoCita:tipoCita,
            busco:busco,
            biografia:biografia,
            tipoETS,tipoETS
        }),
        success: function(msg) {
            console.log(msg);
            switch(msg){

                case 1:
                    alert("Tus Datos Se Han Actualizado Correctamente");
                break;
                
                case "default":
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                break;
            }
        },
        dataType: "json"
    });
    

    window.location.href = '?page=8';
    /*
    window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }
    */
}

function mostrarEts(){
    $('.divEts').toggleClass( "aparecer" );
}

</script>