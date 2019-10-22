<div class="container-fluid ">
<nav class="navbar fixed-top navbar-dark navSwipe" style="background-color: rgb(33, 33, 33,0.41);">
      <div class="iconos">
      <a href="?page=13"><i class="fas fa-arrow-left"></i></a>
      <a href="?page=7"> <i class="fas fa-user-circle"></i></a>
      <a href="?page=10"><i class="fas fa-comments"></i></a>
      <!--<img class="logoSwipe" src="vistas/img/otros/logoBlanco.png">-->
    </div>


    <button class="btn btnPuntos " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false">
      <i class="fas fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
    <button type="button" class="btn btnModal center"  onclick="irLogin()">Iniciar Sesión</button>
      <button type="button" class="btn btnModal center" data-toggle="modal" data-target="#exampleModal">Comentarios</button><br>
      <button type="button" class="btn btnModal center"  onclick="logout()">Cerrar Sesión</button>

    </div>


  </nav>
  <div class="row">
    <div class="co-12 slidePromo" >
    <div class="divVideo">
    <img class="logoLog" src="vistas/img/otros/logoBlanco.png">
    <div class="btnsHome">
    <button class="btnOscuro btnCustom menosRedondo" id="margini" onclick="irPromos()">&nbsp;&nbsp;&nbsp;Promos&nbsp;&nbsp;&nbsp;</button>
    <button class="btnOscuro btnCustom menosRedondo"  onclick="irEventos()">&nbsp;&nbsp;&nbsp;Eventos&nbsp;&nbsp;&nbsp;</button>
    </div>
  </div>
    
    <video  autoplay="autoplay" loop="loop" id="video_background" preload="auto" muted>
  <source src="vistas/img/otros/zuntra.mp4" type="video/mp4" />
</video>

</div>
  </div>

  <div class="row">
      <div class="col-6 slideReservar">
      <a id="linkReservar" >
      <h4 class="tituloHome">Reserva tu lugar y no te pierdas de la fiesta</h4>
      <p class="pHome">Reservaciones para 
Viernes, Sábado y Domingo. 
Valida solo hasta las 11:30 pm </p>
<i class="fas fa-arrow-circle-right"></i></a>
  </div>
      <div class="col-6 slideSwipe">
      <a id="linkSwipe">
      <h4 class="tituloHome">Conoce gente nueva en Zuntra</h4>
      <p class="pHome">El modo búsqueda 
solo funciona dentro del 
establecimiento </p>
<i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!--<button type="button" id="btnAdd" class="btn btnOscuro" >Añadir</button>-->
    <div class="divAcceso">
      <a href="?page=14"><img class="miniLogo" src="vistas/img/favicon/favicon.png"></a>
    </div>
    <!-- Modal -->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega la App de Zuntra a tu pantalla de inicio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     Te invitamos a instalar la App para una mejor experiencia, <br>(No pesa nada). 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Luego</button>
        <button type="button" id="btnAdd" class="btn btnOscuro" >Añadir</button>
      </div>
    </div>
  </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade elModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-tittle dorado">Comentarios</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="content">
  
</div>
        
        <div class="form-group">
    <label for="razon">Otra razón o queja</label>
    <textarea class="form-control razon" id="razon" rows="3"></textarea>
  </div>
      </div>
      </form>
      <div class="divSubmit">
        <button type="button" class="btn btnBloquear" onclick='bloqueo()' >Bloquear</button>
      </div>
    </div>
  </div>
</div>