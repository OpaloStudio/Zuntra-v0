<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $nastyPics = $_SESSION['userChat'];
    echo $idsesion;
    
}else{
    $idsesion = '0';
    $nastyPics = '99999';
    echo $idsesion;
}

if($_GET['sala'] != 0){
    $sala = $_GET['sala'];
    $user2 = $_GET['chat'];
}else{
  $sala = 0;
  $user2 = 0;
}

?>

<script>

var sesion = <?php echo $idsesion; ?>;
var nastyPics = '<?php echo $nastyPics; ?>';
var user2 = <?php echo $user2; ?>;
var sala = <?php echo $sala; ?>;
var data = new FormData();
var picCochina;
var numPic;
var num;
var set1;
var set2;
var set3;
var set4;
var set5;
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

    console.log(nastyPics);
    set1 = nastyPics.substring(0,1);
    set2 = nastyPics.substring(1,2);
    set3 = nastyPics.substring(2,3);
    set4 = nastyPics.substring(3,4);
    set5 = nastyPics.substring(4,5);

    console.log(set1);
    console.log(set2);
    console.log(set3);
    console.log(set4);
    console.log(set5);

    if(set1 == "1"){

      pic1 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-1.jpg";
      document.getElementById("cuadro1").src = pic1;

    }
    if(set2 == "1"){

      pic2 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-2.jpg";
      document.getElementById("cuadro2").src = pic2;

    }
    if(set3 == "1"){

      pic3 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-3.jpg";
      document.getElementById("cuadro3").src = pic3;

    }
    if(set4 == "1"){

      pic4 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-4.jpg";
      document.getElementById("cuadro4").src = pic4;

    }
    if(set5 == "1"){

      pic5 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-5.jpg";
      document.getElementById("cuadro5").src = pic5;

    }

    cargaMsjs();
  });

function cargaMsjs(){

  option = 1;
  console.log(sala);
  console.log(user2);
  console.log(sesion);

  $.ajax({
    url: "modelos/modelo.chat.php",
    type: "POST",
    data: ({
        sesion:sesion,
        user2:user2,
        sala:sala,
        option:option
    }),
    success: function(msg) {
        console.log(msg);
        console.log(msg.length);
        
        for(var i = 0; i < msg.length; i++){
          console.log(msg[i].idTipoMensaje);
          console.log(msg[i].idUsuario);

          if(msg[i].idTipoMensaje == 1){

            if(msg[i].idUsuario == sesion){
              
              var divYo = document.createElement("DIV");   // Create a <button> element
              divYo.classList.add("mnsjYo");
              document.getElementById("losMsj").appendChild(divYo); 

              var paraMi = document.createElement("P");   // Create a <button> element
              paraMi.classList.add("mensajeYO");
              paraMi.innerHTML = msg[i].mensaje;                   // Insert text
              divYo.appendChild(paraMi); 

            } else if(msg[i].idUsuario == user2){

              var divTu = document.createElement("DIV");   // Create a <button> element
              divTu.classList.add("mnsjOtro");
              document.getElementById("losMsj").appendChild(divTu); 

              var paraTi = document.createElement("P");   // Create a <button> element
              paraTi.classList.add("mensajeEL");
              paraTi.innerHTML = msg[i].mensaje;                   // Insert text
              
              divTu.appendChild(paraTi); 

            }

          }

        }
    },
    dataType: "json"
  });
}

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

function quitarCochinadas(num){

  var info2 = new FormData();
  console.log(num);

  info2.append("option", 3);
  info2.append("num", num);

  $.ajax({
      url: "modelos/modelo.chat.php",
      type: "POST",
      dataType: "script",
      cache: false,
      contentType: false,
      processData: false,
      data: info2, 
      success: function(msg) {
          console.log(msg);

          var defecto = "vistas/img/cuadroCarga.svg";
          var destino = "cuadro"+num;

          document.getElementById(destino).src = defecto;
          
          
      }
  });
  



}

</script>