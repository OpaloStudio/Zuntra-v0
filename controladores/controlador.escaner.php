
<script type="text/javascript" src="vistas/js/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", event => {
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });

      Instascan.Camera.getCameras().then(cameras => {
        scanner.camera = cameras[cameras.length - 1];
        scanner.start();
      }).catch(e => console.error(e));
  
      scanner.addListener('scan', content => {
        console.log(content);
        if (content == "cover") {
          console.log("Esto es un cover");
        } else if(content == "cortesia") {
          console.log("Esto es una cortesía");
        } else {

        
        var name = "Nombre: ";
        var Phone = "Telefono: ";
        var cuErre = "QR: "

        var Z = content.slice(content.indexOf(name) + name.length);
        var Y = content.slice(content.indexOf(Phone) + Phone.length);
        var X = content.slice(content.indexOf(cuErre) + cuErre.length);

        var nombre = Z.slice(0,Z.indexOf("Telefono")-1);
        var telefono = Y.slice(0,Y.indexOf("Fecha")-1);
        var numPersonasIndividual = X.slice(2,X.indexOf("/")-1);

        var W = X.slice(X.indexOf("/"), X.length);

        var numPersonasTotal = W.slice(W.indexOf("00")+2,W.length);

        $.ajax({
            url: "modelos/modelo.escaner.php",
            type: "POST",
            data: ({
                nombre:nombre,
                telefono:telefono,
                numPersonasIndividual:numPersonasIndividual,
                numPersonasTotal:numPersonasTotal
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