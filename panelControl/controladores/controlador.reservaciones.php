<script>
    $(document).ready(function() {
        $(".cardTableReserv").niceScroll({cursorcolor:"#DEC9A1"});
        $('#4').addClass('activeMas'); 

        //Obtener reservaciones
        $.ajax({
            type: "post",
            url: "modelos/modelo.reservaciones.php",
            data: {
                "opcion": "1"
            },
            success: function(response) {
                if(response != "0") {
                    var reservacion = JSON.parse(response);
                    $("#tablaReservaciones tbody").empty();
                    for(var i = 0; i < reservacion.length; i++)
                        $("#tablaReservaciones").append("<tr><th scope='col'>" + (i + 1) + "</th><td>" + reservacion[i].usuario + "</td><td>" + reservacion[i].tipoRes + "</td><td>" + reservacion[i].staff + "</td><td>" + reservacion[i].numPersonas + "</td></tr>");
                }
            }
        });

        //Obtener total de reservaciones
        $.ajax({
            type: "post",
            url: "modelos/modelo.reservaciones.php",
            data: {
                "opcion": "2"
            },
            success: function(response) {alert(response);
                if(response != "0") {
                    var datos = response.split("-");
                    $("#reservacionesTotales").text(datos[1] + " / " + datos[0]);
                }
            }
        });
    });
</script>