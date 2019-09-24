<div class="contenedorFormulario reservarBack">
<nav class="navbar fixed-top  ">
    <div class="iconos">
      <a href="?page=13"> <i class="fas fa-arrow-left colorcin"></i></a>
      <h1 class=" divTitutlo text-center"></h1>
    </div>
  </nav>
<div class="dudas negro">Dudas ¿?</div>
  <form class="formReservar">
  <div class="form-group">
      <label class="negro" for="exampleFormControlSelect1">¿Con quién quieres reservar?</label>
      <select class="form-control inputsClaros" id="selectorRP">
      <option selected>-Elige a alguien-</option>
        <option value='0'>Nadie</option>
        <option value='1'>Juanito</option>
        <option value='2'>Lola</option>
      </select>
    </div>
    <div class="form-group">
      <label class="negro" for="exampleFormControlSelect1">Tipo de Reservación</label>
      <select class="form-control inputsClaros" id="tipoReserva">
      <option selected value = '0'>-Elige el tipo de reservación-</option>
        <option value = '1'>Reservación de cumpleaños</option>
        <option value = '2'>Reservación Simple</option>
        <option value = '3'>Reservación Grupo</option>
      </select>
    </div>

    <div class="form-group" id="nombreDiv">
      <label class="negro" for="nombre">Nombre</label>
      <input type="text" class="form-control inputsClaros" id="nombreReservacion">
    </div>

    <div class="form-group" id="telefonoDiv">
      <label class="negro" for="telefonoReservacion">Teléfono</label>
      <input type="text" class="form-control inputsClaros" id="telefonoReservacion">
    </div>

    <div class="form-group">
    <label class="negro" >Fecha</label>
      <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
        <input type="text" id = 'fechaReservacion'class="form-control datetimepicker-input inputsClaros" data-target="#datetimepicker1" />
        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="negro" for="numero">Número de Personas</label>
      <input type="number" class="form-control inputsClaros" id="personasReservacion">
    </div>
    <div class="zonaBtnReservar">
      <button type="button" class="btn btnReservar" onclick='generarReservacion()'>Reservar</button>
    </div>
    
    <br><br>

    <dl class="listaReservar negro">
  <dd>-Todas las reservaciones vencen a las 11:30pm</dd>
  <dd>-Aplican restricciones</dd>
  <dd>-Consulta todas tus dudas enviándonos un mensaje privado</dd>
  <dd>-No valida en eventos especiales</dd> 
  </dl>

  </form>
  <div id="idQR" style="display: none;"></div>
</div>