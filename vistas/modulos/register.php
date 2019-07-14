<div class="contenedorConfiguracion">
  <form>
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre">
    </div>
    <div class="form-group">
      <label for="telefono">Teléfono</label>
      <input type="number" class="form-control" id="telefono">
    </div>
    <div class="form-group">
      <label for="mail">Email</label>
      <input type="email" class="form-control" id="mail">
    </div>
    <div class="form-group">
      <label>Cumpleaños</label>
      <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
        <input type="text" id="cumpleaños" class="form-control datetimepicker-input" data-target="#datetimepicker4" />
        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" class="form-control" id="password">
    </div>
    <div class="form-group">
      <label for="password2">Repetir Contraseña</label>
      <input type="password" class="form-control" id="password2">
    </div>
    <button type="submit" class="btn btn-primary" id="botonRegistrar" onclick="registrar()" >Registrarse</button>



  </form>

</div>