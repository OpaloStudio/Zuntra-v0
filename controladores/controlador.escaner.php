
<script type="text/javascript" src="vistas/js/script.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", event => {
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });

      Instascan.Camera.getCameras().then(cameras => {
        scanner.camera = cameras[cameras.length - 1];
        scanner.start();
      }).catch(e => console.error(e));
  
      scanner.addListener('scan', content => {
        console.log(content);
        //alert(typeof content);
        if(content.includes("Abner") == true){
            //alert("reservacion de abner");
            $("#aprobada").modal("show");
        } else{
            //alert("reservacion inválida");
            $("#rechazada").modal("show");
        }
      });
  
    });
</script>