<script>
    function validaLogin(){
		if(document.getElementById('emailLogin').value){
			if(validateEmail(document.getElementById('emailLogin').value)==true && document.getElementById('passwordLogin').value !=''){
				document.getElementById('buttonLogin').disabled = false;
				console.log('Botón habilitado');
			}
            else{
                document.getElementById('buttonLogin').disabled = true;
			    console.log('Botón deshabilitado');
            }
		}
		else{
			document.getElementById('buttonLogin').disabled = true;
			console.log('Botón deshabilitado');
		}
	}

    function validateEmail(email){
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }

    function login(){
        document.getElementById('buttonLogin').disabled = true;
        var email = document.getElementById('emailLogin').value;
        var password = document.getElementById('passwordLogin').value;
        $.ajax({
            url: "modelos/modelo.login.php",
            type: "POST",
            data: ({
                email: email,
                password: password
            }),
            success: function(msg) {
                switch(msg){

                    case 997:

                        console.log('Error al procesar');
                    break;

                    case 0:
                        alert("El correo electrónico no existe o el password es incorrecto, verifícalos.");
                        document.getElementById('buttonLogin').disabled = false;
                    break;

                    case 1:
                        alert("Sesión Iniciada Correctamente");
                        window.location.href = '?page=8';
                    break;
                }

            },
            dataType: "json"
        });
    }
</script>