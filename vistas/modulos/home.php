<div class="container-fluid ">
  <nav class="navbar fixed-top navbar-dark navSwipe" style="background-color: rgb(0, 0, 0,0);">
    


    <button class="btn btnPuntos " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false">
      <i class="fas fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      <button type="button" class="btn btnModal center" onclick="irLogin()" id="homeIniciarSesion">Iniciar Sesión</button>
      <button type="button" class="btn btnModal center" data-toggle="modal" data-target="#exampleModal" id="homeComentarios" hidden>Comentarios</button><br>
      <button type="button" class="btn btnModal center" onclick="logout()" id="homeCerrarSesion" hidden>Cerrar Sesión</button>
    </div>


  </nav>
  <div class="row">
    <div class="co-12 slidePromo">
      <div class="divVideo">
        <img class="logoLog" src="vistas/img/otros/logoBlanco.png">
        <div class="btnsHome">
          <button class="btnOscuro btnCustom menosRedondo" id="margini"
            onclick="irPromos()">&nbsp;&nbsp;&nbsp;Promos&nbsp;&nbsp;&nbsp;</button>
          <button class="btnOscuro btnCustom menosRedondo"
            onclick="irEventos()">&nbsp;&nbsp;&nbsp;Eventos&nbsp;&nbsp;&nbsp;</button>
        </div>
      </div>

      <video autoplay="autoplay" loop="loop" id="video_background" preload="auto" muted>
        <source src="vistas/img/otros/zuntra.mp4" type="video/mp4" />
      </video>

    </div>
  </div>

  <div class="row">
    <div iv class="col-6 slideReservar">
      <a id="linkReservar">
        <h4 class="tituloHome" id="tituloReserva">Reserva tu lugar y no te pierdas de la fiesta</h4>
        <p class="pHome" id="textoReserva">Reservaciones para
          Viernes, Sábado y Domingo.
          Valida solo hasta las 11:30 pm </p>
        <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
    <div class="col-6  slideSwipe proxSwipe"> 
    <div class="centrarCosito">
      <div class="lds-grid"><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>
    </div>
        <h4 class="tituloHome dorado text-center" id="tituloSwipe">Espera la actualización</h4>
        <p class="pHome dorado text-center" id="textoSwipe">Te vamos a sorprender...</p>
       
    </div>
    <!--<div class="col-6 slideSwipe">
      <a id="linkSwipe">
        <h4 class="tituloHome" id="tituloSwipe">Conoce gente nueva en Zuntra</h4>
        <p class="pHome" id="textoSwipe">El modo búsqueda
          solo funciona dentro del
          establecimiento </p>
        <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>-->
  </div>
  <!--<button type="button" id="btnAdd" class="btn btnOscuro" >Añadir</button>-->
  <div class="divAcceso">
    <a href="?page=14"><img class="miniLogo" src="vistas/img/favicon/favicon.png"></a>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
          <button type="button" id="btnAdd" class="btn btnOscuro">Añadir</button>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Modal -->
<div class="modal fade elModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-tittle dorado">Comentarios</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="content">
          <form>
            <div class="form-group">
              <label class="dorado" for="tituloCom">Título</label>
              <textarea class="form-control razon" id="tituloCom" rows="1"></textarea>
            </div>
            <div class="form-group">
              <label class="dorado" for="comentario">Comentario</label>
              <textarea class="form-control razon" id="comentario" rows="5"></textarea>
            </div>
        </div>
        <div class="divSubmit">
          <button type="button" class="btn btnComentarios" id="btnEnviarComent" onclick='sendComentarios()'>Enviar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>