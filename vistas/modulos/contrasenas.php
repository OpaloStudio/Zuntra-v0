<?php
  if(!isset($_GET["usuario"]) || !isset($_GET["token"]))
    header("Location: index.php");
 ?>

<div class="contenedorLogScreen">
  <a href="?page=13">
    <img class="logoLog" src="vistas/img/logo.png">
  </a>
  <label class=" blanquito text-center" for="newPassword" >Ingresa tu nueva contraseña</label>
  <input type="password" class="form-control inputOscuro" id="newPassword"  aria-describedby="Ingresa Contraseña" placeholder="Contraseña nueva" ><br>
  <label class="blanquito text-center" for="newPassword2" >Repite tu nueva contraseña</label>
  <input type="password" class="form-control inputOscuro" id="newPassword2"  aria-describedby="Repite Contraseña" placeholder="Repite contraseña" ><br>
  <button type="button" class="btn btnReservar"  id="btnNewPass" onclick='guardarPassword()'>Guardar </button>  
    
</div>