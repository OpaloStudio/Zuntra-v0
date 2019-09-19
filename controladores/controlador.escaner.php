<?php

if(isset($_SESSION['loggedin'])){
    $idsesion = $_SESSION['userId'];
    $tipoUser = $_SESSION['userType'];
    //echo $idsesion;
    
}else{
    $idsesion = '0';
    $tipoUser = '0';
    //echo $idsesion;
}

?>
<script type="text/javascript" src="vistas/js/script.js"></script>
<script>
    var filtrado = false;
    var sesion = <?php echo $idsesion; ?>;
    var tipoUser = <?php echo $tipoUser; ?>;

    $(document).ready(function () {

      if(sesion != 0){
          console.log("Sesión Iniciada");
      
      } else{
          console.log("Por Favor Inicia Sesión");
          var linkSwipe = "?page=1&log=escaner";
          window.location.href = linkSwipe;
      }

      if(tipoUser == 7){
        console.log("Cadenero");
      
      } else{
          alert("No tienes acceso a esta sección");
          var linkSwipe = "?page=13";
          window.location.href = linkSwipe;
      }

    });

    document.addEventListener("DOMContentLoaded", event => {
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

      Instascan.Camera.getCameras().then(cameras => {
        scanner.camera = cameras[cameras.length - 1];
        scanner.start();
      }).catch(e => console.error(e));
  
      scanner.addListener('scan', content => {
        var option;
        console.log(content);
        if(filtrado == false){

          if (content == "cover") {
            
            option = 1;
  
            $.ajax({
              url: "modelos/modelo.escaner.php",
              type: "POST",
              data: ({
                  option:option
              }),
              success: function(msg) {
                  switch(msg){
  
                      case 999:
                          console.log('Error al procesar');
                      break;
  
                      case 1:
                        console.log("Esto es un cover");
                      break;
                  }
  
              },
              dataType: "json"
            });
  
          } else if(content == "cortesia") {
            option = 2;
  
            $.ajax({
              url: "modelos/modelo.escaner.php",
              type: "POST",
              data: ({
                  option:option
              }),
              success: function(msg) {
                  switch(msg){
  
                      case 998:
                          console.log('Error al procesar');
                      break;
  
                      case 1:
                        console.log("Esto es una cortesia");
                      break;
                  }
  
              },
              dataType: "json"
            });
  
          } else {
  
          option = 3;
          var name = "Nombre: ";
          var code = "Código: ";
  
          var Z = content.slice(content.indexOf(name) + name.length);
          var codigo = content.slice(content.indexOf(code) + code.length);
  
          var nombre = Z.slice(0,Z.indexOf("Código")-1);
  
          console.log(nombre);
          console.log(codigo);
  
          console.log(nombre.length);
          console.log(codigo.length);
  
          
          $.ajax({
              url: "modelos/modelo.escaner.php",
              type: "POST",
              data: ({
                  nombre:nombre,
                  codigo:codigo,
                  option:option
              }),
              success: function(msg) {
                  console.log(msg);
                  console.log(typeof msg);
  
                  if(typeof msg == "object"){
  
                    $("#aprobada").modal("show");
                    $("#nombreQR").text("Nombre: "+msg.nombre);
  
                  }else if(typeof msg == "string"){
  
                    console.log("string");
                    
                    switch(msg){
    
                      case "1":
                        $("#aprobada").modal("show");
                      break;
    
                      case "999":
                        $("#rechazada").modal("show");
                      break;
    
                      case "998":
                        $("#rechazada").modal("show");
                      break;
    
                      case "997":
                        $("#rechazada").modal("show");
                      break;
    
                      case "996":
                        $("#rechazada").modal("show");
                      break;
                    }
                  }
  
  
              },
              dataType: "json"
          });
          
          }

        } else{
          $("#rechazada").modal("show");
        }
      });
  
    });

  function filtro(){
    if(filtrado == false){
      filtrado = true;
      console.log("Filtro de emergencia on");
    }else{
      filtrado = false;
      console.log("Filtro de emergencia off");

    }
  }
</script>