<script>
    var base64, base642 = "";
    var hb64 = "", vb64 = ""; 

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

        new ImageCompressor(input.files[0], {
            quality: 0.5,
            success(result) {
                //alert(reader.readAsDataURL(result));
                $("#foto1").attr("src", URL.createObjectURL(result));

                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('foto1');
                    //output.src = dataURL;
                    base64 = dataURL;
                    console.log(dataURL);
                };
                reader.readAsDataURL(input.files[0]);
                band = true;
            },
            error(err) {
                console.log(err.message);
            },
        });
    };

    var openFile2 = function(event) {
        var input = event.target;

        new ImageCompressor(input.files[0], {
            quality: 0.5,
            success(result) {
                //alert(reader.readAsDataURL(result));
                $("#foto2").attr("src", URL.createObjectURL(result));

                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('foto2');
                    //output.src = dataURL;
                    base642 = dataURL;
                    console.log(dataURL);
                };
                reader.readAsDataURL(input.files[0]);
            },
            error(err) {
                console.log(err.message);
            },
        });
    };

    var openFileHorizontal = function(event) {
        var input = event.target;

        new ImageCompressor(input.files[0], {
            quality: 0.5,
            success(result) {
                //alert(reader.readAsDataURL(result));
                $("#fotoHorizontal").attr("src", URL.createObjectURL(result));

                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('fotoHorizontal');
                    //output.src = dataURL;
                    hb64 = dataURL;
                    console.log(dataURL);
                };
                reader.readAsDataURL(input.files[0]);
                band = true;
            },
            error(err) {
                console.log(err.message);
            },
        });
    };

    var openFileVertical = function(event) {
        var input = event.target;


        new ImageCompressor(input.files[0], {
            quality: 0.5,
            success(result) {
                //alert(reader.readAsDataURL(result));
                $("#fotoVertical").attr("src", URL.createObjectURL(result));

                var reader = new FileReader();
                reader.onload = function() {
                    var dataURL = reader.result;
                    var output = document.getElementById('fotoVertical');
                    //output.src = dataURL;
                    vb64 = dataURL;
                    console.log(dataURL);
                };
                reader.readAsDataURL(input.files[0]);
                band = true;
            },
            error(err) {
                console.log(err.message);
            },
        });
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

    $.ajax({
        type: "post",
        url: "modelos/modelo.configuracion.php",
        data: {
            "publicaciones": "1"
        },
        success: function (response) {
            if(response != "0") {
                var publicaciones = JSON.parse(response);
                $("#lasPublicaciones").empty();
                for(const publicacion of publicaciones)
                    $("#lasPublicaciones").append('<div class="card cardPublicacion"><h5 class="dorado">' + publicacion.titulo + '</h5><div class="juntitos"><h5 class="dorado red" data-toggle="modal" data-target="#eliminarPublicacion" id="' + publicacion.idPromo + '" onclick="eliminarPublicacion(this)">Eliminar</h5></div>');    
                $(".zonaScroll").getNiceScroll().resize();
            }
        }
    });
}

function changePublicaciones(param) {
    var tipo;
    switch(param) {
        case "evento":
            tipo = 1;
            break;
        case "promo":
            tipo = 0;
            break;
    }

    $.ajax({
        type: "post",
        url: "modelos/modelo.configuracion.php",
        data: {
            "changePublicacion": "1",
            "tipo": tipo
        },
        success: function(response) {
            if(response != "0") {
                var publicaciones = JSON.parse(response);
                $("#lasPublicaciones").empty();
                for(const publicacion of publicaciones)
                    $("#lasPublicaciones").append('<div class="card cardPublicacion"><h5 class="dorado">' + publicacion.titulo + '</h5><div class="juntitos"><h5 class="dorado red" data-toggle="modal" data-target="#eliminarPublicacion" id="' + publicacion.idPromo + '" onclick="eliminarPublicacion(this)">Eliminar</h5></div>');    
                $(".zonaScroll").getNiceScroll().resize();
            }
        }
    });
}

function changeDia(me) {
    var dia = me.value;

    $.ajax({
        type: "post",
        url: "modelos/modelo.configuracion.php",
        data: {
            "changePublicacionDia": "1",
            "dia": dia
        },
        success: function(response) {
            if(response != "0") {
                var publicaciones = JSON.parse(response);
                $("#lasPublicaciones").empty();
                for(const publicacion of publicaciones)
                    $("#lasPublicaciones").append('<div class="card cardPublicacion"><h5 class="dorado">' + publicacion.titulo + '</h5><div class="juntitos"><h5 class="dorado red" data-toggle="modal" data-target="#eliminarPublicacion" id="' + publicacion.idPromo + '" onclick="eliminarPublicacion(this)">Eliminar</h5></div>');    
                $(".zonaScroll").getNiceScroll().resize();
            }
        }
    });
}

