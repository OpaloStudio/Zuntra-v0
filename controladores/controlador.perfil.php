<?php

$tipo = $_GET['tipo'];

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    //echo $idsesion;
}

?>
<script>
var sesion = <?php echo $idsesion; ?>;
var option;
$(document).ready(function () {

    if(sesion != 0){
        console.log("Sesión Iniciada");
        console.log(sesion);

    } else{
        console.log("Por Favor Inicia Sesión");
        var linkSwipe = "?page=1&log=perfil";
        window.location.href = linkSwipe;
    }

    $("#customFile1").fileinput({
        showUpload: false,
    });
    $("#customFile2").fileinput({
        showUpload: false,
    });
    $("#customFile3").fileinput({
        showUpload: false,
    });
    $("#customFile4").fileinput({
        showUpload: false,
    });
    $("#customFile5").fileinput({
        showUpload: false,
    });

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
          

            } 
        },
        dataType: "json"
    });
    

});

function irSwipe(){

    var data = new FormData();

    data.append("tipoSexo", document.getElementById('tipoSexo').value);
    data.append("busco", document.getElementById('busco').value);
    data.append("tipoCita", document.getElementById('tipoCita').value);
    data.append("biografia", document.getElementById('biografia').value);
    data.append("tipoETS", document.getElementById('ets').value);
    data.append("option", 2);

    console.log(data);

    var file_data1 = $("#customFile1").prop("files")[0];
    var file_data2 = $("#customFile2").prop("files")[0];
    var file_data3 = $("#customFile3").prop("files")[0];
    var file_data4 = $("#customFile4").prop("files")[0];
    var file_data5 = $("#customFile5").prop("files")[0];

    data.append("fotoPerfil1", file_data1);
    data.append("fotoPerfil2", file_data2);
    data.append("fotoPerfil3", file_data3);
    data.append("fotoPerfil4", file_data4);
    data.append("fotoPerfil5", file_data5);

    document.getElementById("btnActualizar").disabled = true;

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

                case 1:
                    alert("Tus Datos Se Han Actualizado Correctamente");
                break;

                case 997:
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                break;
                
                case "default":
                    alert("Ha ocurrido un error interno, inténtalo más tarde.");
                    document.getElementById("botonRbtnActualizaregistrar").disabled = false;
                break;
            }
        }
    });
    

    //window.location.href = '?page=8';
    /*
    window.onbeforeunload = function() {
        return "Dude, are you sure you want to leave? Think of the kittens!";
    }
    */
}

function mostrarEts(){
    $('.divEts').toggleClass( "aparecer" );

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
