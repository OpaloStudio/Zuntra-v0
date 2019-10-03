<?php
    if(isset($_SESSION['loggedin'])){
        $idsesion = $_SESSION['userId'];
    }else{
        $idsesion = '0';
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

        miSesion = <?php echo $idsesion; ?>;
        opcion = 1;

        console.log(miSesion);

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
            
            imprimirCards(fechas, numPersonas, links, content2);

                
            },
            dataType: "json"
        });
        
    });
    
    function imprimirCards(fechas, numPersonas, links, content2){

        console.log(fechas);
        console.log(numPersonas);
        console.log(links);

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

                if(msg == false){
                    console.log("no haz creado reserva");
                    content1 = "<h4>Sin reserva creada</h4>"
                }else {

                    miFecha = msg[0].fecha;
                    misPersonas = msg[0].numPersonas;
                    miLink = msg[0].invitacion;
    
                    console.log(miFecha);
                    console.log(misPersonas);
                    console.log(miLink);

                    content1 = "<div class='cardReserva' onclick=cambiar('"
                                +miLink+
                                "')><span  class='dorado'>"
                                +miFecha+
                                "</span><span class='dorado'>"
                                +misPersonas+
                                " personas</span></div>";                
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