function eliminarPublicacion(me) {
    $("#idPublicacion").val(me.id);
}

function btnEliminarPublicacion() {
    var idPublicacion = $("#idPublicacion").val();
    $.ajax({
        type: "post",
        url: "modelos/modelo.configuracion.php",
        data: {
            "eliminarPublicacion": "1",
            "idPublicacion": idPublicacion
        },
        success: function(response) {
            if(response == "1") {
                VerPublicaciones();
                alert("Publicacion eliminada")
            } else if(response == "0") 
                alert("La publicacion no pudo eliminarse");
        }
    });
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
  adminStaff();
  // expected output: 'resolved'
}

    function adminStaff() {
        $("#rps").empty();
        $("#rps").html('<div class="loader" id="custom">Loading...</div>');

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
                    $("#rps").append('<div class="card cardNegra cardRp mb-3" style="max-width: 540px;" id="usuario' + usuarios[i].idUser + '"><div class="row no-gutters"><div class="col-md-4"><img src="' + usuarios[i].foto + '" class="card-img" alt="profile-pic"></div><div class="col-md-6"><div class="card-body"><h5 class="card-title text-center tituloConfCard">' + usuarios[i].nombre + '</h5><p class="card-text text-center numCardConf">' + usuarios[i].total + " / " + usuarios[i].personas + '</p></div></div><div class="col-md-2 znBtns"><div class="editar"><h5 class="dorado" data-toggle="modal" data-target="#editarModal" onclick="editarModal(this)">Editar</h5></div><div class="eliminar" data-toggle="modal" data-target="#eliminarModal"><h5 class="dorado" onclick="btnEliminarVerificar(this)">Eliminar</h5></div></div></div></div>');
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
                    $("#ecumpleanos").val(aux[1] + "/" + aux[2] + "/" + aux[0]);
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
            success: function(response) {
                if(response != "0") {
                    adminStaff();
                    alert("Usuario eliminado correctamente");
                } else
                    alert("Error: El usuario no pudo ser eliminado");
            }
        });
    }

    function btnRegistrar() {
        var foto = base64;
        var nombre = $("#nombre").val();
        var telefono = $("#telefono").val();
        var puesto = $("#puesto").val();
        var mail = $("#mail").val();
        var cumpleanos = $("#cumpleanos").val();
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var scanner = $("input[name='scanner']:checked").val();
        var panelControl = $("input[name='controlPane']:checked").val();

        if(nombre != "" && telefono !="" && puesto != "" && scanner != "" && panelControl != "" && mail != "" && cumpleanos != "" && password != "" && foto != "") {
            if(password == password2) {
                aux = cumpleanos.split("/");
                cumpleanos = aux[2] + "-" + aux[0] + "-" + aux[1];

                var datos = new FormData();
                datos.append("registrar", "1");
                datos.append("foto", foto);
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
                            alert("El usuario fue creado correctamente");
                    }
                });
            } else
                alert("Error: Las contraseñas no son iguales");
        } else
            alert("Error: No debe de haber campos vacios");
    }

    function actualizarStaff() {
        var foto = (base642 != "") ? base642 : $("#foto2").attr("src");
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
                datos.append("foto", foto);

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
                success: function(response) {
                    if(response == "0")
                        alert("Error: Los datos no fueron actualizados");
                    else if(response == "-1")
                        alert("Error: El correo ya esta en uso");
                    else {
                        adminStaff();
                        base642 = "";
                        alert("Datos actualizados correctamente");
                    }
                }
            });
        } else
            alert("Error: No debe de haber campos vacios");
    }

    function btnCrearPublicacion() {
        var titulo = $("#titulo").val();
        var tipo = $("input[name='tipo']:checked").val();
        var dia = $("#dia").val();
        var fotoh = hb64;
        var fotov = vb64;

        if(titulo != "" && tipo != "" && dia != "" && fotoh != "" && fotov != "") {
            $.ajax({
                type: "post",
                url: "modelos/modelo.configuracion.php",
                data: {
                    "promos": "1",
                    "titulo": titulo,
                    "tipo": tipo,
                    "dia": dia,
                    "fotoh": fotoh,
                    "fotov": fotov
                },
                success: function(response) {
                    if(response == "1")
                        alert("Promo creada correctamente");
                    else
                        alert("La promo no pudo ser creada");
                }
            });
        } else
            alert("No debe de haber campos vacios");
    }

    function cerrarSesion() {
        $.ajax({
            type: "post",
            url: "modelos/modelo.configuracion.php",
            data: {
                "cerrar": "1"
            },
            success: function(response) {
                if(response == "1")
                    document.location = "index.php";
            }
        });
    }
</script>