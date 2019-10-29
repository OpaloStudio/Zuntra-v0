<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $userType = $_SESSION['userType'];
    $userName = $_SESSION['username'];
    $userPhone = $_SESSION['userPhone'];
    
}else if($tipo == 'guestLS'){
    $userName = $_GET['nombre'];
    $idsesion = $_GET['telefono'];
    $userPhone = '0';
    $userType = '0';
    $tipo = $_GET['tipo'];
} else{
    
    $idsesion = '0';
    $userType = '0';
    $userName = '0';
    $userPhone = '0';
}

?>

<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
            viewMode: 'months',
            format: 'L',
            minDate: new Date(),
            daysOfWeekDisabled: [0, 1, 2, 3]
        });
});
    var session = <?php echo $idsesion; ?>;
    var tipoUser = <?php echo $userType; ?>;
    var nombreReserva = String("<?php echo $userName; ?>");
    var tipo = String("<?php echo $tipo; ?>");
    var telefonoReserva = <?php echo $userPhone; ?>;

    var numPersonasReserva;
    var rpReserva;
    var tipoReserva;
    var fechaReserva;
    var qrcode;
    var basechida;

    var option;


    $( document ).ready(function() {
        console.log( "Usuario: " +  session );

        nombreUser = String("<?php echo $userName; ?>");
        $('#nombreReservacion').html(nombreUser);
        //Revisar que la sesión este iniciada

        if(session != 0){
            console.log("Sesión Iniciada");

        } else{
            console.log("Por Favor Inicia Sesión");
            var linkReservacion = "?page=1&log=reserva";
            window.location.href = linkReservacion;
        }

        telefonoDiv.style.display = 'none';
        nombreDiv.style.display = 'none';

        generarQR();

    });

    function generarQR(){
        var numLogoQR = Math.floor((Math.random() * 6) + 1);

        var logoQR = "vistas/img/imgsQr/pix"+numLogoQR+".png"
        console.log(logoQR);

        qrcode = new QRCode(document.getElementById('idQR'), {
            width: 300,
            height: 300,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H,
            // ==== Logo
            logo:logoQR, // Relative address, relative to `easy.qrcode.min.js`
            //logo:"http://127.0.0.1:8020/easy-qrcodejs/demo/logo.png", 
            logoWidth:120, // widht. default is automatic width
            logoHeight:120, // height. default is automatic height
            //logoBgColor:'#fffff', // Logo backgroud color, Invalid when `logBgTransparent` is true; default is '#ffffff'
            logoBgTransparent: false // Whether use transparent image, default is false
        });

        var targetQR = document.getElementById("qrjs");

        targetQR.onload = function() {
            console.log("Se cargó el QR");
            basechida = document.getElementById("qrjs").src;
            console.log(basechida);
            reservaExist(basechida);

        }

    }

function generarReservacion(){
    
    rpReserva = document.getElementById('selectorRP').value;//alert(rpReserva);
    tipoReserva = document.getElementById('tipoReserva').value;
    fechaReserva = document.getElementById('fechaReservacion').value;
    numPersonasReserva = document.getElementById('personasReservacion').value;
    
    var numPersonas = numPersonasReserva;
    var stringNumeroPersonas = "0" + numPersonas;
    //Se convierte en string valor de la fecha de inicio
    var textoNuevo = fechaReserva.normalize('NFD');
    
    //Se une todo en una cadena para que no cause problemas a la hora de generar el código QR
    var txt1 = "RP: "+ rpReserva +"\nTipo Reservacion: "+ tipoReserva +"\nFecha: "+ fechaReserva +"\n\nNombre: "+ nombreReserva + "\nTipo usuario: " + tipoUser + "\nCódigo: "+ session;
    console.log(txt1);

    qrcode.makeCode(txt1);

}

