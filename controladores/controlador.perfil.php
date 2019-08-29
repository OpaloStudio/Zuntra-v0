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
var sesion = <?php echo $idsesion; ?>;
$(document).ready(function () {

    if(sesion != 0){
        console.log("Sesión Iniciada");

    } else{
        console.log("Por Favor Inicia Sesión");
        var linkSwipe = "?page=1&log=perfil";
        window.location.href = linkSwipe;
    }

    $("#customFile1").fileinput({
        showUpload: false,
    });
    $("#customFile2").fileinput({
        showUpload: false,
    });
    $("#customFile3").fileinput({
        showUpload: false,
    });
    $("#customFile4").fileinput({
        showUpload: false,
    });
    $("#customFile5").fileinput({
        showUpload: false,
    });
    

});

function irSwipe(){

    var data = new FormData();

    data.append("tipoSexo", document.getElementById('tipoSexo').value);
    data.append("busco", document.getElementById('busco').value);
    data.append("tipoCita", document.getElementById('tipoCita').value);
    data.append("biografia", document.getElementById('biografia').value);
    data.append("tipoETS", document.getElementById('ets').value);

    console.log(data);

    var file_data1 = $("#customFile1").prop("files")[0];
    var file_data2 = $("#customFile2").prop("files")[0];
    var file_data3 = $("#customFile3").prop("files")[0];
    var file_data4 = $("#customFile4").prop("files")[0];
    var file_data5 = $("#customFile5").prop("files")[0];

    data.append("fotoPerfil1", file_data1);
    data.append("fotoPerfil2", file_data2);
    data.append("fotoPerfil3", file_data3);
    data.append("fotoPerfil4", file_data4);
    data.append("fotoPerfil5", file_data5);

    document.getElementById("btnActualizar").disabled = true;

    $.ajax({
        url: "modelos/modelo.perfil.php",
        type: "POST",
        dataType: "script",
        cache: false,
        contentType: false,
        processData: false,
        data: data, 
        success: function(msg) {
            console.log(msg);
            switch(msg){

                case 1:
                    alert("Tus Datos Se Han Actualizado Correctamente");
                break;

                case 997:
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                break;
                
                case "default":
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                break;
            }
        }
    });
    

    //window.location.href = '?page=8';
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
