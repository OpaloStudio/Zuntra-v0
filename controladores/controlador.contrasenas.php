<script>
    $(document).ready(function () {
        //Validar token y usuario
        $.ajax({
            type: "post",
            url: "modelos/modelo.contrasena.php",
            data: {
                "opcion": "1",
                "usuario": "<?php echo $_GET["usuario"]; ?>",
                "token": "<?php echo $_GET["token"]; ?>"
            },
            success: function(response) {
                if(response == "0")
                    document.location = "index.php";
            }
        });
    });

    function guardarPassword() {
        var password = $("#newPassword").val();
        var password2 = $("#newPassword2").val();

        if(password != "" && password2 != "") {
            if(password == password2) {
                $.ajax({
                    type: "post",
                    url: "modelos/modelo.contrasena.php",
                    data: {
                        "opcion": "2",
                        "usuario": "<?php echo $_GET["usuario"]; ?>",
                        "token": "<?php echo $_GET["token"]; ?>",
                        "password": password
                    },
                    success: function(response) {alert(response);
                        if(response == "1") {
                            alert("La contraseña ha sido cambiada");
                            document.location = "?page=1";
                        } else
                            alert("La contraseña no pudo ser cambiada");
                    }
                });
            }
        } else
            alert("No debe haber campos vacios");
    }
</script>