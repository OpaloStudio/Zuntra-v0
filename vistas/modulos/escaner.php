<div class="zonaEscaner">

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rechazada">
  Launch demo modal
</button>
<!-- Modal Bueno -->
<div class="modal fade" id="aprobada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <i class="far fa-thumbs-up"></i><br>
      <h5 class="modal-title" id="exampleModalLabel">Reservación Aprobada</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal No-->
<div class="modal fade" id="rechazada" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <i class="fas fa-minus-circle"></i> <br>
      <h5 class="modal-title" id="exampleModalLabel">Reservación inválida/escaneada/expirada</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</div>

<!-- zona de abajo -->
<div class="zonaAbajo">
<button type="submit" class="btn btnRegistro" id="botonRegistrar" onclick="" >Cerrar Sesión</button>
</div>