<?php
    if(isset($_POST["usuarios"])) {
        //Conexion con la base de datos
        $conexion = new mysqli("zuntrapopclub.com", "zuntrapo_user", ".Pinshicontra", "zuntrapo_bd");
        if ($conexion->connect_error) {
            die("La conexion falló: " . $conexion->connect_error);
        }
        $conexion->set_charset("utf8"); //Cambiar la codificacion a utf8 para que se haga el parse a JSON

        //Realizacion de la consulta
        $query = "SELECT idUser, nombre, cumpleanos, correo, telefono, tipoSexo, busco, tipoCita FROM usuarios, busco, tipoSexo, tipoCita WHERE usuarios.idTIpoSexo = tipoSexo.idTIpoSexo AND usuarios.idBusco = busco.idBusco AND usuarios.idTipoCita = tipoCita.idTipoCita;";
        $result = $conexion->query($query);
        $rows = array();
        while($row = $result->fetch_assoc())
            $rows[] = $row;

        //Devolver la consulta con un json
        echo json_encode($rows);

        //Cerrar la conexion
        $result->close();
        $conexion->close();
    }
 ?>