<?php
session_start();
$conexion = mysqli_connect("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
if ($conexion->connect_error) {
  die("La conexion falló: " . $conexion->connect_error);
}

$sesion = $_POST['sesion'];
$option = $_POST['option'];
$like	= $_POST['like'];
$status = '999';


switch($option){
	case '1':
		$sql = "SELECT * FROM usuarios WHERE NOT idUser='$sesion'";
		$sql2 = "SELECT idBloqueado FROM bloqueos WHERE idBloqueador='$sesion'";

		$result = $conexion->query($sql);
		$result2 = $conexion->query($sql2);

		$row_cnt = $result->num_rows;
		$row_cnt2 = $result2->num_rows;
		$final = array();

		while($row = mysqli_fetch_array($result)){
			array_push($final, $row);
		}
		while($row2 = mysqli_fetch_array($result2)){
			array_push($final, $row2);
		}

		if(sizeof($final) == 0){
			$final = false;
		}

		echo json_encode($final);
	break;

	case '2':
		$sql = "SELECT idSala FROM salaChat WHERE usuario1='$sesion' AND usuario2='$like'";
		$result = $conexion->query($sql);

		while($row = mysqli_fetch_array($result)){
			$lista1 = $row[0];
		}

		if($lista1 == null){
			//Quiere decir que no hay salas con donde el usuario 1 sea el que dio like
			//por lo que se revisa si hay una sala donde sea usuario 2

			$sql2 = "SELECT idSala FROM salaChat WHERE usuario1='$like' AND usuario2='$sesion'";
			$result2 = $conexion->query($sql2);

			while($row = mysqli_fetch_array($result2)){
				$lista2 = $row[0];
			}

			if($lista2 == null){
				//No hay sala con estos usuarios por lo tanto se crea

				$sql3 = "INSERT INTO salaChat (usuario1, usuario2) VALUES ('$sesion', '$like')";

				if($conexion->query($sql3)){

					//Sala creada
					$sql4 = "SELECT idSala FROM salaChat WHERE usuario1='$sesion' AND usuario2='$like'";

					$result4 = $conexion->query($sql4);

					while($row = mysqli_fetch_array($result4)){
						$lista3 = $row[0];
					}

					if($lista3 == null){
						$status = 9999999998;//Error al crear sala
					} else {
						$status = $lista3;
					}

				} else{
					$status = 9999999997;//Error al crear sala
				}

			} else {
				//Si hay sala donde el usuario2 sea el que dio like
				$status = $lista2;
			}

		} else {
			//Si hay sala donde el usuario1 sea el que dio like

			$status = $lista1;
		}

		echo $status;

	break;
}


?>