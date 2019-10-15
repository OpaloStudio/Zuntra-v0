<script>
    $(document).ready(function() {
        $(".zonaScroll").niceScroll({cursorcolor:"#DEC9A1"});
        $('#5').addClass('activeMenos'); 
    });

    function btnRegistrar() {
        var nombre = $("#nombre").val();
        var telefono = $("#telefono").val();
        var puesto = $("#puesto").val();
        var scanner = $("input[name='scanner']:checked").val();
        var panelControl = $("input[name='controlPane']:checked").val();

        if(nombre != "" && telefono !="" && puesto != "" && scanner != "" && panelControl != "") {
            $.ajax({
                type: "post",
                url: "modelos/modelo.configuracion.php",
                data: {
                    "nombre": nombre,
                    "telefono": telefono,
                    "puesto": puesto,
                    "scanner": scanner,
                    "panelControl": panelControl
                },
                success: function(response) {
                    alert(response);
                }
            });
        } else
            alert("Error: No debe de haber campos vacios");
    }
</script>