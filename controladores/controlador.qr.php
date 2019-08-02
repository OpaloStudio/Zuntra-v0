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

<script type="text/javascript">

    var infoQR;
    var img64;

    $( document ).ready(function() {
        console.log( "ready!" );
        var session = <?php echo $idsesion; ?>;

        $.ajax({
            url: "modelos/modelo.qr.php",
            type: "POST",
            data: ({
                session:session
            }),
            success: function(msg) {
                console.log(msg);
                if (msg == 'false') {
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                } else {
                    infoQR = msg[0];
                    img64 = infoQR.imgQr;
                
                    rellenarInfoReserva(infoQR,img64);
                } 
            },
            dataType: "json"
        });
    });

    function rellenarInfoReserva(){

        var string64 = img64;

        $("#img64").attr("src",string64);
    }

</script>