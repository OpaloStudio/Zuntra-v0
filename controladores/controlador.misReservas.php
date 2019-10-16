<?php

    if(isset($_SESSION['loggedin'])){
        $idsesion = $_SESSION['userId'];
        $userType = $_SESSION['userType'];
        

    }else{
        $tipoLink = $_GET['tipo'];
        if($tipoLink == "guestLS"){
            $idsesion = $_GET['telefono'];
            $userType = '6';
            
        }else{
            $idsesion = '0';
            $userType = '0';
        
        }
        
    }

?>

<script>

    var fechas = new Array();
    var numPersonas = new Array();
    var links = new Array();
    var content2;
    var miFecha;
    var misPersonas;
    var miLink;
    var content1;

    var opcion;
    var miSesion;


    $( document ).ready(function() {

        var miSesion = <?php echo $idsesion; ?>;
        var userType = <?php echo $userType; ?>;
        console.log(miSesion);
        console.log(userType);

        if(userType == 0){

            console.log("Por Favor Inicia Sesión");
            var linkSwipe = "?page=1&log=listaRes";
            window.location.href = linkSwipe;

        } else if(userType == 6){
            console.log("Sesión de Invitado");

        } else{
            console.log("Sesión Iniciada");
        }

    
        opcion = 1;


        $.ajax({
          url: "modelos/modelo.misReservas.php",
          type: "POST",
          data: ({
              miSesion:miSesion,
              opcion:opcion
          }),
            success: function(msg) {
            console.log(msg);
            if(msg == false){
                console.log("no haz aceptado reservas");
                content2 = "<h4>Sin reservas aceptadas</h4>"

            } else {

                for(var i = 0; i < msg.length; i++){
                
                    fechas.push(msg[i].fecha);
                    numPersonas.push(msg[i].numPersonas);
                    links.push(msg[i].invitacion);
                
                }
    
                
            }
            
            imprimirCards(fechas, numPersonas, links, content2, miSesion);

                
            },
            dataType: "json"
        });
        
    });
    
    function imprimirCards(fechas, numPersonas, links, content2, miSesion){

        console.log(fechas);
        console.log(numPersonas);
        console.log(links);
        console.log(miSesion);

        opcion = 2;

        $.ajax({
          url: "modelos/modelo.misReservas.php",
          type: "POST",
          data: ({
              miSesion:miSesion,
              opcion:opcion
          }),
            success: function(msg) {
            console.log(msg);
            content1 = "";

                if(msg == false){
                    console.log("no haz creado reserva");
                    content1 = "<h4>Sin reserva creada</h4>"
                }else {

                    
                    for(var i = 0; i < msg.length; i++){

                        miFecha = msg[i].fecha;
                        misPersonas = msg[i].numPersonas;
                        miLink = msg[i].invitacion;
        
                        console.log(miFecha);
                        console.log(misPersonas);
                        console.log(miLink);
        
                        content1 += "<div class='cardReserva' onclick=cambiar('"
                                +miLink+
                                "')><span  class='dorado'>"
                                +miFecha+
                                "</span><span class='dorado'>"
                                +misPersonas+
                                " personas</span></div>";
                    }            
                }
                if(fechas.length != 0){

                    content2 = "";
                    for(var i = 0; i < fechas.length; i++){
                        
                        content2 += "<div class='cardReserva' onclick=cambiar('"
                        +links[i]+
                        "')><span  class='dorado'>"
                        +fechas[i]+
                        "</span><span class='dorado'>"
                        +numPersonas[i]+
                        " personas</span></div>";
                    }

                }    
                                
                $("#reservaMia").html(String(content1));
                $("#invitMias").html(String(content2));


                
            },
            dataType: "json"
        });
        
        

    }

    function cambiar(x){
        window.location.href = x;

    }

</script>