<div class="contenedorFormulario">
  <form class="formularioLogin">
    <div class="form-group" id="divEmail">
      <label class="blanco" for="emailLogin">Email</label>
      <input type="email" class="form-control inputOscuro" id="emailLogin" onkeyup = "validaLogin()" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input " id="exampleCheck1">
      <label  class="form-check-label blanco" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" id = "buttonLogin" onclick = "login()" class="btn btnOscuro">Submit</button>
    <button type="submit" id = "btnGuest" onclick = "guestLogIn()" class="btn btnOscuro" style="display: none">Submit</button>
    <a href="?page=1" class="btn btn-primary" style="display: none" >atras</a>
  </form>
 
</div>