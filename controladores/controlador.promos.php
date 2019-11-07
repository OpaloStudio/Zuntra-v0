
<?php

$tipoLink = $_GET['voy'];


?>

<script>

var tipazo = '<?php echo $tipoLink; ?>';
var jueves = new Array();
var viernes = new Array();
var sabado = new Array();

$( document ).ready(function() {
    switch(tipazo){
        case "promo":
            $('.divTitutlo').text('Promos');
            $('.contPromo').show();
            $('.contEvento').hide();
            $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"modelos/modelo.promos.php", //url guarda la ruta hacia donde se hace la peticion
                data:{
                    opcion: "1"
                    }, // data recive un objeto con la informacion que se enviara al servidor
                success:function(datos){ //success es una funcion que se utiliza si el servidor retorna informacion
                console.log(JSON.parse(datos))
                promos = JSON.parse(datos);
                for( var dato of promos){
                    console.log(dato);
                    if(dato.dia == "1"){
                        jueves.push(dato);
                    }
                    else if(dato.dia == "2"){
                        viernes.push(dato);
                    }
                    else if(dato.dia == "3"){
                        sabado.push(dato);
                    }
                }
                console.log("Viernes");
                console.log(viernes);
                $('#promoJueves').empty();
                $('#promoViernes').empty();
                $('#promoSabado').empty();
                

                for(var jueve of jueves){
                    $('#promoJueves').append('<a href="'+jueve.fotoV+'"  data-lightbox="promoJueves" data-title="'+jueve.titulo+'"><img class="promo" id="jImgV" src="'+jueve.fotoH+'"></a>');
                }
                for(var vierne of viernes){
                    $('#promoViernes').append('<a href="'+vierne.fotoV+'"  data-lightbox="promoJueves" data-title="'+vierne.titulo+'"><img class="promo" id="jImgV" src="'+vierne.fotoH+'"></a>');
                }
                for(var sabad of sabado){
                    $('#promoSabado').append('<a href="'+sabad.fotoV+'"  data-lightbox="promoJueves" data-title="'+sabad.titulo+'"><img class="promo" id="jImgV" src="'+sabad.fotoH+'"></a>');
                }


                
                
     }, 
})
        break;

        case "evento":
        $('.divTitutlo').text('Eventos');
        $('.contPromo').hide();
        $('.contEvento').show();
        $.ajax({
                type:"POST", // la variable type guarda el tipo de la peticion GET,POST,..
                url:"modelos/modelo.promos.php", //url guarda la ruta hacia donde se hace la peticion
                data:{
                    opcion: "2"
                    }, // data recive un objeto con la informacion que se enviara al servidor
                success:function(datos){ //success es una funcion que se utiliza si el servidor retorna informacion
                console.log(JSON.parse(datos));
                eventos = JSON.parse(datos);
                for( var evento of eventos){
                    if(evento.dia == "1"){
                        jueves.push(evento);
                    }
                    else if(evento.dia == "2"){
                        viernes.push(evento);
                    }
                    else if(evento.dia == "3"){
                        sabado.push(evento);
                    }
                }
                
                $('#eventoJueves').empty();
                $('#eventoViernes').empty();
                $('#eventoSabado').empty();
                

                for(var jueve of jueves){
                    $('#eventoJueves').append('<a href="'+jueve.fotoV+'"  data-lightbox="eventoJueves" data-title="'+jueve.titulo+'"><img class="promo" id="jImgV" src="'+jueve.fotoH+'"></a>');
                }
                for(var vierne of viernes){
                    $('#eventoViernes').append('<a href="'+vierne.fotoV+'"  data-lightbox="eventoViernes" data-title="'+vierne.titulo+'"><img class="promo" id="jImgV" src="'+vierne.fotoH+'"></a>');
                }
                for(var sabad of sabado){
                    $('#eventoSabado').append('<a href="'+sabad.fotoV+'"  data-lightbox="eventoSabado" data-title="'+sabad.titulo+'"><img class="promo" id="jImgV" src="'+sabad.fotoH+'"></a>');
                }


     }, 
})
        break;

    }

});

</script>