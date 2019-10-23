<?php

$tipo = $_GET['tipo'];
$reserva = $_GET['reservacion'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $userType = $_SESSION['userType'];
    $userName = $_SESSION['username'];
    $userPhone = $_SESSION['userPhone'];
    //echo $idsesion;
    
}else{
    
    $idsesion = '0';
    $userType = '0';
    $userName = '0';
    $userPhone = '0';
}

?>

<script type="text/javascript">
$(function () {
    $('#datetimepicker1').datetimepicker({
            viewMode: 'years',
            format: 'L'
        });
});

function changeTipoStaff2(me) {
    var staff = me.value;
    $.ajax({
        type: "post",
        url: "modelos/modelo.reservar.php",
        data: {
            "option": "3",
            "staff": staff
        },
        success: function(response) {
            alert(response);
            var usuarios = JSON.parse(response);
            $("#selectorRP").empty();
            $("#selectorRP").append("<option selected disabled>-Elige a alguien-</option>");
            for(var i = 0; i < usuarios.length; i++)
                $("#selectorRP").append("<option value='"+usuarios[i].idUser+"'>" + usuarios[i].nombre + "</option>");
        }
    });
 }
    var miSesion = <?php echo $idsesion; ?>;
    var miNombre = String("<?php echo $userName; ?>");
    
    var numPersonasReserva;
    var laReserva;
    var rpReserva;
    var tipoReserva;
    var fechaReserva;
    var liveRP;


    $( document ).ready(function() {
        console.log( "Usuario: " +  miSesion );

        miNombre = String("<?php echo $userName; ?>");
        //Revisar que la sesión este iniciada

        if(miSesion != 0){
            console.log("Sesión Iniciada");
            laReserva = <?php echo $reserva; ?>;
            console.log(laReserva);
            console.log(typeof laReserva);

        } else{
            console.log("Por Favor Inicia Sesión");
            var linkReservacion = '?page=1&usuario=16&reservacion=258&log=editar';
            window.location.href = linkReservacion;
        }

        telefonoDiv.style.display = 'none';
        nombreDiv.style.display = 'none';


        $.ajax({
            url: "modelos/modelo.reservaExistente.php",
            type: "POST",
            data: ({
                miSesion:miSesion,
                laReserva:laReserva
            }),
            success: function(msg) {
                console.log(msg);

                if(msg == false){
                    alert("Solo el creador de la reserva puede editarla.");
                    window.location.href = '?page=2';
                }else{
                    alert("Existe Reservacion");

                    console.log(msg[0].idRp);
                    console.log(msg[0].idTipoRes);
                    console.log(msg[0].fecha);
                    console.log(msg[0].numPersonas);

                    //$("#opcion1").val(msg[0].idRp);
                    //$("#opcion1").text("Hola");
                    $("#tipoReserva").val(msg[0].idTipoRes);
                    $("#fechaReservacion").val(msg[0].fecha);
                    $("#personasReservacion").val(msg[0].numPersonas);
                    
                }


            },
            dataType: "json"
        });

        

    });

   

    function generarReservacion(){

        rpReserva = document.getElementById('selectorRP').value;
        tipoReserva = document.getElementById('tipoReserva').value;
        fechaReserva = document.getElementById('fechaReservacion').value;
        numPersonasReserva = document.getElementById('personasReservacion').value;

        if(rpReserva === "-Elige a alguien-"){
            rpReserva = 0;
        }

        console.log(rpReserva);
        console.log(tipoReserva);
        console.log(fechaReserva);
        console.log(numPersonasReserva);

        $.ajax({
            url: "modelos/modelo.editarReserva.php",
            type: "POST",
            data: ({
                rpReserva:rpReserva,
                tipoReserva:tipoReserva,
                fechaReserva:fechaReserva,
                numPersonasReserva:numPersonasReserva,
                laReserva:laReserva
            }),
            success: function(msg) {
                console.log(msg);

                switch(msg){

                    case 1:
                        alert("Reserva Actualizada");
                        window.location.href = '?page=2';
                    break;

                    case 998:
                        alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    break;

                }


            },
            dataType: "json"
        });

    }

   
</script>
<script type="text/javascript" src="vistas/js/easy.qrcode.min.js" charset="utf-8"></script>