<div class="contenedorLogScreen">
  <a href="?page=13">
    <img class="logoLog" src="vistas/img/logo.png">
  </a>
  <button class="btnOscuro"  onclick="irLogin()">Login</button><br><br>
  <button class="btnOscuro"  onclick="irRegistro()">Registro</button><br><br>
  <button class="btnOscuro"  id="btnGuest" style="display: none;" onclick="irGuest()">Sesión de Invitado</button>
  <a class="linkPass" onclick="recoverPass()">¿Olvidaste tu contraseña?</a>
  <label class="blanco labelin text-center" for="emailRecover" >Te enviaremos un correo con las instrucciones para recuperar tu contraseña</label><br>
  <input type="email" class="form-control inputOscuro" id="emailRecover"  aria-describedby="emailHelp" placeholder="Ingresa tu correo" ><br>
  <button type="button" class="btn btnReservar"  id="btnCorreo" onclick='enviarCorreo()'>Enviar </button>  
    
</div>