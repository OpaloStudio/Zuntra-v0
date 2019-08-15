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
$(function () {
    $('#datetimepicker1').datetimepicker();
});
    var qrcode;
    var basechida;

    $( document ).ready(function() {
        console.log( "ready!" );

        function generarQR(){

            qrcode = new QRCode(document.getElementById("qrcode"), {
            width: 300,
            height: 300,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H,
            // ==== Logo
            logo:"vistas/img/pix1.png", // Relative address, relative to `easy.qrcode.min.js`
            //logo:"http://127.0.0.1:8020/easy-qrcodejs/demo/logo.png", 
    	    logoWidth:120, // widht. default is automatic width
    	    logoHeight:120, // height. default is automatic height
            //logoBgColor:'#fffff', // Logo backgroud color, Invalid when `logBgTransparent` is true; default is '#ffffff'
            logoBgTransparent: false // Whether use transparent image, default is false
            
            });

            var qrlisto = document.getElementById("qrjs");
            
            qrlisto.onload = function() {
                basechida = document.getElementById("qrjs").src;
                console.log(basechida);
                reservacionAdb(basechida);
            }
        }

        generarQR();

    });


function generarReservacion(){
    
    var rpReserva = document.getElementById('selectorRP').value;
    var tipoReserva = document.getElementById('tipoReserva').value;
    var nombreReserva = document.getElementById('nombreReservacion').value;
    var fechaReserva = document.getElementById('fechaReservacion').value;
    var numPersonasReserva = document.getElementById('personasReservacion').value;

    console.log(rpReserva);
    console.log(tipoReserva);
    console.log(nombreReserva);
    console.log(fechaReserva);
    console.log(numPersonasReserva);

   //Se convierte en string valor de la fecha de inicio
   var textoNuevo = fechaReserva.normalize('NFD');

   //Se une todo en una cadena para que no cause problemas a la hora de generar el código QR
   var txt1 = "RP: "+ rpReserva +"\nTipo Reservacion: "+ tipoReserva +"\nNombre: "+ nombreReserva +"\nFecha y Hora: "+ fechaReserva +"\nNumero De Personas: " + numPersonasReserva + "";
   console.log(txt1);
   
   qrcode.makeCode(txt1);

    

}

function reservacionAdb(){

    var session = <?php echo $idsesion; ?>;
    var baseString = String(basechida);
    console.log(baseString);

    $.ajax({
        url: "modelos/modelo.reservar.php",
        type: "POST",
        data: ({
            baseString:baseString,
            session:session
        }),
        success: function(msg) {
            console.log(msg);
            switch(msg){

                case 1:
                    alert("Reservación Exitosa");
                    window.location.href = '?page=6';
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
<script type="text/javascript" src="vistas/js/easy.qrcode.min.js" charset="utf-8"></script>