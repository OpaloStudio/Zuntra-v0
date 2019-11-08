<?php

$user = $_GET['usuario'];
$reservacion = $_GET['reservacion'];
$fecha = $_GET['fecha'];

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

if(isset($_GET['VIP'])){
    $vip = $_GET['VIP'];
}else{
    $vip = "no";
}

if(isset($_GET['v'])){
    $vipUser = $_GET['v'];
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
    var vip = "<?php echo $vip; ?>";
    var vipUser = "<?php echo $vipUser; ?>";
    var banderaVIP = false;
    var fechaReserva = "<?php echo $fecha; ?>";
    var ano = fechaReserva.substring(0,4);
    var mes = fechaReserva.substring(5,7);
    var dia = fechaReserva.substring(8);
    var dateRes = new Date(ano,mes-1,dia);
    var numDiaReserva = dateRes.getDay(fechaReserva);
    var diaReserva;
    var fechaQR = dia+"-"+mes+"-"+ano;
    var fechaEx = mes+"/"+dia+"/"+ano;

    switch(numDiaReserva){
        case 0: diaReserva = "Domingo"; break;
        case 1: diaReserva = "Lunes"; break;
        case 2: diaReserva = "Martes"; break;
        case 3: diaReserva = "Miércoles"; break;
        case 4: diaReserva = "Jueves"; break;
        case 5: diaReserva = "Viernes"; break;
        case 6: diaReserva = "Sábado"; break;
    }
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
    
            } else if(vip === "si"){
                console.log("Por Favor Inicia Sesión");
                var linkReservacion = "?page=1&usuario="+usuarioReservacion+"&reservacion="+idReservacion+"&fecha="+fechaReserva+"&log=invitados&VIP=si";
                window.location.href = linkReservacion;
            } else{
                console.log("Por Favor Inicia Sesión");
                var linkReservacion = "?page=1&usuario="+usuarioReservacion+"&reservacion="+idReservacion+"&fecha="+fechaReserva+"&log=invitados";
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
        if(vipUser == 1)
            $('#divTituloVip').html('<h2 class="dorado">Reservación VIP</h2>');

        if(vip === "si" && idUser !=  usuarioReservacion)
            banderaVIP = true;
        else
            banderaVIP = false;

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
                    document.getElementById('diaRes').innerText = diaReserva;
                    document.getElementById('fechaRes').innerText = ""+dia+"/"+mes+"/"+ano+"";

                    console.log(infoReserva);
                    console.log(typeof infoReserva);

                    for(var i = 0; i < invitados.length; i++){

                        var node = document.createElement("LI");  
                        //alert(vipUser);
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
        
        //document.getElementById("listaInvitados").firstChild.classList.add('VIP');
       
    });



    function generarQR(){
        var numLogoQR = Math.floor((Math.random() * 6) + 1);

      

        if(banderaVIP == true)
            var logoQR = "vistas/img/imgsQrVIP/pixVIP"+numLogoQR+".png";
        else
            var logoQR = "vistas/img/imgsQr/pix"+numLogoQR+".png";

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
        
        if(banderaVIP == true)
            var txt = "RP: "+ usuarioReservacion +"\nTipo Reservacion: "+ "VIP" +"\nFecha: "+ fechaQR +"\n\nNombre: "+ nombreUser + "\nTipo usuario: " + tipoUser + "\nCódigo: "+ idUser;
        else
            var txt = "Invitación de: "+ nombreReservacion +"\nNúmero de Host: "+ usuarioReservacion +"\n\nNúmero de Reservación: "+ idReservacion +"\nFecha: "+mes+"/"+dia+"/"+ano+"\n\nNombre: "+ nombreUser + "\nTipo usuario: " + tipoUser+"\nCódigo: "+ idUser;

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
        var stringLonk = String(location.href);

        var elLonk = stringLonk.substring(0, stringLonk.length - 7);
        var lonkPt1 = elLonk.substring(0, elLonk.indexOf(usuarioReservacion));
        var lonkPt2 = elLonk.substring(elLonk.indexOf(usuarioReservacion)+usuarioReservacion.toString().length);
        var ultimo = "&v=1";
        var nuevoLonk = lonkPt1 + idUser.toString() + lonkPt2 + ultimo;


        if(banderaVIP == true)
            opcion = 5;
        else
            opcion = (tipoUser == 6) ? 3 : 2;

        console.log(idUser);
        console.log(nombreUser);
        console.log(idReservacion);
        console.log(baseString);
        console.log(opcion);
        console.log(fechaQR);
        console.log(lonkPt1);
        console.log(lonkPt2);
        console.log(nuevoLonk);
      

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
                fechaQR:fechaQR,
                opcion:opcion,
                link:nuevoLonk

            }),
            success: function(msg) {
                console.log(msg);
                console.log(typeof msg);
                var response = Number(msg);

                switch(response){

                    case 1:
                        alert("Invitación Aceptada");
                        if(banderaVIP == true){
                            window.location.href = nuevoLonk;
                        }else{
                            location.reload();
                        }
                    break;

                    case 999:
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
                var response = Number(msg);

                switch(response){

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

    function reservaExist(){
        if(vip === "si"){

            var fechaReserva = fechaEx;
            var session = idUser;
    
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
                    invitacionQR();
                }else{
                    alert("Ya creaste una reserva en esa fecha");
                }
    
    
                },
                dataType: "json"
            });
        }else{
            invitacionQR();
        }
    }
    

    

</script>
<script type="text/javascript" src="vistas/js/easy.qrcode.min.js" charset="utf-8"></script>