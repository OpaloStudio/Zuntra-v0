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
var info;
var listaId = new Array();
var sala = new Array();
var nombres = new Array();
var ultimosMsj = new Array();

console.log(sesion);

$(document).ready(function () {
    console.log(sesion);

    if(sesion != 0){
        console.log("Sesión Iniciada");

    } else{
        console.log("Por Favor Inicia Sesión");
        var linkSwipe = "?page=1&log=inbox";
        window.location.href = linkSwipe;
    }

    //Traer ID de los usuarios en los que tengas sala
    $.ajax({
        url: "modelos/modelo.index.php",
        type: "POST",
        data: ({
            sesion:sesion
        }),
        success: function(msg) {
            console.log(msg);
            if (msg == false){
                $("#salas").html('<h1 class="dorado text-center">No tienes mensajes </h1>');
            }
            info = msg;

            for(var i = 0; i < info.length; i++){

                sala.push(info[i].idSala);

                if(info[i].usuario1 == sesion){

                    listaId.push(info[i].usuario2);
                    nombres.push(info[i].nombre2);

                }else if(info[i].usuario2 == sesion){

                    listaId.push(info[i].usuario1);
                    nombres.push(info[i].nombre1);

                }
            }

            console.log(listaId);
            console.log(nombres);
            console.log(sala);
            ultimoMsj();
            
        },
        dataType: "json"
    });
        

    

});

function ultimoMsj(){
    var contador2 = 1;
    var saveData = {};
        console.log(sala);

    for(var i = 0; i<sala.length; i++){
        saveData[i] = sala[i];
    }

    console.log(saveData);

    $.ajax({
        url: "modelos/modelo.ultimoMsj.php",
        type: "POST",
        data: ({
            saveData:saveData
        }),
        success: function(msg) {
            console.log(msg);

            ultimosMsj = msg;
            imprimirSalas();
            
        },
        dataType: "json"
    });
    

}

function imprimirSalas(){
    console.log(ultimosMsj.length);
    console.log(nombres.length);
    console.log(ultimosMsj);
    console.log(nombres);
    console.log(listaId);
    var content = "";

    for(var i = 0; i < listaId.length; i++){
        console.log(nombres[i]);
        console.log(ultimosMsj[i]);
        var palabra = nombres[i];
        palabra = palabra.replace(/\s/g,"_");
        var lonk = "cambiar('?page=9&chat="+listaId[i]+"&sala="+sala[i]+"&nombre="+palabra+"')";
        console.log(lonk);
        var link = String(lonk);
        console.log(link);

        content +=  "<div class='sala' onclick="+link+"><div class='row'><div class='col-3'><div class='imgSala' id='idsala"
                    +i+
                    "'></div></div><div class='col-9'><h5 class='leNombre'>"
                    +nombres[i]+
                    "</h5><p class='leMensaje'>"
                    +ultimosMsj[i]+
                    "</p></div></div></div>"

                }
                
    $("#salas").html(String(content));
    
    for(var i = 0; i < listaId.length; i++){

        var aidi = "idsala"+i;
        console.log(aidi);
        var imagenChat = document.getElementById(aidi);
        var urlImg = "url('vistas/img/usuarios/"+listaId[i]+"/perfil/"+listaId[i]+"-1.jpg')";
        console.log(urlImg);
        imagenChat.style.backgroundImage = urlImg;
        
    }

}



function cambiar(x){
    window.location.href = x;

}
</script>