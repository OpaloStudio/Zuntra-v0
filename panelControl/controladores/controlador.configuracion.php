<script>
    $(document).ready(function() {
        $(".zonaScroll").niceScroll({cursorcolor:"#DEC9A1"});
        $('#5').addClass('activeMenos');

        $(function () {
            $('#datetimepicker4').datetimepicker({
            viewMode: 'years',
            format: 'L',
            });
        });
        $(function () {
            $('#datetimepickerConf').datetimepicker({
            viewMode: 'years',
            format: 'L',
            });
        });
    });

    function adminStaff() {
        //Cargar usuarios
        $.ajax({
            type: "post",
            url: "modelos/modelo.configuracion.php",
            data: {
                "staff": "1"
            },
            success: function(response) {
                var usuarios = JSON.parse(response);
                for(var i = 0; i < usuarios.length; i++)
                    $("#rps").append('<div class="card cardNegra cardRp mb-3" style="max-width: 540px;" id="usuario' + usuarios[i].idUser + '"><div class="row no-gutters"><div class="col-md-4"><img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic"></div><div class="col-md-6"><div class="card-body"><h5 class="card-title text-center">' + usuarios[i].nombre + '</h5><p class="card-text text-center">30/50</p></div></div><div class="col-md-2 znBtns"><div class="editar"><h5 class="dorado" data-toggle="modal" data-target="#editarModal" onclick="editarModal(this)">Editar</h5></div><div class="eliminar" data-toggle="modal" data-target="#eliminarModal"><h5 class="dorado">Eliminar</h5></div></div></div></div>');
            }
        });
    }

    function editarModal(me) {
        var idUser = $(me).parent().parent().parent().parent().attr("id").split("usuario")[1];

        $("#enombre").val("");
        $("#etelefono").val("");
        $("#epuesto").val("");
        $("#email").val("");
        $("#ecumpleanos").val("");

        $.ajax({
            type: "post",
            url: "modelos/modelo.configuracion.php",
            data: {
                "editar": "1",
                "idUser": idUser
            },
            success: function(response) {
                if(response != "0") {
                    var usuario = JSON.parse(response);
                    $("#idUser").val(idUser);
                    $("#enombre").val(usuario.nombre);
                    $("#etelefono").val(usuario.telefono);
                    $("#epuesto").val(usuario.tipoUsuario);
                    $("#email").val(usuario.correo);
                    var aux = usuario.cumpleanos.split("-");
                    $("#ecumpleanos").val(aux[2] + "/" + aux[1] + "/" + aux[0]);
                    if(usuario.scanner == "1")
                        $("#escannerSi").prop("checked", true);
                    else
                        $("#escannerNo").prop("checked", true);
                    if(usuario.panelControl == "1")
                        $("#epanelControlSi").prop("checked", true);
                    else
                        $("#epanelControlNo").prop("checked", true);
                }
            }
        });
    }

    function btnRegistrar() {
        var nombre = $("#nombre").val();
        var telefono = $("#telefono").val();
        var puesto = $("#puesto").val();
        var mail = $("#mail").val();
        var cumpleanos = $("#cumpleanos").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var scanner = $("input[name='scanner']:checked").val();
        var panelControl = $("input[name='controlPane']:checked").val();

        if(nombre != "" && telefono !="" && puesto != "" && scanner != "" && panelControl != "" && mail != "" && cumpleanos != "" && password != "") {
            if(password == password2) {
                aux = cumpleanos.split("/");
                cumpleanos = aux[2] + "-" + aux[0] + "-" + aux[1];
                $.ajax({
                    type: "post",
                    url: "modelos/modelo.configuracion.php",
                    data: {
                        "registrar": "1",
                        "nombre": nombre,
                        "telefono": telefono,
                        "puesto": puesto,
                        "mail": mail,
                        "cumpleanos": cumpleanos,
                        "password": password,
                        "scanner": scanner,
                        "panelControl": panelControl
                    },
                    success: function(response) {
                        if(response == "0")
                            alert("Error: El Usuario no pudo ser creado");
                        else if(response == "-1")
                            alert("Error: El usuario ya existe en la base de datos");
                        else
                            alert("Fue creado correctamente");
                    }
                });
            } else
                alert("Error: Las contraseñas no son iguales");
        } else
            alert("Error: No debe de haber campos vacios");
    }

    function actualizarStaff() {
        var idUser = $("#idUser").val();
        var nombre = $("#enombre").val();
        var telefono = $("#etelefono").val();
        var puesto = $("#epuesto").val();
        var mail = $("#email").val();
        var cumpleanos = $("#ecumpleanos").val();
        var password = $("#epassword").val();
        var password2 = $("#epassword2").val();
        var scanner = $("input[name='escanner']:checked").val();
        var panelControl = $("input[name='epanelControl']:checked").val();

        if(nombre != "" && telefono !="" && puesto != "" && scanner != "" && panelControl != "" && mail != "" && cumpleanos != "") {
            aux = cumpleanos.split("/");
            cumpleanos = aux[2] + "-" + aux[0] + "-" + aux[1];
            var datos = {
                "actualizar": "1",
                "idUser": idUser,
                "nombre": nombre,
                "telefono": telefono,
                "puesto": puesto,
                "mail": mail,
                "cumpleanos": cumpleanos,
                "password": "",
                "scanner": scanner,
                "panelControl": panelControl
            };
            if(password != "") {
                if(password == password2)
                    datos.password = password;
                else
                    alert("Error: Las contraseñas no coiciden");
            }
            $.ajax({
                type: "post",
                url: "modelos/modelo.configuracion.php",
                data: datos,
                success: function(response) {
                    alert(response);
                    if(response == "0")
                        alert("Error: El Usuario no pudo ser creado");
                    else if(response == "-1")
                        alert("Error: El usuario ya existe en la base de datos");
                    else
                        alert("Fue creado correctamente");
                }
            });
        } else
            alert("Error: No debe de haber campos vacios");
    }
</script>