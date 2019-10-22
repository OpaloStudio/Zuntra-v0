<div class=" reservarBack">
<nav class="navbar fixed-top  ">
    <div class="iconos">
      <a href="?page=13"> <i class="fas fa-arrow-left colorcin"></i></a>
      <button type="button" class="btn btnDudas dorado dudu" data-toggle="modal" data-target="#modalDudas">¿Dudas?</button>
    </div>
  </nav>
  
  <form class="formReservar">
    <div class="form-group">
      <label class="negro" for="tipoStaff">Cargo de staff</label>
      <select class="form-control inputsClaros" id="tipoStaff" onchange="changeTipoStaff2(this)">
        <option selected disabled>-Elige el cargo de Staff-</option>
        <option>Gerencia</option>
        <option>RP</option>
        <option>Mesero</option>
        <option>Cadenero</option>
        <option>Capitán</option>
      </select>
    </div>
  <div class="form-group">
      <label class="negro" for="selectorRP">¿Con quién quieres reservar?</label>
      <select class="form-control inputsClaros" id="selectorRP">
        <option selected disabled>-Elige a alguien-</option>
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


<!-- Modal -->
<div class="modal fade" id="modalDudas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title dorado" id="exampleModalLabel">¿Dudas?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="form-group">
      <label class="negro" for="numero">Nombre</label>
      <input type="text" class="form-control inputsClaros" id="nombreDuda">
    </div>
    <div class="form-group">
      <label class="negro" for="numero">Correo</label>
      <input type="mail" class="form-control inputsClaros" id="correoDuda">
    </div>
    <div class="form-group">
      <label class="negro" for="numero">Teléfono</label>
      <input type="number" class="form-control inputsClaros" id="telefonoDuda">
    </div>
            <div class="form-group">
              <label class="negro" for="razon">Duda</label>
              <textarea class="form-control razon" id="razon" rows="5"></textarea>
            </div>
        </div>
        <div class="divSubmit">
          <button type="button" class="btn btnComentarios" onclick='bloqueo()'>Enviar </button>
        </div>
        </form>
      </div>
    
    </div>
  </div>
</div>
