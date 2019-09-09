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
        var linkSwipe = "?page=1&log=chat";
        window.location.href = linkSwipe;
    }

});

function mostrarCochinadas(){
    $('.imgCochinas').css("display","block");
}

function cerrarCochinadas(){
    $('.imgCochinas').css("display","none");
}


var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('foto1');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile2 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('foto2');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

</script>