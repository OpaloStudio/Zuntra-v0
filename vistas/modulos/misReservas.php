<div class="contenedorInbox">
  <nav class="navbar fixed-top  navReservas">
    <div class="iconosReservas">
      <a href="?page=17"> <i class="fas fa-arrow-left" id="flechaReservas"></i></a>
      <button type="button" class="btn btnDudas dorado" data-toggle="modal" data-target="#modalDudas">¿Dudas?</button>
      

      
    </div>
    
  </nav>

  <div class="zonaReservaciones" >
  <h2 class="dorado text-center moverAbajo">Mis Reservaciones</h2><br>

  <h3 class="dorado text-center ">Mi Reserva</h3>
  <div class="miReserva" id="reservaMia">
  

  </div>
<br><br>
  <h3 class="dorado text-center ">Mis invitaciones</h3>
  <div class="misInvitaciones" id="invitMias">
  </div>
  <br>
    

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
      <label class="negro" for="tituloDuda">Título</label>
      <input type="text" class="form-control inputsClaros" id="tituloDuda">
    </div>
            <div class="form-group">
              <label class="negro" for="duda">Duda</label>
              <textarea class="form-control razon" id="duda" rows="5"></textarea>
            </div>
        </div>
        <div class="divSubmit">
          <button type="button" class="btn btnComentarios" id="btnEnviarDuda" onclick='sendDudas()'>Enviar </button>
        </div>
        </form>
      </div>
     
    </div>
  </div>
</div>