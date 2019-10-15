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
    });

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
                cumpleanos = aux[2] + "-" + aux[1] + "-" + aux[0];
                $.ajax({
                    type: "post",
                    url: "modelos/modelo.configuracion.php",
                    data: {
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
                        //alert(response);
                        if(response != "0")
                            alert("Usuario creado correctamento");
                        else
                            alert("Error: El usuario no pudo ser creado");
                    }
                });
            } else
                alert("Error: Las contraseñas no son iguales");
        } else
            alert("Error: No debe de haber campos vacios");
    }
</script>