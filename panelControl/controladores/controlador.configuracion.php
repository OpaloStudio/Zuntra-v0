<script>
    $(document).ready(function() {
        $('#btnCrearPub').css('background-color','#212121');
        $('#btnCrearPub').css('color','#DEC9A1');
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

    var openFile = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('foto1');
            output.src = dataURL;
            console.log(dataURL);
        };
        reader.readAsDataURL(input.files[0]);
    };

    var openFile2 = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('foto2');
            output.src = dataURL;
            console.log(dataURL);
        };
        reader.readAsDataURL(input.files[0]);
    };

    var openFileHorizontal = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('foto1Horizontal');
            output.src = dataURL;
            console.log(dataURL);
        };
        reader.readAsDataURL(input.files[0]);
    };

    var openFileVertical = function(event) {
        var input = event.target;

        var reader = new FileReader();
        reader.onload = function() {
            var dataURL = reader.result;
            var output = document.getElementById('foto1Vertical');
            output.src = dataURL;
            console.log(dataURL);
        };
        reader.readAsDataURL(input.files[0]);
    };

function crearPublicacion() {
    $('.eventoPromo').show();
    $('.divVerPublicaciones').hide();
    $('#btnCrearPub').css('background-color','#212121');
    $('#btnCrearPub').css('color','#DEC9A1');
    $('#btnVerPub').css('background-color','#DEC9A1');
    $('#btnVerPub').css('color','white');
}

function VerPublicaciones() {
    $('.eventoPromo').hide();
    $('.divVerPublicaciones').show();
    $('#btnVerPub').css('background-color','#212121');
    $('#btnVerPub').css('color','#DEC9A1');
    $('#btnCrearPub').css('background-color','#DEC9A1');
    $('#btnCrearPub').css('color','white');
}

function nuevoStaff() {
        $('#nav-home').show();
        $('#rps').hide();
        $('#nav-eventos').hide();
        $('#nav-diseno').hide();
        $('#nav-contact').hide();
}

function eventPromo() {
        $('#nav-home').hide();
        $('#rps').hide();
        $('#nav-eventos').show();
        $('#nav-diseno').hide();
        $('#nav-contact').hide();
}

function contenido() {
        $('#nav-home').hide();
        $('#rps').hide();
        $('#nav-eventos').hide();
        $('#nav-diseno').show();
        $('#nav-contact').hide();
}

function cerrarCesion() {
        $('#nav-home').hide();
        $('#rps').hide();
        $('#nav-eventos').hide();
        $('#nav-diseno').hide();
        $('#nav-contact').show();
}

function lol(){
    $('#nav-home').hide();
    $('#rps').show();
    $('#nav-eventos').hide();
    $('#nav-diseno').hide();
    $('#nav-contact').hide();
}

async function asyncCall() {
  var result = await lol();
  adminStaff()
  // expected output: 'resolved'
}

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
                $("#rps").empty();
                
                for(var i = 0; i < usuarios.length; i++)
                    $("#rps").append('<div class="card cardNegra cardRp mb-3" style="max-width: 540px;" id="usuario' + usuarios[i].idUser + '"><div class="row no-gutters"><div class="col-md-4"><img src=' + usuarios[i].foto + ' class="card-img" alt="profile-pic"></div><div class="col-md-6"><div class="card-body"><h5 class="card-title text-center">' + usuarios[i].nombre + '</h5><p class="card-text text-center">' + usuarios[i].total + " / " + usuarios[i].personas + '</p></div></div><div class="col-md-2 znBtns"><div class="editar"><h5 class="dorado" data-toggle="modal" data-target="#editarModal" onclick="editarModal(this)">Editar</h5></div><div class="eliminar" data-toggle="modal" data-target="#eliminarModal"><h5 class="dorado" onclick="btnEliminarVerificar(this)">Eliminar</h5></div></div></div></div>');
                $(".zonaScroll").getNiceScroll().resize();
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
            success: function(response) { ;
                if(response != "0") {
                    var usuario = JSON.parse(response);
                    $("#idUser").val(idUser);
                    $("#enombre").val(usuario.nombre);
                    $("#etelefono").val(usuario.telefono);
                    $("#epuesto").val(usuario.idTipoUsuario);
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
                    $("#foto2").attr("src", usuario.foto);
                }
            }
        });
    }

    function btnEliminarVerificar(me) {
        var idUser = $(me).parent().parent().parent().parent().attr("id").split("usuario")[1];
        var nombre = $(me).parent().parent().siblings(".col-md-6").find("div").find("h5").text();
        $("#idUserEliminar").val(idUser);
        $("#eliminarUsuarioNombre").text(nombre);
    }

    function btnEliminarUsuario() {
        var idUser = $("#idUserEliminar").val();
        $.ajax({
            type: "post",
            url: "modelos/modelo.configuracion.php",
            data: {
                "eliminar": "1",
                "idUser": idUser
            },
            success: function(response) {alert(response);
                if(response != "0") {
                    adminStaff();
                    alert("Usuario eliminado correctamente");
                } else
                    alert("Error: El usuario no pudo ser eliminado");
            }
        });
    }

    function btnRegistrar() {
        var foto = $("#registroFoto").prop("files");
        var nombre = $("#nombre").val();
        var telefono = $("#telefono").val();
        var puesto = $("#puesto").val();
        var mail = $("#mail").val();
        var cumpleanos = $("#cumpleanos").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var scanner = $("input[name='scanner']:checked").val();
        var panelControl = $("input[name='controlPane']:checked").val();

        if(nombre != "" && telefono !="" && puesto != "" && scanner != "" && panelControl != "" && mail != "" && cumpleanos != "" && password != "" && foto.length > 0) {
            if(password == password2) {
                aux = cumpleanos.split("/");
                cumpleanos = aux[2] + "-" + aux[0] + "-" + aux[1];

                var datos = new FormData();
                datos.append("registrar", "1");
                datos.append("foto", foto[0]);
                datos.append("nombre", nombre);
                datos.append("telefono", telefono);
                datos.append("puesto", puesto);
                datos.append("mail", mail);
                datos.append("cumpleanos", cumpleanos);
                datos.append("password", password);
                datos.append("scanner", scanner);
                datos.append("panelControl", panelControl);

                $.ajax({
                    type: "post",
                    url: "modelos/modelo.configuracion.php",
                    data: datos,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if(response == "0")
                            alert("Error: El Usuario no pudo ser creado");
                        else if(response == "-1")
                            alert("Error: El correo electronico ya esta en uso");
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
        var foto = $("#editarFoto").prop("files");
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

            var datos = new FormData();
            datos.append("actualizar", "1");
            datos.append("idUser", idUser);
            datos.append("nombre", nombre);
            datos.append("telefono", telefono);
            datos.append("puesto", puesto);
            datos.append("mail", mail);
            datos.append("cumpleanos", cumpleanos);
            datos.append("password", "");
            datos.append("scanner", scanner);
            datos.append("panelControl", panelControl);
            
            if(foto.length > 0)
                datos.append("foto", foto[0]);

            if(password != "") {
                if(password == password2)
                    datos.set("password", password);
                else
                    alert("Error: Las contraseñas no coinciden");
            }

            $.ajax({
                type: "post",
                url: "modelos/modelo.configuracion.php",
                data: datos,
                contentType: false,
                processData: false,
                success: function(response) {;
                    if(response == "0")
                        alert("Error: El Usuario no pudo ser creado");
                    else if(response == "-1")
                        alert("Error: El correo ya esta en uso");
                    else
                        alert("Datos actualizados correctamente");
                }
            });
        } else
            alert("Error: No debe de haber campos vacios");
    }
</script>