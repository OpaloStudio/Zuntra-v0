<?php
    if(isset($_POST["opcion"])) {
        switch($_POST["opcion"]) {
            case "1":
                session_start();
                if(isset($_SESSION["idUser"]))
                    echo "1";
                else
                    echo "0";
                break;
        }
    }
 ?> 