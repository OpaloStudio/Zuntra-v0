<div class="contenedorChat">
  <nav class="navbar fixed-top navbar-dark navInbox">
    <div class="iconos">
      <a href="?page=8"> <i class="fas fa-arrow-left"></i></a>
    </div>
    <div class="imgChat"></div>
  </nav>

  <div class="divMensajes">

    <div class="mnsjOtro">
      <p class="mensajeEL">On tas?</p>
    </div>

    <div class="mnsjYo ">
      <p class="mensajeYO ">En la barra </p>
    </div>

    <div class="mnsjOtro">
      <p class="mensajeEL">Te pago el Uber Lorem ipsum dolor sit amet consectetur, adipisicing elit. Saepe suscipit
        delectus ex mollitia error laboriosam quos? Aut sit vitae provident eum quis perferendis eius distinctio?
        Ducimus iure laboriosam sint deserunt!</p>
    </div>


    <div class="zonaEscribir">
      <div class="imgCochinas">

        <div class="divCerrar">
          <div class="centradito">
            <i class="fas fa-times" onclick="cerrarCochinadas()"></i>
          </div>
        </div>
        <div class="scrollZone">

          <div class="flex1 ">
            <input type="file" class="hideInput" id="customFile1" onchange="openFile(event)">
            <label for="customFile1"><img id="cuadro1" src="vistas/img/cuadroCarga.svg"> </label>
          </div>
          <div class="posX">
               <i class="fas fa-times xBorrar" id="noCochinadas1" onclick="quitarCochinadas(1)"></i>
            </div>

          <div class=" flex1">
            <input type="file" class="hideInput" id="customFile2" onchange="openFile2(event)">
            <label for="customFile2"><img id="cuadro2" src="vistas/img/cuadroCarga.svg"> </label>
          </div>
          <div class="posX">
               <i class="fas fa-times xBorrar" id="noCochinadas2" onclick="quitarCochinadas(2)"></i>
            </div>

          <div class=" flex1">
            <input type="file" class="hideInput" id="customFile3" onchange="openFile3(event)">
            <label for="customFile3"><img id="cuadro3" src="vistas/img/cuadroCarga.svg"> </label>
          </div>
          <div class="posX">
               <i class="fas fa-times xBorrar" id="noCochinadas3" onclick="quitarCochinadas(3)"></i>
            </div>


          <div class="flex1">

            <input type="file" class="hideInput" id="customFile4" onchange="openFile4(event)">
            <label for="customFile4"><img id="cuadro4" src="vistas/img/cuadroCarga.svg"> </label>
          </div>
          <div class="posX">
               <i class="fas fa-times xBorrar" id="noCochinadas4" onclick="quitarCochinadas(4)"></i>
            </div>

          <div class=" flex1">

            <input type="file" class="hideInput" id="customFile5" onchange="openFile5(event)">
            <label for="customFile5"><img id="cuadro5" src="vistas/img/cuadroCarga.svg"> </label>
          </div>
          <div class="posX">
               <i class="fas fa-times xBorrar" id="noCochinadas5" onclick="quitarCochinadas(5)"></i>
            </div>

        </div>
      </div>
      <div class="row">
        <div class="col-10 zonaInput">
          <input type="text" class="inputChat">
          <i class="far fa-images" onclick="mostrarCochinadas()"></i>
        </div>
        <div class="col-2 zonaRedondo">
          <span class="btnRedondo">
            <i class="far fa-paper-plane"></i>
          </span>
        </div>
      </div>
    </div>

  </div>