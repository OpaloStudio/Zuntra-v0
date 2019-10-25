<?php

$user = $_GET['usuario'];
$reservacion = $_GET['reservacion'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $userType = $_SESSION['userType'];
    $userName = $_SESSION['username'];
    
    $tipoLink = $_GET['log'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    $userType = '0';
    $tipoLink = $_GET['log'];
    //echo $idsesion;
}

if(isset($_GET['nombre'])){
    $tipoLink = $_GET['log'];
    $nombreInvitado = $_GET['nombre'];
    $telefonoInvitado = $_GET['telefono'];
    
}else{
    $nombreInvitado = "Alguien";
    $telefonoInvitado = 0;
}

?>

<script type="text/javascript">

    var tipoLink = "<?php echo $tipoLink; ?>";

    var qrcode;
    var qrDescarga;

    //Información de Usuario
    var idUser;
    var nombreUser;
    var tipoUser = <?php echo $userType; ?>;

    //Información de Invitación
    var usuarioReservacion = <?php echo $user; ?>;
    var idReservacion = <?php echo $reservacion; ?>;
    var personasTotales;

    //Información de los invitados de la DB
    var invitados;
    var losInvitados = [];

    //Nombre del creador de la reservación
    var nombreReservacion;

    //Numero del nuevo invitado
    var nuevoInvitado;

    //Variable que elige la acción del Ajax
    var opcion = 0;
    
    $( document ).ready(function() {

        console.log( "ready!" );
        if(tipoLink != 'guest'){

            idUser = <?php echo $idsesion; ?>;
            nombreUser = String("<?php echo $userName; ?>");

            //Revisar que la sesión este iniciada
    
            if(idUser != 0){
                console.log("Sesión Iniciada");
    
            } else{
                console.log("Por Favor Inicia Sesión");
                var linkReservacion = "?page=1&usuario="+usuarioReservacion+"&reservacion="+idReservacion+"&log=invitados";
                window.location.href = linkReservacion;
            }

        } else {
            console.log('Sesión de Invitados');
            idUser = <?php echo $telefonoInvitado; ?>;
            nombreUser = String("<?php echo $nombreInvitado; ?>");
        }

        console.log(idUser);
        console.log(usuarioReservacion);
        console.log(idReservacion);

        opcion = 1;

        console.log(opcion);

        $.ajax({
            url: "modelos/modelo.qr.php",
            type: "POST",
            data: ({
                idUser:idUser,
                usuarioReservacion:usuarioReservacion,
                idReservacion:idReservacion,
                opcion:opcion
            }),
            success: function(msg) {
                console.log(msg);
                if (msg == 'false') {
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                } else {

                    invitados = msg;
                    var idxInvitados = 0;

                    nombreReservacion = invitados[0].nombreInvitado;
                    nuevoInvitado = invitados.length+1;
                    personasTotales = invitados[0].personasTotales;

                    var infoReserva = invitados.length+ "/" + personasTotales;
                    document.getElementById('infoReserva').innerText = infoReserva;
                    document.getElementById('numeroReserva').innerText = idReservacion;

                    console.log(infoReserva);
                    console.log(typeof infoReserva);

                    for(var i = 0; i < invitados.length; i++){

                        var node = document.createElement("LI");  
                        var textnode = document.createTextNode(invitados[i].nombreInvitado);
                        losInvitados.push(invitados[i].nombreInvitado);
                        //alert(losInvitados);
                        node.appendChild(textnode); 
                        document.getElementById("listaInvitados").appendChild(node);

                        var node2 = document.createElement("LI");  
                        var textnode2 = document.createTextNode(invitados[i].scan);
                        node2.appendChild(textnode2); 
                        document.getElementById("listaScan").appendChild(node2);

                        if(idUser == invitados[i].idUser){
                            $("#img64primero").attr("src",invitados[i].invitadoQR);
                            qrDescarga = invitados[i].invitadoQR;
                            $('#btnQRAceptar').hide();
                            $('#btnQRDescargar').show();
                            $('#btnQRShare').show();
                        } else {
                            idxInvitados++;
                        }

                    }

                    if(invitados.length == personasTotales){
                        alert("Ya se aceptaron todas las invitaciones");
                        if (losInvitados.includes(nombreUser)) {
                        $('#btnQRAceptar').hide();
                        $('#btnQRDescargar').show();
                        $('#btnQRShare').hide();
                        } else {
                        $('#btnQRAceptar').hide();
                        $('#btnQRDescargar').hide();
                        $('#btnQRShare').hide();
                        }        
                    }
                    
                    console.log(idxInvitados);                    
                } 
            },
            dataType: "json"
        });

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
            //console.log(basechida);
            aceptarInvitacion(basechida);
        
        }

    }

    function invitacionQR(){
    
        //Se une todo en una cadena para que no cause problemas a la hora de generar el código QR
        var txt = "Invitación de: "+ nombreReservacion +"\nNúmero de Host: "+ usuarioReservacion +"\nNúmero de Reservación: "+ idReservacion +"\nNombre: "+ nombreUser +"\nCódigo: "+ idUser + "\nTipo usuario: " + tipoUser;
        console.log(txt);

        qrcode.makeCode(txt);

    }

    function share() {
    var text = '¡Vamos a Zuntra! Únete a mi reservación: ';
    if ('share' in navigator) {
        navigator.share({
            title: document.title,
            text: text,
            url: location.href,
        })
    } else {
        // Here we use the WhatsApp API as fallback; remember to encode your text for URI
        //location.href = 'https://api.whatsapp.com/send?text=' + encodeURIComponent(text + ' - ') + location.href
    $('#liga').text(location.href);
  
    var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($('#liga').text()).select();
  document.execCommand("copy");
  $temp.remove();

    }
}

    function aceptarInvitacion(){
        var baseString = String(basechida);
        opcion = (tipoUser == 6) ? 3 : 2;

        console.log(idUser);
        console.log(nombreUser);
        console.log(idReservacion);
        console.log(baseString);
        console.log(opcion);

        $.ajax({
            url: "modelos/modelo.qr.php",
            type: "POST",
            data: ({
                idUser:idUser,
                nombreUser:nombreUser,
                idReservacion:idReservacion,
                usuarioReservacion:usuarioReservacion,
                personasTotales:personasTotales,
                baseString:baseString,
                opcion:opcion
            }),
            success: function(msg) {
                console.log(msg);
                console.log(typeof msg);

                switch(msg){

                    case '1':
                        alert("Invitación Aceptada");
                        location.reload();
                    break;

                    case '999':
                        alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    break;

                }

            },
            dataType: "json"
        });
    }

    function editarReserva(){
        console.log(idUser);
        console.log(idReservacion);
        opcion = 4;

        $.ajax({
            url: "modelos/modelo.qr.php",
            type: "POST",
            data: ({
                idUser:idUser,
                idReservacion:idReservacion,
                opcion:opcion
            }),
            success: function(msg) {
                console.log(msg);
                console.log(typeof msg);

                switch(msg){

                    case 1:
                        var nuevoLink = "?page=15&usuario="+usuarioReservacion+"&reservacion="+idReservacion;
                        window.location.href = nuevoLink;
                    break;

                    case 999:
                        alert("Solo el creador de la reserva puede editarla.");
                    break;

                }

            },
            dataType: "json"
        });
    }

 

    function descargaImg() {
        domtoimage.toPng(document.getElementById('contentQR'), { bgColor: 'white' })
                        .then(function (dataUrl) {
                            let link = document.createElement('a')
                            link.download = 'QrZuntra.png'
                            link.href = dataUrl
                            link.click()
                        })
    }
    

    

</script>
<script type="text/javascript" src="vistas/js/easy.qrcode.min.js" charset="utf-8"></script>