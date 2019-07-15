<div class="contenedorFormulario">
  <form class="formularioLogin">
    <div class="form-group">
      <label for="emailLogin">Email</label>
      <input type="email" class="form-control" id="emailLogin" onkeyup = "validaLogin()" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="passwordLogin">Password</label>
      <input type="password" class="form-control" id="passwordLogin" onkeyup = "validaLogin()" placeholder="Password">
    </div>
    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" id = "buttonLogin" onclick = "login()" class="btn btn-primary">Submit</button>
    <a href="?page=1" class="btn btn-primary">atras</a>
  </form>
 
</div>