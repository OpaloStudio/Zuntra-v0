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
    var perfilesNombre = new Array();
    var perfilesBio = new Array();
    var indiceSwipe;

    $(document).ready(function () {
        swipeInicial();
    });

    function swipeInicial(){
        perfiles = null;
        perfilesNombre = [];
        perfilesBio = [];
        indiceSwipe = 0;
        $.ajax({
            url: "modelos/modelo.swipe.php",
            type: "POST",
            data: ({
                sesion:sesion
            }),
            success: function(msg) {
                console.log(msg);
                if (msg == 'false') {
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                } else {
                    perfiles = msg;
                    console.log(perfiles);

                    for(var i = 0; i<perfiles.length; i++){
                        perfilesNombre.push(perfiles[i].nombre);
                        perfilesBio.push(perfiles[i].biografia);
                    }

                    console.log(perfilesNombre);
                    console.log(perfilesBio);

                    console.log(perfilesNombre[indiceSwipe]);
                    console.log(perfilesBio[indiceSwipe]);

                    $("#nombreSwipe").text(perfilesNombre[indiceSwipe]);
                    $("#bioSwipe").text(perfilesBio[indiceSwipe]);

                    console.log(indiceSwipe);
                } 
            },
            dataType: "json"
        });
    }
    function rellenarSwipe(){
        
        if(indiceSwipe<perfiles.length-1){
            indiceSwipe++;
        }else {
            alert("No hay más perfiles");
        }

        $("#nombreSwipe").text(perfilesNombre[indiceSwipe]);
        $("#bioSwipe").text(perfilesBio[indiceSwipe]);
    }

    function match(){
        console.log("se agregó a " + perfilesNombre[indiceSwipe] + " a la lista buena :D");
        rellenarSwipe();
    }

    function noMatch(){
        console.log("se agregó a " + perfilesNombre[indiceSwipe] + " a la lista mala :C");
        rellenarSwipe();
    }

</script>