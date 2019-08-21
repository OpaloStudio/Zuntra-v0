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

    var img64 = new Array();

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
                    img64 = msg;
                
                    rellenarInfoReserva(img64);
                } 
            },
            dataType: "json"
        });
    });

    function rellenarInfoReserva(){

        var string64 = new Array();

        for(var y = 0; y < img64.length; y++){

            string64.push(String(img64[y].imgQr));
            console.log(string64[y]);

        }
        var arrayBase64 = new Array();

        $("#img64primero").attr("src",string64[0]);

        for(var i = 1; i < string64.length; i++){

            var newDiv = document.createElement("DIV");
            document.getElementById("elCarrusel").appendChild(newDiv); 

            var divBase64 = "divBase64" + i ;

            newDiv.setAttribute("id", divBase64);
            newDiv.setAttribute("class", "carousel-item");
            
            var newImg = document.createElement("IMG");
            document.getElementById(divBase64).appendChild(newImg);
            
            var imgBase64 = "imgBase64" + i ;

            newImg.setAttribute("id", imgBase64);
            newImg.setAttribute("class", "imgQr d-block ");

            var stringBase64 = "#" + imgBase64;
            console.log(stringBase64);

            $(stringBase64).attr("src",string64[i]);

        }
    }

</script>