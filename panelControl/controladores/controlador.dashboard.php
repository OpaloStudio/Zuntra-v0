<script>
    $(document).ready(function() {
        $(".scrollIzquierda").niceScroll(".wrap",{cursorcolor:"aquamarine"});
        $('#1').addClass('actived'); 

        //Reservaciones totales
        $.ajax({
            type: "post",
            url: "modelos/modelo.dashboard.php",
            data: {
                "opcion": "1"
            },
            success: function (response) {
                if(response != "0") {
                    var datos = response.split("-");
                    $("#reservacionesTotales").text(datos[1] + " / " + datos[0]);
                }
            }
        });

        //Reservaciones simples
        $.ajax({
            type: "post",
            url: "modelos/modelo.dashboard.php",
            data: {
                "opcion": "2"
            },
            success: function (response) {
                if(response != "0") {
                    var datos = response.split("-");
                    $("#reservacionesSimples").text(datos[1] + " / " + datos[0]);
                }
            }
        });

        //Reservaciones grupo
        $.ajax({
            type: "post",
            url: "modelos/modelo.dashboard.php",
            data: {
                "opcion": "3"
            },
            success: function (response) {
                if(response != "0") {
                    var datos = response.split("-");
                    $("#reservacionesGrupo").text(datos[1] + " / " + datos[0]);
                }
            }
        });

        //Reservaciones cumpleaños
        $.ajax({
            type: "post",
            url: "modelos/modelo.dashboard.php",
            data: {
                "opcion": "4"
            },
            success: function (response) {
                if(response != "0") {
                    var datos = response.split("-");
                    $("#reservacionesCumple").text(datos[1] + " / " + datos[0]);
                }
            }
        });

        //Reservaciones cumpleaños
        $.ajax({
            type: "post",
            url: "modelos/modelo.dashboard.php",
            data: {
                "opcion": "5"
            },
            success: function(response) {alert(response);
                var rps = JSON.parse(response);
                rps.sort(function(a, b) {
                    return b.total - a.total;
                });
                for(var i = 0; i < rps.length && i < 5; i++)
                    $("#rps").append('<div class="card cardNegra mb-3" style="max-width: 540px;"><div class="row no-gutters"><div class="col-md-4"><img src="vistas/img/logo.png" class="card-img" alt="profile-pic"></div><div class="col-md-8"><div class="card-body"><h5 class="card-title">' + rps[i].nombre + '</h5><p class="card-text">' + rps[i].total + " / " + rps[i].personas + '</p></div></div></div></div>');
            }
        });
    });
</script>