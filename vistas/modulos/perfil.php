<div class="container-fluid fondito">


  <form class="formPerfil">
  <a href="?page=8"><i class="fas fa-arrow-left"></i></a><br><br>


  <div class="row  ">
   <div class="fullDiv">
      <h1 class="text-center dorado">Edita tu perfil</h1>
   </div>

<div class="col-6 flex1">
    <input type="file" class="hideInput" id="customFile1" name="pic1" onchange="openFile(event)" accept="image/x-png,image/gif,image/jpeg" >
    <label  for="customFile1"><img id="foto1" src="vistas/img/cuadroCarga.svg"> </label>
</div>

<div class="col-6 flex1">
      <input type="file" class="hideInput" id="customFile2" name="pic2" onchange="openFile2(event)" accept="image/x-png,image/gif,image/jpeg">
      <label for="customFile2"><img id="foto2" src="vistas/img/cuadroCarga.svg"> </label>
  </div>
     
</div>
        <div class="row">
        <div class="col-4 flex1">
        <input type="file" class="hideInput" id="customFile3" name="pic3" onchange="openFile3(event)" accept="image/x-png,image/gif,image/jpeg">
            <label for="customFile3"><img id="foto3" src="vistas/img/cuadroCarga.svg"> </label>
</div>
<div class="col-4 flex1">
            <input type="file" class="hideInput" id="customFile4" name="pic4" onchange="openFile4(event)" accept="image/x-png,image/gif,image/jpeg">
            <label for="customFile4"><img id="foto4" src="vistas/img/cuadroCarga.svg"> </label>
            </div>

            <div class="col-4 flex1">
            <input type="file" class="hideInput" id="customFile5" name="pic5" onchange="openFile5(event)" accept="image/x-png,image/gif,image/jpeg">
            <label for="customFile5"><img id="foto5" src="vistas/img/cuadroCarga.svg"> </label>
            </div>

        </div>
        
      <p class="text-center">(Las 5 imagenes son obligatorias)</p>
   


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
      <textarea class="form-control inputOscuro" id="biografia" rows="3" maxlength="140"></textarea>
    </div>

    <div class="form-group">
      <span class="switch switch-sm">
        <input type="checkbox" class="switch " id="switch-sm" onclick="mostrarNastyZone()">
        <label for="switch-sm">Gaurda fotos para el chat (opcional)</label>
      </span>
    </div>

    <div class="divNastyPics">
    <div class="row  ">
   <div class="fullDiv">
      <h5 class="text-center dorado">Aquí puedes guardar esa "foto" que necesitas mandar rápidamente. Puedes cambiarlas cuando quieras</h5>
   </div>

<div class="col-6 flex1">
    <input type="file" class="hideInput" id="customNasty1" name="pic1" onchange="openFileNasty(event)" accept="image/x-png,image/gif,image/jpeg" >
    <label  for="customNasty1"><img id="fotoNasty1" src="vistas/img/cuadroCarga.svg"> </label>
</div>

<div class="col-6 flex1">
      <input type="file" class="hideInput" id="customNasty2" name="pic2" onchange="openFile2Nasty(event)" accept="image/x-png,image/gif,image/jpeg">
      <label for="customNasty2"><img id="fotoNasty2" src="vistas/img/cuadroCarga.svg"> </label>
  </div>
     
</div>
<div class="row">
        <div class="col-4 flex1">
        <input type="file" class="hideInput" id="customNasty3" name="pic3" onchange="openFile3Nasty(event)" accept="image/x-png,image/gif,image/jpeg">
            <label for="customNasty3"><img id="fotoNasty3" src="vistas/img/cuadroCarga.svg"> </label>
</div>
<div class="col-4 flex1">
            <input type="file" class="hideInput" id="customNasty4" name="pic4" onchange="openFile4Nasty(event)" accept="image/x-png,image/gif,image/jpeg">
            <label for="customNasty4"><img id="fotoNasty4" src="vistas/img/cuadroCarga.svg"> </label>
            </div>

            <div class="col-4 flex1">
            <input type="file" class="hideInput" id="customNasty5" name="pic5" onchange="openFile5Nasty(event)" accept="image/x-png,image/gif,image/jpeg">
            <label for="customNasty5"><img id="fotoNasty5" src="vistas/img/cuadroCarga.svg"> </label>
            </div>

        </div><br>

  
    </div>

    <div class="form-group">
      <span class="switch switch-sm">
        <input type="checkbox" class="switch " id="switch-sm2" onclick="mostrarEts()">
        <label for="switch-sm2">Cuida tu salud (opcional)</label>
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
        <label for="chequeo"></label>
        <select class="form-control inputOscuro" id="chequeo">
          <option selected>-Elige una opción-</option>
          <option>1 més</option>
          <option>6 meses</option>
          <option>1 año</option>
        </select>
      </div>
    </div>

    

   
    <button type="button" class="btn btnOscuro" id="btnActualizar" onclick="irSwipe()">Actualizar Perfil</button>
    <br><br>
  </form>
</div>