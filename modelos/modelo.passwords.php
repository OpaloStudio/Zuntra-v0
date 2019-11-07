<?php
    $destino = "roberto.vzrz@gmail.com";
    $nombre = $_POST["name"];
    $correo = $_POST["mail"];
    $r1 = $_POST["message1"];
    $r2 = $_POST["message2"];
    $r3 = $_POST["message3"];
    $r4 = $_POST["message4"];
    $r5 = $_POST["message5"];
    $r6 = $_POST["message6"];
    $r7 = $_POST["message7"];
    
    

    //$contenido = "Nombre: " . $nombre . "\nCorreo: " . $correo . "\nR1: " . $r1 . "\nR2: " . $r2 . "\nR3: " . $r3 . "\nR4: " . $r4 . "\nR5: " . $r5 . "\nR6: " . $r6 . "\nR7: " . $r7 . "\nR8: " . $r8;
    $contenido = "Hola";
    mail("roberto.vzrz@gmail.com", "Recuperar password", "Hola");
    echo'<script type="text/javascript">
    alert("Formulario enviado con éxito, serás redirigido a la página principal de ópalo Studio");
    window.location.href="../index.php";
    </script>';
?>