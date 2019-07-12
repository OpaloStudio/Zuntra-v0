<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="title" content="">

    <meta name="description" content="">

    <meta name="keyword" content="">

    <title>Zuntra POP CLUB</title>
    <link rel="icon" type="image/png" id="dinamico" href="vistas/img/elfavicon/favnar.png" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link href="vistas/css/app.css" media="all" rel="stylesheet" type="text/css" />
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/interactjs@1.3.4/dist/interact.min.js"></script>
    <script src="vistas/js/jquery.nicescroll.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>



    <?php
	
	//Los controladores que se utilizan en todas las páginas, se incluyen fuera del if de abajo.
	
	if(isset($_GET['id'])){
		
	}
	elseif(isset($_GET['page'])){//Esta variable verifica que exista un id para la página visitada,
						   //si no existe, es porque está en el index, entonces lo del index se incluye
						   //en el else en el orden que deben aparecer las closas

		switch($_GET['page']){

			case '1':
			//Registro
			include('controladores/controlador.logScreen.php');
			break;

			case '2':
			//Perfil
			include('controladores/controlador.reservar.php');
			break;

			case '3':
			//Nueva publicación
			include('controladores/controlador.promos.php');
			break;

			case '4':
			//Publicación
			include('controladores/controlador.login.php');
			break;

			case '5':
			//Buscador
			include('controladores/controlador.register.php');
			break;

			case '6':
			//Panel de publicaciones
			include('controladores/controlador.qr.php');
			break;

			case '7':
			//Panel de publicaciones
			include('controladores/controlador.administrar.php');
			break;

			case '8':
			//Panel de publicaciones
			include('controladores/controlador.swipe.php');
			break;

			case '9':
			//chat
			include('controladores/controlador.chat.php');
			break;

			case '10':
			//Panel de chats
			include('controladores/controlador.inbox.php');
			break;

			case 'default':
			
			break;

		}
	}
	else{
		//Aquí se incluyen todos los controladores del index.
		include('controladores/controlador.home.php');
	}

	?>
</head>

<body>
    <?php

if(isset($_GET['id'])){
	
}

elseif(isset($_GET['page'])){

	switch($_GET['page']){

		case '1':
		//vista del dashboard
		include('vistas/modulos/logScreen.php');
		break;

		case '2':
		//vista del calendario
		include('vistas/modulos/reservar.php');
		break;

		case '3':
		//vista de las bitacoras
		include('vistas/modulos/promos.php');
		break;

		case '4':
		//vista de evaluaciones
		include('vistas/modulos/login.php');
		break;

		case '5':
		//vista de documentos
		include('vistas/modulos/register.php');
		break;

		case '6':
		//vista de informacion
		include('vistas/modulos/qr.php');
		break;

		case '7':
		//vista de administrar
		include('vistas/modulos/perfil.php');
		break;

		case '8':
		//vista de configuracion
		include('vistas/modulos/swipe.php');
		break;

		case '9':
		//chat
		include('vistas/modulos.chat.php');
		break;
		case '10':
		//Panel de chats
		include('vistas/modulos.inbox.php');
		break;


	}
}
else{
	include('vistas/modulos/home.php');
	

}




?>

</body>

</html>