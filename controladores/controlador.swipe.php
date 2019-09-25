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
    var perfiles;
    var perfilesID = new Array();
    var perfilesNombre = new Array();
    var perfilesBio = new Array();
    var perfilesBloqueados = new Array();
    var indiceSwipe;
    var indiceBloqueos;
    var option;

    $(document).ready(function () {

        if(sesion != 0){
            console.log("Sesión Iniciada");

        } else{
            console.log("Por Favor Inicia Sesión");
            var linkSwipe = "?page=1&log=swipe";
            window.location.href = linkSwipe;
        }
        swipeInicial();
    });

    function swipeInicial(){
        perfiles = null;
        perfilesID = [];
        perfilesNombre = [];
        perfilesBio = [];
        perfilesBloqueados = [];
        indiceSwipe = 0;
        indiceBloqueos = 0;
        option = 1;
        $.ajax({
            url: "modelos/modelo.swipe.php",
            type: "POST",
            data: ({
                sesion:sesion,
                option:option
            }),
            success: function(msg) {
                console.log(msg);
                if (msg == 'false') {
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                } else {
                    perfiles = msg;
                    console.log(perfiles);

                    for(var i = 0; i<perfiles.length; i++){

                        if(perfiles[i].idBloqueado != null){
                            perfilesBloqueados.push(perfiles[i].idBloqueado);
                        }
                    }

                    indiceBloqueo = perfilesBloqueados.length;

                    for(var a = 0; a < perfiles.length; a++){
                        var marcadorBloqueo = 0;

                        for(var b = 0; b<perfilesBloqueados.length; b++){
                            if(perfiles[a].idUser != perfilesBloqueados[b]){
                                marcadorBloqueo++;
                            } else{
                                console.log(perfiles[a].nombre + ' Bloqueado');
                            }
                        }
                        if((marcadorBloqueo == indiceBloqueo) && (perfiles[a].nombre != null)){
                            perfilesNombre.push(perfiles[a].nombre);
                            perfilesBio.push(perfiles[a].biografia);
                            perfilesID.push(perfiles[a].idUser);
                            console.log(perfiles[a].nombre + ' Adentro');
                        }
                    }
                    
                    

                    console.log(perfilesNombre);
                    console.log(perfilesBio);
                    console.log(perfilesBloqueados);

                    console.log(perfilesNombre[indiceSwipe]);
                    console.log(perfilesBio[indiceSwipe]);
                    console.log(perfilesID[indiceSwipe]);

                    $("#nombreSwipe").text(perfilesNombre[indiceSwipe]);
                    $("#bioSwipe").text(perfilesBio[indiceSwipe]);
                    $("#imgSwip1").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-1.jpg");
                    $("#imgSwip2").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-2.jpg");
                    $("#imgSwip3").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-3.jpg");
                    $("#imgSwip4").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-4.jpg");
                    $("#imgSwip5").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-5.jpg");

                    console.log(indiceSwipe);
                } 
            },
            dataType: "json"
        });
    }
    function rellenarSwipe(){
        
        if(indiceSwipe<perfilesNombre.length-1){
            indiceSwipe++;
        }else {
            alert("No hay más perfiles");
        }

        $("#nombreSwipe").text(perfilesNombre[indiceSwipe]);
        $("#bioSwipe").text(perfilesBio[indiceSwipe]);
        $("#imgSwip1").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-1.jpg");
        $("#imgSwip2").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-2.jpg");
        $("#imgSwip3").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-3.jpg");
        $("#imgSwip4").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-4.jpg");
        $("#imgSwip5").attr("src","vistas/img/usuarios/"+perfilesID[indiceSwipe]+"/perfil/"+perfilesID[indiceSwipe]+"-5.jpg");
    }

    function match(){
        console.log("se agregó a " + perfilesNombre[indiceSwipe] + " a la lista buena :D");
        rellenarSwipe();
    }

    function noMatch(){
        console.log("se agregó a " + perfilesNombre[indiceSwipe] + " a la lista mala :C");
        rellenarSwipe();
    }

    function iniciarMsg(){

        console.log('hola');
        
        option = 2;
        var like = perfilesID[indiceSwipe];
        
        console.log(sesion);
        console.log(like);
        


        $.ajax({
            url: "modelos/modelo.swipe.php",
            type: "POST",
            data: ({
                sesion:sesion,
                like:like,
                option:option

            }),
            success: function(msg) {

                console.log(msg);

                if(msg == 9999999998){
                    alert("Error al entrar a sala");
                }else if(msg == 9999999997){
                    alert("Error al entrar a sala");
                }else if(msg != 0){
                    window.location.href = "?page=9&chat="+like+"&sala="+msg;
                }

            },
            dataType: "json"
        });
        
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

    function bloqueo(){
        var txt = '';
        var bloqueador = sesion;
        var bloqueado = perfilesID[indiceSwipe];
        var otraRazon = document.getElementById("razon").value;
        //var razones = document.getElementById('nombre').value;

        if($("#c1").prop('checked')){
            txt = txt + ' ' + 'No especificar,';
        }
        if($("#c2").prop('checked')){
            txt = txt + ' ' + 'Comportamiento fuera de lugar,';
        }
        if($("#c3").prop('checked')){
            txt = txt + ' ' + 'Es muy insistente,';
        }
        if($("#c4").prop('checked')){
            txt = txt + ' ' + 'Hay una relación pasada,';
        }
        if(otraRazon != ""){
            txt = txt + ' ' + otraRazon + ",";
        }

        var motivo = '[' + txt.slice(0, -1) + ' ]';
        
        console.log(motivo);
        console.log(bloqueador);
        console.log(bloqueado);
        
        
        $.ajax({
            url: "modelos/modelo.bloqueo.php",
            type: "POST",
            data: ({
                bloqueador:bloqueador,
                bloqueado:bloqueado,
                motivo:motivo
            }),
            success: function(msg) {

                console.log(msg);

                switch(msg){

                case 1:
                    alert("Usuario Bloqueado Exitosamente");
                break;

                case 997:
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                break;
                }
            },
            dataType: "json"
        });
        
    }

</script>