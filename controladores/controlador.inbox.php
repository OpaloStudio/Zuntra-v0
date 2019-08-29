<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    echo $idsesion;
    
}else{
    $idsesion = '0';
    echo $idsesion;
}

?>
<script>
var sesion = <?php echo $idsesion; ?>;
console.log(sesion);

$(document).ready(function () {
    console.log(sesion);

    if(sesion != 0){
        console.log("Sesión Iniciada");

    } else{
        console.log("Por Favor Inicia Sesión");
        var linkSwipe = "?page=1&log=inbox";
        window.location.href = linkSwipe;
    }

});
function cambiar(){
    window.location.href = '?page=9';

}
</script>