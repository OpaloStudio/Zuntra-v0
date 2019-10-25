<script>
    //Variables globales del controlador
    //Variables para manejar la paginacion
    var total_usuarios = 0;
    var total_paginas = 10;
    var pagina_centro;
    var paginas_creadas;
    var pagina_ultima;
    var pagina_primera = 1;
    var pagina_actual = 1;

    $(document).ready(function() {
        $(".cardTableReserv").niceScroll({cursorcolor:"#DEC9A1"});
        $('#4').addClass('activeMas'); 

        //Obtener los primeros 10 usuarios
        cargarUsuarios();

        //Pagina central
        pagina_centro = Math.ceil(total_paginas / 2);

        //Obtener total de reservaciones
        $.ajax({
            type: "post",
            url: "modelos/modelo.reservaciones.php",
            data: {
                "opcion": "2"
            },
            success: function(response) {
                if(response != "0") {
                    var datos = response.split("-");
                    $("#reservacionesTotales").text(datos[1] + " / " + datos[0]);
                }
            }
        });

        //Boton derecho de la paginacion de profesores
        $("#paginacionUsuariosPrevious").click(function () {
            if(!$(this).hasClass("disabled")) {
                $("#paginacionUsuariosNext").removeClass("disabled");

                var pagina = parseInt($("#paginacionUsuarios .active").text(), 10);
                pagina--;

                //Obtener lo siguientes 10 registros
                var fin = 10
                var ini = pagina * fin - fin;
                obtenerUsuarios(ini, fin);

                var aux = 0, temp;
                var pagina_primera_valor = parseInt($("#paginacionUsuarios li").eq(pagina_primera).find("a").text(), 10);

                if(pagina_actual <= pagina_centro + 1 && pagina_primera_valor != pagina_primera) {
                    for(var i = 1; i < total_paginas + 1 && i < paginas_creadas + 1; i++) {
                        temp = $("#paginacionUsuarios li").eq(i).find("a");
                        aux = parseInt(temp.text(), 10);
                        temp.text(aux - 1);
                    }
                } else if(pagina_actual <= pagina_centro + 1 && pagina_primera_valor == pagina_primera) {
                    pagina_actual--;
                    $("#paginacionUsuarios li").eq(pagina_actual + 1).removeClass("active");
                    $("#paginacionUsuarios li").eq(pagina_actual).addClass("active");
                } else {
                    pagina_actual--;
                    $("#paginacionUsuarios li").eq(pagina_actual + 1).removeClass("active");
                    $("#paginacionUsuarios li").eq(pagina_actual).addClass("active");
                }
            }
            if(pagina_actual == pagina_primera) 
                $(this).addClass("disabled");
        });

        //Boton izquierdo de la paginacion de profesores
        $("#paginacionUsuariosNext").click(function () {
            if(!$(this).hasClass("disabled")) {
                $("#paginacionUsuariosPrevious").removeClass("disabled");

                var pagina = parseInt($("#paginacionUsuarios .active").text(), 10);
                pagina++;

                //Obtener lo siguientes 10 registros
                var fin = 10
                var ini = pagina * fin - fin;
                obtenerUsuarios(ini, fin);

                var aux = 0, temp;
                var pagina_ultima_valor = parseInt($("#paginacionUsuarios li").eq(pagina_ultima).find("a").text(), 10);
                
                if(pagina_actual > pagina_centro && pagina_ultima_valor != paginas_creadas) {
                    for(var i = 1; i < total_paginas + 1 && i < paginas_creadas + 1; i++) {
                        temp = $("#paginacionUsuarios li").eq(i).find("a");
                        aux = parseInt(temp.text(), 10);
                        temp.text(aux + 1);
                    }
                } else if(pagina_actual > pagina_centro && pagina_ultima_valor == paginas_creadas) {
                    pagina_actual++;
                    $("#paginacionUsuarios li").eq(pagina_actual - 1).removeClass("active");
                    $("#paginacionUsuarios li").eq(pagina_actual).addClass("active");
                } else {
                    pagina_actual++;
                    $("#paginacionUsuarios li").eq(pagina_actual - 1).removeClass("active");
                    $("#paginacionUsuarios li").eq(pagina_actual).addClass("active");
                }
            }
            if(pagina_actual == pagina_ultima) 
                $(this).addClass("disabled");
        });
    });

    function cargarUsuarios() {
        $.ajax({
            type: "post",
            url: "modelos/modelo.reservaciones.php",
            data: {
                "opcion": "1"
            },
            success: function(response) {
                usuario = JSON.parse(response);
                total_usuarios = usuario.length;

                //Mostrar os usuarios
                obtenerUsuarios(0, 10);
                
                //Crear las paginas
                crearPaginas();
                
                //Botones de las paginas
                $("#paginacionUsuarios li:not(:first):not(:last)").click(paginacionBotones);
            }
        });
    }

    function obtenerUsuarios(ini, fin) {
        $("#tablaUsuarios tbody").empty();
        for(var i = ini; i < ini + fin && i < total_usuarios; i++)
            $("#tablaUsuarios tbody").append("<tr><th scope='row'>" + (i + 1) + "</th><td>" + usuario[i].usuario + "</td><td>" + usuario[i].tipoRes + "</td><td>" + usuario[i].staff + "</td><td>" + usuario[i].numPersonas + "</td></tr>");
        $("#paginacionUsuarios li:not(:first):not(:last)").click(paginacionBotones);
    }

    function buscarUsuarioNombre(me) {
        $("#tablaUsuarios tbody").empty();
        total_usuarios = 0;
        for(var i = 0; i < usuario.length; i++) {
            if(usuario[i].usuario.toLowerCase().includes(me.value.toLowerCase())) {
                $("#tablaUsuarios tbody").append("<tr><th scope='row'>" + (i + 1) + "</th><td>" + usuario[i].usuario + "</td><td>" + usuario[i].tipoRes + "</td><td>" + usuario[i].staff + "</td><td>" + usuario[i].numPersonas + "</td></tr>");
                total_usuarios++;
            }
        }
        crearPaginas();
    }

    function crearPaginas() {
        paginas_creadas = Math.ceil(total_usuarios / 10);
        $("#paginacionUsuarios li:not(:first):not(:last)").remove();
        $("#paginacionUsuarios li").removeClass("active");
        pagina_actual = 1;
        for(var i = 0; i < total_usuarios / total_paginas && i < total_paginas; i++) {
            $("<li class='page-item'><a class='page-link' href='#'>" + (i + 1) + "</a></li>").insertBefore($("#paginacionUsuariosNext"));
            pagina_ultima = i + 1;
        }
        if(total_usuarios <= 10) {
            $("#paginacionUsuariosNext").addClass("disabled");
        } else
            $("#paginacionUsuariosNext").removeClass("disabled");
        $("#paginacionUsuarios li").eq(pagina_primera).addClass("active");
    }

    function paginacionBotones() {
        pagina_seleccionada = parseInt($(this).text(), 10);
                    
        //Obtener lo siguientes 10 registros
        var fin = 10
        var ini = pagina_seleccionada * fin - fin;
        obtenerUsuarios(ini, fin);

        switch(pagina_seleccionada) {
            case paginas_creadas:
                $("#paginacionUsuariosNext").addClass("disabled");
                $("#paginacionUsuariosPrevious").removeClass("disabled");
                break;
            case pagina_primera:
                $("#paginacionUsuariosPrevious").addClass("disabled");
                $("#paginacionUsuariosNext").removeClass("disabled");
                break;
            default:
                $("#paginacionUsuariosNext").removeClass("disabled");
                $("#paginacionUsuariosPrevious").removeClass("disabled");
                break;
        }

        if(paginas_creadas > total_paginas && pagina_seleccionada >= pagina_centro + pagina_primera && pagina_seleccionada <= paginas_creadas - (pagina_centro - 1)) { //Centro
            for(var i = 1, j = -pagina_centro; i < total_paginas + 1 && i < paginas_creadas + 1; i++, j++) {
                temp = $("#paginacionUsuarios li").eq(i).find("a");
                aux = parseInt(temp.text(), 10);
                temp.text(pagina_seleccionada + j);
                $("#paginacionUsuarios .active").removeClass("active");
                $("#paginacionUsuarios li").eq(pagina_centro + 1).addClass("active");
            }
            pagina_actual = pagina_centro + 1;        
        } else if(paginas_creadas > total_paginas && pagina_seleccionada < pagina_centro + pagina_primera) {   //Izquierdo
            for(var i = 1; i < total_paginas + 1 && i < paginas_creadas + 1; i++) {
                temp = $("#paginacionUsuarios li").eq(i).find("a");
                aux = parseInt(temp.text(), 10);
                    temp.text(i);
                    $("#paginacionUsuarios .active").removeClass("active");
                    $("#paginacionUsuarios li").eq(pagina_centro + 1).addClass("active");
                }
                pagina_actual = $("#paginacionUsuarios li:contains('" + pagina_seleccionada + "')").index();
                $("#paginacionUsuarios .active").removeClass("active");
                $("#paginacionUsuarios li:contains('" + pagina_seleccionada + "')").addClass("active");
        } else if(pagina_seleccionada >= paginas_creadas - pagina_centro) {    //Derecho
            if(paginas_creadas > total_paginas) {
                for(var i = 1, j = -pagina_centro; i < total_paginas + 1 && i < paginas_creadas + 1; i++, j++) {
                    temp = $("#paginacionUsuarios li").eq(i).find("a");
                    aux = parseInt(temp.text(), 10);
                    temp.text((paginas_creadas - (pagina_centro - 1)) + j);
                    $("#paginacionUsuarios .active").removeClass("active");
                    $("#paginacionUsuarios li").eq(pagina_centro + 1).addClass("active");
                }
            }
            pagina_actual = $("#paginacionUsuarios li:contains('" + pagina_seleccionada + "')").index();
            $("#paginacionUsuarios .active").removeClass("active");
            $("#paginacionUsuarios li:contains('" + pagina_seleccionada + "')").addClass("active");
        }
    }
</script>