<?php
    $tipoLink = $_GET['log'];

    if($tipoLink == 'guest') {
        $user = $_GET['usuario'];
        $reservacion = $_GET['reservacion'];

    } else if($tipoLink == 'editar') {
        $user = $_GET['usuario'];
        $reservacion = $_GET['reservacion'];
    } else if($tipoLink == "invitados" || $tipoLink == "invitadosGuest") {
        $user = $_GET['usuario'];
        $reservacion = $_GET['reservacion'];
    } else {
        $user = "No iniciado";
        $reservacion = 0;
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
    var opciones;
    
    $( document ).ready(function() {
        
        console.log(tipoLink);
        
        switch(tipoLink){
            case "guest":
                var usuarioReservacion = "<?php echo $user; ?>";
                var idReservacion = "<?php echo $reservacion; ?>";
                opciones = 1;

                divNombre.style.display = 'block';
                divTelefono.style.display = 'block';
                btnGuest.style.display = 'block';

                divEmail.style.display = 'none';
                divPass.style.display = 'none';
                buttonLogin.style.display = 'none';

                nuevoLink = "?page=6&usuario="+usuarioReservacion+"&reservacion="+idReservacion+"&log=guest";

            break;

            case "guestLS":
                opciones = 2;

                divNombre.style.display = 'block';
                divTelefono.style.display = 'block';
                btnGuest.style.display = 'block';

                divEmail.style.display = 'none';
                divPass.style.display = 'none';
                buttonLogin.style.display = 'none';

                nuevoLink = "?page=17";
                break;
            
            case "invitadosGuest":
                opciones = 2;

                var usuarioReservacion = "<?php echo $user; ?>";
                var idReservacion = "<?php echo $reservacion; ?>";

                nuevoLink = "?page=6&usuario="+usuarioReservacion+"&reservacion="+idReservacion;

                divNombre.style.display = 'block';
                divTelefono.style.display = 'block';
                btnGuest.style.display = 'block';

                divEmail.style.display = 'none';
                divPass.style.display = 'none';
                buttonLogin.style.display = 'none';
                break;
            case "invitados":
                opciones = 2;

                var usuarioReservacion = "<?php echo $user; ?>";
                var idReservacion = "<?php echo $reservacion; ?>";

                nuevoLink = "?page=6&usuario="+usuarioReservacion+"&reservacion="+idReservacion;
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
                nuevoLink = "?page=10";
            break;

            case "reserva":
                nuevoLink = "?page=17";
            break;

            case "escaner":
                nuevoLink = "?page=14";
            break;

            case "firstLog":
                nuevoLink = "?page=17";
            break;

            case "scrRes":
                nuevoLink = "?page=17";
            break;

            case "listaRes":
                nuevoLink = "?page=16";
            break;

            case "editar":
                var usuarioReservacion = "<?php echo $user; ?>";
                var idReservacion = "<?php echo $reservacion; ?>";


                nuevoLink = "?page=15&usuario="+usuarioReservacion+"&reservacion="+idReservacion;
            break;

            default:
                nuevoLink = "?page=13";
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
                opcion: "1",
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

        console.log(opciones);

        if(opciones == 1){
            document.getElementById('btnGuest').disabled = true;
            var nameGuest = document.getElementById('nameGuest').value;
            var celGuest = document.getElementById('phoneGuest').value;

            var newLink = nuevoLink+"&telefono="+celGuest+"&nombre="+nameGuest;alert(newLink);
        } else if(opciones == 2){
            document.getElementById('btnGuest').disabled = true;
            var nameGuest = document.getElementById('nameGuest').value;
            var celGuest = document.getElementById('phoneGuest').value;

            var newLink = nuevoLink + "&tipo=guestLS&telefono="+celGuest+"&nombre="+nameGuest;
        }

        if(nameGuest != "" && celGuest != "") {
            $.ajax({
                type: "post",
                url: "modelos/modelo.login.php",
                data: {
                    "opcion": "2",
                    "nombre": nameGuest,
                    "telefono": celGuest
                },
                success: function(response) {
                    var respuesta = parseInt(response);
                    if(respuesta == 0)
                        alert("Error: No se pudo iniciar sesión");
                    else if(respuesta == 1)
                        window.location.href = newLink;
                    
                    document.getElementById('btnGuest').disabled = false;
                }
            });   
        } else {
            alert("Error: Los campos no deben estar vacios");
            document.getElementById('btnGuest').disabled = false;
        }
    }
</script>