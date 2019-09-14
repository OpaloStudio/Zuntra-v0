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
var data = new FormData();
var picCochina;
var numPic;
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

    $(".scrollZone").niceScroll({
  cursorcolor:"#DEC9A1",
  cursorwidth:"16px",
  horizrailenabled: true,
});

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
      var output = document.getElementById('cuadro1');
      output.src = dataURL;
      console.log(dataURL);

      picCochina = $("#customFile1").prop("files")[0];
      numPic = 1
      dirtyPics(picCochina);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile2 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('cuadro2');
      output.src = dataURL;
      console.log(dataURL);

      picCochina = $("#customFile2").prop("files")[0];
      numPic = 2
      dirtyPics(picCochina);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile3 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('cuadro3');
      output.src = dataURL;
      console.log(dataURL);

      picCochina = $("#customFile3").prop("files")[0];
      numPic = 3
      dirtyPics(picCochina);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile4 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('cuadro4');
      output.src = dataURL;
      console.log(dataURL);

      picCochina = $("#customFile4").prop("files")[0];
      numPic = 4
      dirtyPics(picCochina);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile5 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('cuadro5');
      output.src = dataURL;
      console.log(dataURL);

      picCochina = $("#customFile5").prop("files")[0];
      numPic = 5
      dirtyPics(picCochina);
    };
    reader.readAsDataURL(input.files[0]);
  };

function dirtyPics(){
  var info = new FormData();
  info.append("picNasty", picCochina);
  info.append("numPic", numPic);
  info.append("option", 2);

  console.log(picCochina);
  console.log(numPic);
  console.log(info);

  $.ajax({
      url: "modelos/modelo.chat.php",
      type: "POST",
      dataType: "script",
      cache: false,
      contentType: false,
      processData: false,
      data: info, 
      success: function(msg) {
          console.log(msg);
          
      }
  });

}

</script>