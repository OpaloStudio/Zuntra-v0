<div class="contenedorFormulario">

  <form>
  <div class="form-group">
      <label for="exampleFormControlSelect1">¿Con quién quieres reservar?</label>
      <select class="form-control inputsClaros" id="exampleFormControlSelect1">
      <option selected>-Elige a alguien-</option>
        <option>Nadie</option>
        <option>Juanito</option>
        <option>Lola</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo de Reservación</label>
      <select class="form-control inputsClaros" id="exampleFormControlSelect1">
      <option selected>-Elige el tipo de reservación-</option>
        <option>Reservación de cumpleaños</option>
        <option>Reservación Simple</option>
        <option>Reservación Grupo</option>
      </select>
    </div>

    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control inputsClaros" id="nombre">
    </div>

    <div class="form-group">
    <label >Fecha y Hora</label>
      <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
        <input type="text" class="form-control datetimepicker-input inputsClaros" data-target="#datetimepicker1" />
        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="numero">Número de Personas</label>
      <input type="number" class="form-control inputsClaros" id="numero">
    </div>
    <button type="submit" class="btn btnReservar">Reservar</button>

  </form>
</div>