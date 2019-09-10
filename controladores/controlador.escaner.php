
<script type="text/javascript" src="vistas/js/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", event => {
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

      Instascan.Camera.getCameras().then(cameras => {
        scanner.camera = cameras[cameras.length - 1];
        scanner.start();
      }).catch(e => console.error(e));
  
      scanner.addListener('scan', content => {
        var option;
        console.log(content);
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

                switch(msg){

                  case 1:
                    $("#aprobada").modal("show");
                  break;

                  case 999:
                    $("#rechazada").modal("show");
                  break;

                  case 998:
                    $("#rechazada").modal("show");
                  break;

                  case 997:
                    $("#rechazada").modal("show");
                  break;

                  case 996:
                    $("#rechazada").modal("show");
                  break;
                }

            },
            dataType: "json"
        });
        
        }
      });
  
    });
</script>