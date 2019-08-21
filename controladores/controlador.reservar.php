<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $userType = $_SESSION['userType'];
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
    var numPersonasReserva;
    var rpReserva;
    var tipoReserva;
    var nombreReserva;
    var telefonoReserva;
    var fechaReserva;
    var arrayBasesID = new Array();
    var arrayBasesString = new Array();
    var arrayVarQRs = new Array();
    var arrayTrigger = new Array();

    var ultimoQR;

    var qrcode1,qrcode2,qrcode3,qrcode4,qrcode5,qrcode6,qrcode7,qrcode8,qrcode9,qrcode10,qrcode11,qrcode12,qrcode13,
    qrcode14,qrcode15,qrcode16,qrcode17,qrcode18,qrcode19,qrcode20;
    
    arrayVarQRs.push(qrcode1); 
    arrayVarQRs.push(qrcode2); 
    arrayVarQRs.push(qrcode3); 
    arrayVarQRs.push(qrcode4); 
    arrayVarQRs.push(qrcode5); 
    arrayVarQRs.push(qrcode6); 
    arrayVarQRs.push(qrcode7); 
    arrayVarQRs.push(qrcode8); 
    arrayVarQRs.push(qrcode9); 
    arrayVarQRs.push(qrcode10); 
    arrayVarQRs.push(qrcode11); 
    arrayVarQRs.push(qrcode12); 
    arrayVarQRs.push(qrcode13); 
    arrayVarQRs.push(qrcode14); 
    arrayVarQRs.push(qrcode15); 
    arrayVarQRs.push(qrcode16); 
    arrayVarQRs.push(qrcode17); 
    arrayVarQRs.push(qrcode18); 
    arrayVarQRs.push(qrcode19); 
    arrayVarQRs.push(qrcode20);

    $( document ).ready(function() {
        console.log( "ready!" );

    });

    function generarQRmultiples(){
        arrayBasesID = [];
        var i = 0;
        numPersonasReserva = document.getElementById('personasReservacion').value;

        while(i < numPersonasReserva){
            var nuevaId = document.createElement("DIV");
            document.getElementById("losCuErres").appendChild(nuevaId); 
            var nombreID = "qrcode" + i ;
            var idBase = "idBase" + i ;
            arrayBasesID.push(idBase);
            nuevaId.setAttribute("id", nombreID);

            
            arrayVarQRs[i] = new QRCode(document.getElementById(nombreID), {
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
            
            var ultimoNumero = numPersonasReserva - 1;
            var ultimoID = "idBase" + ultimoNumero;
            
            var targetDiv = document.getElementById("qrjs");
            targetDiv.setAttribute("id", idBase);

            ultimoQR = document.getElementById(ultimoID);

                
            console.log("i = " + i);
            i++;
        }

        ultimoQR.onload = function() {
           console.log("ya se mostró el último Qr");
           
           for(var y = 0; y < numPersonasReserva; y++){
                var basechida = document.getElementById(arrayBasesID[y]).src;
                console.log(basechida);
                arrayBasesString.push(basechida);

           }
           reservacionAdb();

        }
    }

function generarReservacion(){
    
    rpReserva = document.getElementById('selectorRP').value;
    tipoReserva = document.getElementById('tipoReserva').value;
    nombreReserva = document.getElementById('nombreReservacion').value;
    telefonoReserva = document.getElementById('telefonoReservacion').value;
    fechaReserva = document.getElementById('fechaReservacion').value;
    numPersonasReserva = document.getElementById('personasReservacion').value;
    
    for(var x = 0; x < numPersonasReserva; x++){
        var numQR = x + 1;
        var numPersonas = numPersonasReserva;
        var stringNumeroQR = "0" + numQR;
        var stringNumeroPersonas = "0" + numPersonas;
       //Se convierte en string valor de la fecha de inicio
       var textoNuevo = fechaReserva.normalize('NFD');
    
       //Se une todo en una cadena para que no cause problemas a la hora de generar el código QR
       var txt1 = "RP: "+ rpReserva +"\nTipo Reservacion: "+ tipoReserva +"\nNombre: "+ nombreReserva +"\nTelefono: "+ telefonoReserva +"\nFecha y Hora: "+ fechaReserva +"\nQR: 0" + stringNumeroQR + " / 0" + stringNumeroPersonas;
       console.log(txt1);

       arrayVarQRs[x].makeCode(txt1);

   }

    

}

function reservacionAdb(){

    var indicadorDeCompletado = 0;
    var session = <?php echo $idsesion; ?>;
    var idTipoUsuario = <?php echo $userType; ?>;

    var idTipoRes = tipoReserva;
    var numPersonas = numPersonasReserva;
    var nombre = nombreReserva;
    var telefono = telefonoReserva;

    console.log(baseString);
    
    for(var z = 0; z < arrayBasesString.length; z++){
        
        var baseString = String(arrayBasesString[z]);
        var qrIndividual = z+1;

        $.ajax({
            url: "modelos/modelo.reservar.php",
            type: "POST",
            data: ({
                idTipoRes:idTipoRes,
                numPersonas:numPersonas,
                nombre:nombre,
                idTipoUsuario:idTipoUsuario,
                telefono:telefono,
                baseString:baseString,
                session:session,
                qrIndividual:qrIndividual
            }),
            success: function(msg) {
                console.log(msg);

                switch(msg){
    
                    case 1:
                        //alert("QR almacenado");
                        indicadorDeCompletado++;
                    break;
                    
                    case 997:
                        alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    break;
                }

                if(indicadorDeCompletado == arrayBasesString.length){
                    alert("Reservación Exitosa");
                    window.location.href = '?page=6';
                } else{
                    console.log("Indicador completado: " +indicadorDeCompletado);
                    console.log("Tamaño del arreglo: " + arrayBasesString.length);
                }

            },
            dataType: "json"
        });

    }

}
</script>
<script type="text/javascript" src="vistas/js/easy.qrcode.min.js" charset="utf-8"></script>