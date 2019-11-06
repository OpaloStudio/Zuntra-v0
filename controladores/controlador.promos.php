
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
        break;

        case "evento":
        $('.divTitutlo').text('Eventos');
        $('.contPromo').hide();
        $('.contEvento').show();
        break;

    }

});

</script>