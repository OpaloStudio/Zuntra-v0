<div class="contenedorQr">
<div class="divEditar"><i class="far fa-edit"></i></div><br><br>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  </ol>
  <div class="carousel-inner" id = "elCarrusel">
    <div class="carousel-item active">
    <img class="imgQr d-block " src="vistas/img/pix3.png" id="img64primero">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
  <span><i class="fa fa-angle-left" aria-hidden="true"></i></span>
    <span class="sr-only" >Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
  <span><i class="fa fa-angle-right" aria-hidden="true"></i></span>
    <span class="sr-only" id="flechaDer">Next</span>
  </a>
</div>

  <!--img class="imgQr" src="vistas/img/pix3.png" id="img64"-->
  <div class="row">
  <hr>
  <div class="col-4 flecQr">
    <p>Disponibles:</p>
    <p id = "infoReserva" ></p>

  </div>
  <div class="col-4 flecQr borde"><p>Sábado<br>12/06/19 - 10:30pm</p></div>
  <div class="col-4 flecQr borde">
    <p>Nº de reservación:</p>
    <p id = "numeroReserva" ></p>
  </div>
  <hr>
  </div>
  <div class="row">
  <hr>
  <div class="col-4 flecQr">
    <p>Invitados:</p><br>
    <ul id="listaInvitados" style="list-style-type:disc;">
    </ul>
  </div>
  <div class="col-4 flecQr borde">
    <p>--------<br></p>
  </div>
  <div class="col-4 flecQr borde">
    <p>Scan:</p><br>
    <ul id="listaScan" style="list-style-type:none;">
    </ul>
  </div>
  <hr>
  </div>

  <dl class="listaQr">
  <dd>-Para validar tu reservación es importante que lleves tu QR de
  forma digital o impreso</dd>
  <dd>-Las reservaciones no son transferibles</dd>
  <dd>-En la entrada se solicitara una identificación oficial</dd>
  <dd>-Todas las reservaciones vencen a las 11:30pm</dd>
  <dd>-Aplican restricciones</dd>
  <dd>-Consulta todas tus dudas enviándonos un mensaje privado</dd>
  <dd>-No valida en eventos especiales</dd> 
  </dl>
  <div class="zonaBtn">
    <button type="submit" class="btn btnOscuro btnDescargar" id="btnQR" onclick="invitacionQR()">Aceptar</button>
    <button type="submit" class="btn btnOscuro btnShare"><i class="fas fa-share"></i></button>
  </div>
  <br><br><br>
  <div id="idQR" style="display: none;"></div>
</div>