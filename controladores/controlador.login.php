<?php

    if(isset($_GET['usuario'])){
        $user = $_GET['usuario'];
        $reservacion = $_GET['reservacion'];
        $tipoLink = $_GET['log'];
        //echo $idsesion;

    }else{
        $user = $_GET['usuario'];
        $reservacion = $_GET['reservacion'];
        $tipoLink = $_GET['log'];
    }

    if(isset($_SESSION['loggedin'])){
        $idsesion = $_SESSION['userId'];
        $userType = $_SESSION['userType'];
        $userName = $_SESSION['username'];
        //echo $idsesion;

    }else{
        $idsesion = '0';
        //echo $idsesion;
    }

?>

<script>
    var tipoLink = "<?php echo $tipoLink; ?>";
    var nuevoLink;
    
    $( document ).ready(function() {
        
        console.log(tipoLink);
        
        switch(tipoLink){
            case "guest":
                var usuarioReservacion = <?php echo $user; ?>;
                var idReservacion = <?php echo $reservacion; ?>;

                divNombre.style.display = 'block';
                divTelefono.style.display = 'block';
                btnGuest.style.display = 'block';

                divEmail.style.display = 'none';
                divPass.style.display = 'none';
                buttonLogin.style.display = 'none';

                nuevoLink = "?page=6&usuario="+usuarioReservacion+"&reservacion="+idReservacion+"&log=guest"

            break;

            case "invitados":
                var usuarioReservacion = <?php echo $user; ?>;
                var idReservacion = <?php echo $reservacion; ?>;


                nuevoLink = "?page=6&usuario="+usuarioReservacion+"&reservacion="+idReservacion+"&log=invitados"

            break;

            case "swipe":
                nuevoLink = "?page=8";
            break;

            case "perfil":
                nuevoLink = "?page=7";
            break;

            case "inbox":
                nuevoLink = "?page=10";
            break;

            case "chat":
                nuevoLink = "?page=9";
            break;

            case "reservar":
                nuevoLink = "?page=2";
            break;

            console.log(nuevoLink);
        
        }

    });
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
                        //alert("Sesión Iniciada Correctamente");
                        window.location.href = nuevoLink;
                    break;
                }

            },
            dataType: "json"
        });
    }

    function guestLogIn(){
        document.getElementById('btnGuest').disabled = true;
        var nameGuest = document.getElementById('nameGuest').value;
        var celGuest = document.getElementById('phoneGuest').value;

        var newLink = nuevoLink+"&telefono="+celGuest+"&nombre="+nameGuest;

        window.location.href = newLink;
    }
</script>