
<?php

$tipoLink = $_GET['voy'];


?>

<script>

var tipazo = '<?php echo $tipoLink; ?>';
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
                console.log(JSON.parse(datos))
                /*$('#jImgV').attr('href','');
                $('#vImgV').attr('href','');
                $('#sImgV').attr('href','');
                $('#jImgH').attr('href','');
                $('#vImgH').attr('href','');
                $('#sImgH').attr('href','');

                $('#jEImgV').attr('href','');
                $('#vEImgV').attr('href','');
                $('#sEImgV').attr('href','');
                $('#jEImgH').attr('href','');
                $('#vEImgH').attr('href','');
                $('#sEImgH').attr('href','');*/
     }, 
})
        break;

    }

});

</script>