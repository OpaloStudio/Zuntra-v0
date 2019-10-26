<script>
    var usuarios = new Array();

    $(document).ready(function() {
        $(".zonaRps").niceScroll(".wrap",{cursorcolor:"#DEC9A1"});
        $('#2').addClass('actived'); 

        //Cargar rps
        $.ajax({
            type: "post",
            url: "modelos/modelo.rps.php",
            data: {
                "rps": "1"
            },
            success: function(response) {
                if(response != "0") {
                    usuarios = JSON.parse(response);
                    for(var i = 0; i < usuarios.length; i++)
                        $("#rps").append('<div class="card cardNegra cardRp mb-3" style="max-width: 540px;"><div class="row no-gutters"><div class="col-md-4"><img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic"></div><div class="col-md-5"><div class="card-body"><h5 class="card-title">' + usuarios[i].nombre + '</h5><p class="card-text">30/50</p></div></div> <div class="col-md-3 znBtns"><div class="editar"> <h5 class="dorado text-center">Más Información</h5> </div></div></div></div>');
                }
            }
        });
    });

    function changeTipoStaff(me) {
        $.ajax({
            type: "post",
            url: "modelos/modelo.rps.php",
            data: {
                "tipoStaff": me.value
            },
            success: function(response) {
                $("#rps").empty();
                if(response != "0") {
                    usuarios = JSON.parse(response);
                    for(var i = 0; i < usuarios.length; i++)
                        $("#rps").append('<div class="card cardNegra cardRp mb-3" style="max-width: 540px;"><div class="row no-gutters"><div class="col-md-4"><img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic"></div><div class="col-md-5"><div class="card-body"><h5 class="card-title">' + usuarios[i].nombre + '</h5><p class="card-text">30/50</p></div></div> <div class="col-md-3 znBtns"><div class="editar"> <h5 class="dorado text-center">Más Información</h5> </div></div></div></div>');
                } else {
                    $("#rps").append('<h1 class="dorado text-center"> No hay usuarios de cargo ' + me.value + '</h1>');
                    usuarios = new Array();
                }
            }
        });
    }

    function keyupBuscar(me) {
        if(usuarios.length > 0) {
            $("#rps").empty();
            for(var i = 0; i < usuarios.length; i++)
                if(usuarios[i].nombre.toLowerCase().includes(me.value.toLowerCase()))
                    $("#rps").append('<div class="card cardNegra cardRp mb-3" style="max-width: 540px;"><div class="row no-gutters"><div class="col-md-4"><img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic"></div><div class="col-md-5"><div class="card-body"><h5 class="card-title">' + usuarios[i].nombre + '</h5><p class="card-text">30/50</p></div></div> <div class="col-md-3 znBtns"><div class="editar"> <h5 class="dorado text-center">Más Información</h5> </div></div></div></div>');
        }
    }
</script>

