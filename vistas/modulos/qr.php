<div class="contenedorQr">
<nav class="navbar fixed-top  ">
    <div class="iconos">
      <a href="?page=13"> <i class="fas fa-arrow-left colorcin"></i></a>
      <h1 class=" divTitutlo text-center"></h1>
    </div>
</nav>
<div class="divEditar">
  <i onclick="editarReserva()" class="far fa-edit"></i>
  <button type="button"  onclick="editarReserva()">Edit</button>

</div><br><br>

<div class="divQr">
  
    <img class="imgQr d-block " src="vistas/img/pix3.png" id="img64primero">
   
 
  
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
    <p>Escaneado:</p><br>
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
    <button type="button" class="btn btnOscuro btnShare" onclick="share()"><i class="fas fa-share"></i></button>
  </div>
  <br><br><br>
  <div id="idQR" style="display: none;"></div>
  <p id="liga" hidden></p>
</div>