function reservacionAdb(){

    var idTipoUsuario = <?php echo $userType; ?>;
    var nombreUser = String("<?php echo $userName; ?>");

    var idTipoRes = tipoReserva;
    var numPersonas = numPersonasReserva;
    var nombre = nombreReserva;
    var telefono = telefonoReserva;
    
    //Aquí se crea el link
    var fechaLink = fechaReserva.substring(6)+"-"+fechaReserva.substring(0,2)+"-"+fechaReserva.substring(3,5);
    console.log(fechaLink);
    
    var linkReservacion = "?page=6&fecha="+fechaLink+"&usuario="+session+"&reservacion=";
    var stringlink = String(linkReservacion);
    
    var baseString = String(basechida);


    
    console.log(idTipoRes);
    console.log(numPersonas);
    console.log(session);
    console.log(nombreUser);
    console.log(fechaReserva);
    console.log(telefono);
    console.log(stringlink);
    if(rpReserva === "-Elige a alguien-"){
        rpReserva = 0;
    }
    console.log(rpReserva);

    console.log(baseString);

    option = 2;

    $.ajax({
        url: "modelos/modelo.reservar.php",
        type: "POST",
        data: ({
            idTipoRes:idTipoRes,
            numPersonas:numPersonas,
            session:session,
            nombreUser:nombreUser,
            telefono:telefono,
            stringlink:stringlink,
            rpReserva:rpReserva,
            baseString:baseString,
            option:option,
            fechaReserva:fechaReserva
        }),
        success: function(msg) {
            console.log(msg);
            console.log(typeof msg);

            if(msg != "999"){

                if(msg != "998"){

                    if(msg != "997"){

                        if(msg != "996"){

                            window.location.href = msg;

                        } else {
                            alert("Ha ocurrido un error interno, inténtalo más tarde.");
                        }

                    } else {
                        alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    }

                } else {
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                }

            } else {
                alert("Ha ocurrido un error interno, inténtalo más tarde.");
            }
            
        },
        dataType: "json"
    });

}
 function reservaExist(basechida){

    fechaReserva = document.getElementById('fechaReservacion').value;
    //var newFecha = fechaReserva.substring(6)+"-"+fechaReserva.substring(3, 5)+"-"+fechaReserva.substring(0,2);
    console.log(session);
    console.log(fechaReserva);
    //console.log(newFecha);

    option = 1;
    
    $.ajax({
      url: "modelos/modelo.reservar.php",
      type: "POST",
      data: ({
          session:session,
          fechaReserva:fechaReserva,
          option:option
      }),
        success: function(msg) {
        console.log(msg);

        if(msg == false){
            console.log("No hay reserva registrada en esa fecha");
            reservacionAdb(basechida);
        }else{
            alert("Ya existe una reserva en esa fecha");
        }
        
            
        },
        dataType: "json"
    });
 }

 function changeTipoStaff(me) {
    var staff = me.value;
    if (me.value == 'Ninguno'){
        $("#selectorRP").empty();
            $("#selectorRP").append("<option selected disabled value='0'>Ninguno</option>");
    } else {
        $.ajax({
            type: "post",
            url: "modelos/modelo.reservar.php",
            data: {
                "option": "3",
                "staff": staff
            },
            success: function(response) {
                var usuarios = JSON.parse(response);
                $("#selectorRP").empty();
                $("#selectorRP").append("<option selected disabled>-Elige a alguien-</option>");
                for(var i = 0; i < usuarios.length; i++)
                    $("#selectorRP").append("<option value='" + usuarios[i].idUser + "'>" + usuarios[i].nombre + "</option>");
            }
        });
    }
 }

 function sendDudas(){

var titulo = document.getElementById('tituloDuda').value;
var comentario = document.getElementById('duda').value;
var tipo = 2;


    if(titulo.length > 0){
        if(comentario.length > 0){
            document.getElementById("btnEnviarDuda").disabled = true;
            $.ajax({
                url: "modelos/modelo.comentario.php",
                type: "POST",
                data: ({
                    titulo:titulo,
                    comentario:comentario,
                    tipo:tipo,
                }),
                success: function(msg) {
                    console.log(msg);
                    switch(msg){
                        case 1:
                            alert("Gracias por enviarnos tus dudas. Te responderemos muy pronto.");
                            document.getElementById("btnEnviarDuda").disabled = false;
                            document.getElementById('tituloDuda').value = "";
                            document.getElementById('duda').value = "";
                        break;

                        case 'default':
                            alert("Ha ocurrido un error interno, inténtalo más tarde.");
                            document.getElementById("btnEnviarDuda").disabled = false;
                            console.log(msg);
                        break;
                    }
                },
                dataType: "json"
            });
        }else{
            alert('Ingresa un comentario.');
        }
    }else{
        alert('Ingresa un título.');
    }

}

</script>
<script type="text/javascript" src="vistas/js/easy.qrcode.min.js" charset="utf-8"></script>