<script type="text/javascript">

    $(function () {
        $('#datetimepicker4').datetimepicker({
            viewMode: 'years',
            format: 'L'
        });
    });

    function registrar(){

        var nombre = document.getElementById('nombre').value;
        var telefono = document.getElementById('telefono').value;
        var email = document.getElementById('mail').value;
        var cumple = document.getElementById('cumpleaños').value;
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        
        console.log(nombre);
        console.log(telefono);
        console.log(email);
        console.log(cumple);
        console.log(password);
        console.log(password2);

        document.getElementById("botonRegistrar").disabled = true;
        if(password == password2){
            $.ajax({
                url: "modelos/modelo.registro.php",
                type: "POST",
                data: ({
                    nombre:nombre,
                    telefono:telefono,
                    email:email,
                    password:password,
                    cumple:cumple
                }),
                success: function(msg) {
                    console.log(msg);
                    switch(msg){
                        case 0:
                            alert("El correo electrónico que introduciste ya está en uso, intenta con otro.");
                            document.getElementById("botonRegistrar").disabled = false;
                        break;
                        
                        case 1:
                            alert("Tu cuenta ha sido registrada exitosamente, ya puedes entrar a tu cuenta. Serás redirigido al inicio de sesión.");
                            window.location.href = '?page=1';
                        break;

                        case 'default':
                            alert("Ha ocurrido un error interno, inténtalo más tarde.");
                            document.getElementById("botonRegistrar").disabled = false;
                            console.log(msg);
                        break;
                    }
                },
                dataType: "json"
            });
        }
        else{
            alert('El password que introduciste no coincide.');
        }

        window.onbeforeunload = function() {
            return "Dude, are you sure you want to leave? Think of the kittens!";
        }
    }
</script>
