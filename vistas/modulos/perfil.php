<div class="container-fluid fondito">


  <form class="formPerfil">
  <a href="?page=8"><i class="fas fa-arrow-left"></i></a><br><br>


  <div class="row  ">

<div class="col-6 flex1">
    <input type="file" class="hideInput" id="customFile1" name="pic1" onchange="openFile(event)">
    <label  for="customFile1"><img id="foto1" src="vistas/img/cuadroCarga.svg"> </label>
</div>

<div class="col-6 flex1">
      <input type="file" class="hideInput" id="customFile2" name="pic2" onchange="openFile2(event)">
      <label for="customFile2"><img id="foto2" src="vistas/img/cuadroCarga.svg"> </label>
  </div>
     
</div>
        <div class="row">
        <div class="col-4 flex1">
        <input type="file" class="hideInput" id="customFile3" name="pic3" onchange="openFile3(event)">
            <label for="customFile3"><img id="foto3" src="vistas/img/cuadroCarga.svg"> </label>
</div>
<div class="col-4 flex1">
            <input type="file" class="hideInput" id="customFile4" name="pic4" onchange="openFile4(event)">
            <label for="customFile4"><img id="foto4" src="vistas/img/cuadroCarga.svg"> </label>
            </div>

            <div class="col-4 flex1">
            <input type="file" class="hideInput" id="customFile5" name="pic5" onchange="openFile5(event)">
            <label for="customFile5"><img id="foto5" src="vistas/img/cuadroCarga.svg"> </label>
            </div>

        </div>
   


    <div class="form-group">
      <label for="exampleFormControlSelect1">Sexo</label>
      <select class="form-control inputOscuro" id="tipoSexo">
        <option value="0" selected>-Elige tu sexo-</option>
        <option value="1">Hombre</option>
        <option value="2">Mujer</option>
        <option value="3">Trans</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">¿Qué buscas?</label>
      <select class="form-control inputOscuro" id="busco">
        <option value="0" selected>-Elige una opción-</option>
        <option value="1">Hombre</option>
        <option value="2">Mujer</option>
        <option value="3">Trans</option>
      </select>
    </div>

    <div class="form-group">
      <label for="exampleFormControlSelect1">Tipo de cita</label>
      <select class="form-control inputOscuro" id="tipoCita">
        <option value="0" selected>-Elige tu cita-</option>
        <option value="1">Amigos</option>
        <option value="2">Chat</option>
        <option value="3">Citas</option>
        <option value="4">Relación para este momento</option>
      </select>
    </div>


    <div class="form-group">
      <label for="biografia">Cuentanos de ti</label>
      <textarea class="form-control inputOscuro" id="biografia" rows="3"></textarea>
    </div>

    <div class="form-group">
      <span class="switch switch-sm">
        <input type="checkbox" class="switch " id="switch-sm" onclick="mostrarEts()">
        <label for="switch-sm">Cuida tu salud (opcional)</label>
      </span>
    </div>

    <div class="divEts">
      <div class="form-group">
        <label for="ets">¿Tienes ETS?</label>
        <select class="form-control inputOscuro" id="ets">
          <option value="0" selected>-Elige una opción-</option>
          <option value="1">Negativo</option>
          <option value="2">VIH</option>
          <option value="3">Clamidia</option>
          <option value="4">Herpes Genital</option>
          <option value="5">Gonorrea</option>
          <option value="6">Sifilis</option>
          <option value="7">Otra</option>
        </select>
      </div>

      <div class="form-group">
        <label for="chequeo">¿Cuando fué tu ultimo chequeo?</label>
        <select class="form-control inputOscuro" id="chequeo">
          <option selected>-Elige una opción-</option>
          <option>Nadie</option>
          <option>Juanito</option>
          <option>Lola</option>
        </select>
      </div>
    </div>
    <button type="button" class="btn btnOscuro" id="btnActualizar" onclick="irSwipe()">Iniciar</button>
    <br><br>
  </form>
</div>