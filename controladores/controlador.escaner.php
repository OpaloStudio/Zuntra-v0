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
<script type="text/javascript" src="vistas/js/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-range/4.0.2/moment-range.js"></script>
<script>

    window['moment-range'].extendMoment(moment);
    var filtrado = false;
    var sesion = <?php echo $idsesion; ?>;
    var tipoUser = <?php echo $tipoUser; ?>;
    var hoy = new Date();
    var dia;
    var mes;
    var ano;
    var horas;
    var minutos;

    var dia1;
    var dia2;
    var nuevoDia;
    var nuevoDia2;
    var nuevoMes;
    var nuevoMes2;



    $(document).ready(function () {

      if(sesion != 0){
          console.log("Sesión Iniciada");

          if(tipoUser == 7){
            console.log("Cadenero");
        
          } else{
            alert("No tienes acceso a esta sección");
            var linkSwipe = "?page=13";
            window.location.href = linkSwipe;
          }
      
      } else{
          console.log("Por Favor Inicia Sesión");
          var linkSwipe = "?page=1&log=escaner";
          window.location.href = linkSwipe;
      }

      dia = hoy.getDate();
      mes = hoy.getMonth()+1;
      ano = hoy.getFullYear();
      horas = hoy.getHours();
      minutos = hoy.getMinutes();
      

      console.log("Día: "+dia);
      console.log("Mes: "+mes);
      console.log("Año: "+ano);
      console.log("horas: "+horas);
      console.log("Minutos: "+minutos);

      var now = new Date(ano, mes, dia, 23, 30);
      
      var inicioGeneral = new Date(ano, mes, dia, 21, 30);
      var finD1 = new Date(ano, mes, dia, 23, 59);

      var inicioD2 = new Date(ano, mes, dia+1, 0, 0);
      var finGeneral = new Date(ano, mes, dia+1, 2, 59);

      console.log("Hoy " + now);
      console.log("Inicio General " + inicioGeneral);
      console.log("Fin General " + finGeneral);
      console.log("Fin Día 1 " + finD1);
      console.log("Inicio Día 2 " + inicioD2);

      var rangoGeneral  = moment().range(inicioGeneral, finGeneral);

      var rangoD1  = moment().range(inicioGeneral, finD1);
      var rangoD2  = moment().range(inicioD2, finGeneral);


      if(rangoGeneral.contains(now) == true){
        console.log("Es hora de escaneo de pulseras");
        if(rangoD1.contains(now) == true){
          console.log("Hoy es día 1");

          dia1 = formatDate(now);
          dia2 = formatDate2(now);
          
          console.log("Día 1 " + dia1);
          console.log("Día 2 " + dia2);
        }else{
          console.log("Hoy es día 2");
    
          dia1 = formatDate3(now);
          dia2 = formatDate(now);
          
          console.log("Día 1 " + dia1);
          console.log("Día 2 " + dia2);
        }
      }else{
        console.log("No es hora de escaneo de pulseras");
        
      }

      function formatDate(date) {
          var d = new Date(date),
              month = '' + d.getMonth(),
              day = '' + d.getDate(),
              year = d.getFullYear();

          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;

          return [year, month, day].join('-');
      }

      function formatDate2(date) {
          var d = new Date(date),
              month = '' + d.getMonth(),
              day = '' + (d.getDate()+1),
              year = d.getFullYear();

          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;

          return [year, month, day].join('-');
      }
      function formatDate3(date) {
          var d = new Date(date),
              month = '' + d.getMonth(),
              day = '' + (d.getDate()-1),
              year = d.getFullYear();

          if (month.length < 2) 
              month = '0' + month;
          if (day.length < 2) 
              day = '0' + day;

          return [year, month, day].join('-');
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
            console.log(dia1);
            console.log(dia2);
            option = 1;
  
            $.ajax({
              url: "modelos/modelo.escaner.php",
              type: "POST",
              data: ({
                  option:option,
                  dia1:dia1,
                  dia2:dia2
              }),
              success: function(msg) {
                console.log(msg);
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
                  option:option,
                  dia1:dia1,
                  dia2:dia2
              }),
              success: function(msg) {
                console.log(msg);
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

    function logout(){
    $.ajax({
        url: "modelos/modelo.cerrarSesion.php",
        type: "POST",
        success: function(msg) {
            var nuevoLink = "?page=13";
            window.location.href = nuevoLink;
            	
        },
        dataType: "json"
    });
}

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
