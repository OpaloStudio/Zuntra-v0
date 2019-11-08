<script>
    $(document).ready(function () {
        $.ajax({
            type: "post",
            url: "modelos/modelo.logScreen.php",
            data: {
                "opcion": "2"
            },
            success: function (response) {
                switch(response) {
                    case "1":
                        document.location = "?page=2";
                        break;
                }
            }
        });
    });

    function btnLogin() {
        var correo = $("#correo").val();
        var password = $("#password").val();

        $.ajax({
            type: "post",
            url: "modelos/modelo.logScreen.php",
            data: {
                "opcion": "1",
                "correo": correo,
                "password": password
            },
            success: function(response) {
                switch(response) {
                    case "1":
                        document.location = "?page=2";
                        break;
                    case "-1":
                        alert("No tiene acceso a esta parte del sistema");
                        break;
                    default:
                        alert("Correo o contraseña incorrecto");
                        break;
                }
            }
        });
    }
</script>