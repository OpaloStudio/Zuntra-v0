<div class="contenedorFormulario">
<nav class="navbar fixed-top navbar-dark navInbox">
    <div class="iconos">
      <a href="?page=1"> <i class="fas fa-arrow-left"></i></a>
      <h1 class=" divTitutlo text-center"></h1>
    </div>
  </nav>
  <form class="formularioLogin">
    <div class="form-group" id="divEmail">
      <label class="blanco" for="emailLogin">Email</label>
      <input type="email" class="form-control inputOscuro" id="emailLogin" onkeyup = "validaLogin()" aria-describedby="emailHelp" placeholder="Enter email">
      
    </div>
    <div class="form-group" id="divPass">
      <label class="blanco" for="passwordLogin">Password</label>
      <input type="password" class="form-control inputOscuro" id="passwordLogin" onkeyup = "validaLogin()" placeholder="Password">
    </div>
    <div class="form-group" id="divNombre" style="display: none">
      <label class="blanco" for="nameGuest">Nombre Invitado</label>
      <input type="text" class="form-control inputOscuro" id="nameGuest" placeholder="Nombre">
    </div>
    <div class="form-group" id="divTelefono" style="display: none">
      <label class="blanco" for="phoneGuest">Telefono Invitado</label>
      <input type="text" class="form-control inputOscuro" id="phoneGuest" placeholder="Telefono">
    </div>
   <br>
    <button type="button" id = "buttonLogin" onclick = "login()" class="btn btnOscuro">Submit</button>
    <button type="button" id = "btnGuest" onclick = "guestLogIn()" class="btn btnOscuro" style="display: none">Submit Invitado</button>
    <a href="?page=1" class="btn btn-primary" style="display: none" >atras</a>
  </form>
 
</div>