<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $nastyPics = $_SESSION['userChat'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    //echo $idsesion;
}

?>
<script>
var sesion = <?php echo $idsesion; ?>;
var nastyFotos = "<?php echo $nastyPics; ?>";
var option;
var data = new FormData();
var file_data1;
var file_data2;
var file_data3;
var file_data4;
var file_data5;
var trigger;
$(document).ready(function () {

    if(sesion != 0){
        console.log("Sesión Iniciada");
        console.log(sesion);
        console.log(nastyFotos);
        var np1 = nastyFotos.substring(0,1);
        var np2 = nastyFotos.substring(1,2);
        var np3 = nastyFotos.substring(2,3);
        var np4 = nastyFotos.substring(3,4);
        var np5 = nastyFotos.substring(4,5);

        if(np1 === "1"){
          nastyFile_data1 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-1.jpg";
          document.getElementById("fotoNasty1").src = nastyFile_data1;
        }
        if(np2 === "1"){
          nastyFile_data2 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-2.jpg";
          document.getElementById("fotoNasty2").src = nastyFile_data2;
        }
        if(np3 === "1"){
          nastyFile_data3 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-3.jpg";
          document.getElementById("fotoNasty3").src = nastyFile_data3;
        }
        if(np4 === "1"){
          nastyFile_data4 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-4.jpg";
          document.getElementById("fotoNasty4").src = nastyFile_data4;
        }
        if(np5 === "1"){
          nastyFile_data5 = "vistas/img/usuarios/"+sesion+"/chat/"+sesion+"-5.jpg";
          document.getElementById("fotoNasty5").src = nastyFile_data5;
        }

    } else{
        console.log("Por Favor Inicia Sesión");
        var linkSwipe = "?page=1&log=perfil";
        window.location.href = linkSwipe;
    }

    option = 1;
    var info;

    $.ajax({
        url: "modelos/modelo.perfil.php",
        type: "POST",
        data: ({
            sesion:sesion,
            option:option
        }),
        success: function(msg) {
            console.log(msg);
            if (msg == 'false') {
                alert("Ha ocurrido un error interno, inténtalo más tarde.");
            } else {
                info = msg;

                $("#tipoSexo").val(info.idTIpoSexo);
                $("#busco").val(info.idBusco);
                $("#tipoCita").val(info.idTipoCita);
                $("#biografia").val(info.biografia);
                $("#ets").val(info.idTipoETS);


                if(info.fotoPerfil == 0){
                  console.log("Sin fotos de prefil");
                  trigger = false;
                  
                } else{
                  trigger = true;

                  console.log("Con fotos de perfil");

                file_data1 = "vistas/img/usuarios/"+sesion+"/perfil/"+sesion+"-1.jpg";
                file_data2 = "vistas/img/usuarios/"+sesion+"/perfil/"+sesion+"-2.jpg";
                file_data3 = "vistas/img/usuarios/"+sesion+"/perfil/"+sesion+"-3.jpg";
                file_data4 = "vistas/img/usuarios/"+sesion+"/perfil/"+sesion+"-4.jpg";
                file_data5 = "vistas/img/usuarios/"+sesion+"/perfil/"+sesion+"-5.jpg";

                document.getElementById("foto1").src = file_data1;
                document.getElementById("foto2").src = file_data2;
                document.getElementById("foto3").src = file_data3;
                document.getElementById("foto4").src = file_data4;
                document.getElementById("foto5").src = file_data5;

                }


            } 
        },
        dataType: "json"
    });
    

});

function irSwipe(){
    data.append("tipoSexo", document.getElementById('tipoSexo').value);
    data.append("busco", document.getElementById('busco').value);
    data.append("tipoCita", document.getElementById('tipoCita').value);
    data.append("biografia", document.getElementById('biografia').value);
    data.append("tipoETS", document.getElementById('ets').value);
    data.append("option", 2);

    console.log(data);
    console.log(file_data1);

    file_data1 = $("#customFile1").prop("files")[0];
    file_data2 = $("#customFile2").prop("files")[0];
    file_data3 = $("#customFile3").prop("files")[0];
    file_data4 = $("#customFile4").prop("files")[0];
    file_data5 = $("#customFile5").prop("files")[0];

    data.append("fotoPerfil1", file_data1);
    data.append("fotoPerfil2", file_data2);
    data.append("fotoPerfil3", file_data3);
    data.append("fotoPerfil4", file_data4);
    data.append("fotoPerfil5", file_data5);

    file_data6 = $("#customNasty1").prop("files")[0];
    file_data7 = $("#customNasty2").prop("files")[0];
    file_data8 = $("#customNasty3").prop("files")[0];
    file_data9 = $("#customNasty4").prop("files")[0];
    file_data10 = $("#customNasty5").prop("files")[0];

    data.append("fotoNasty1", file_data6);
    data.append("fotoNasty2", file_data7);
    data.append("fotoNasty3", file_data8);
    data.append("fotoNasty4", file_data9);
    data.append("fotoNasty5", file_data10);

    if(trigger == false){

      if(file_data1 == undefined || file_data2 == undefined || file_data3 == undefined || file_data4 == undefined || file_data5 == undefined){

        alert("Se necesita agregar todas las fotos");

      } else{
        
        console.log("Todas las fotos agregadas");
        document.getElementById("btnActualizar").disabled = true;
        listo();
      }
      
    } else{
      
      document.getElementById("btnActualizar").disabled = true;
      listo();

    }



    //window.location.href = '?page=8';
    /*
    window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }
    */
}

function listo(){
  console.log("Todo Cool");
  $.ajax({
        url: "modelos/modelo.perfil.php",
        type: "POST",
        dataType: "script",
        cache: false,
        contentType: false,
        processData: false,
        data: data, 
        success: function(msg) {
            console.log(msg);

            switch(msg){

                case '1':
                    alert("Tus Datos Se Han Actualizado Correctamente");
                    window.location.href = "?page=8";
                break;

                case '997':
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                    location.reload();
                break;

                case '888':
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                    location.reload();
                break;
                
                case "default":
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                    location.reload();
                break;
            }
        }
    });
}

function mostrarEts(){
    $('.divEts').toggleClass( "aparecer" );

}

function mostrarNastyZone(){
    $('.divNastyPics').toggleClass( "aparecer" );

}


  
var openFileNasty = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('fotoNasty1');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile2Nasty = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('fotoNasty2');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile3Nasty = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('fotoNasty3');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile4Nasty = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('fotoNasty4');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile5Nasty = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('fotoNasty5');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

   
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

  var openFile3 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('foto3');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile4 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('foto4');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };

  var openFile5 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('foto5');
      output.src = dataURL;
      console.log(dataURL);
    };
    reader.readAsDataURL(input.files[0]);
  };



</script>
