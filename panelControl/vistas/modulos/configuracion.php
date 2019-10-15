<div class="container-fluid configuracion">
    <div class="zonaCuadro">
        <nav class="navConfiguracion">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="false">Nuevo Staff</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false">Administrar Staff</a>
                <a class="nav-item nav-link" id="nav-eventos-tab" data-toggle="tab" href="#nav-eventos" role="tab"
                    aria-controls="nav-eventos" aria-selected="false">Eventos y Promos</a>
                <a class="nav-item nav-link" id="nav-diseno-tab" data-toggle="tab" href="#nav-diseno" role="tab"
                    aria-controls="nav-diseno" aria-selected="false">Diseño y Contenido</a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false">Cerrar Sesión</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="zonaScroll">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form class="newStaff">
                        <div class=" flex1">
                            <input type="file" class="hideInput" id="customFile1" name="pic1"
                                onchange="openFile(event)">
                            <label for="customFile1"><img id="foto1" src="vistas/img/cuadroCarga.svg"> </label>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control inputsClaros" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" class="form-control inputsClaros" id="telefono">
                        </div>
                        <div class="form-group">
                            <label class="negro" for="exampleFormControlSelect1">Puesto</label>
                            <select class="form-control inputsClaros" id="puesto">
                                <option selected value='0'>-Selecciona uno-</option>
                                <option value='1'>RP </option>
                                <option value='2'>Mesero </option>
                                <option value='3'>Capitán </option>
                                <option value='3'>Cadenero </option>
                                <option value='3'>Gerente </option>
                            </select>
                        </div>

                        <div class="form-group">
      <label for="mail">Email</label>
      <input type="email" class="form-control inputsClaros" id="mail">
    </div>
    <div class="form-group">
      <label>Cumpleaños</label>
      <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
        <input type="text" id="cumpleaños" class="form-control datetimepicker-input inputsClaros" data-target="#datetimepicker4" />
        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" class="form-control inputsClaros" id="password">
    </div>
    <div class="form-group">
      <label for="password2">Repetir Contraseña</label>
      <input type="password" class="form-control inputsClaros" id="password2">
    </div>

                       <div class="zoneRadios">
                       <label class="negro" for="exampleFormControlSelect1">Acceso a Scanner</label><br>
                            <div class="form-check form-check-inline">
                            
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                       </div><br>
                       <div class="zoneRadios">
                       <label class="negro" for="exampleFormControlSelect1">Acceso a Panel de Control</label><br>
                            <div class="form-check form-check-inline">
                            
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                       </div>

                        <div class="zonaBtnRegistro">
                            <button type="button" class="btn btnRegistro" id="botonRegistrar" onclick="registrar()">Agregar</button>
                        </div>
                    </form>

                </div>
<!-- Zona de administrar staff-->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="zonaRps2">
        <div class="wrap flexRps2">

        <div class="card cardNegra cardRp mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Nombre Monito</h5>
                                        <p class="card-text text-center">30/50
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 znBtns">
                                   
                                    <div class="editar">
                                       <h5 class="dorado" data-toggle="modal" data-target="#editarModal">Editar</h5>
                                       </div>
                                       <div class="eliminar" data-toggle="modal" data-target="#eliminarModal">
                                       <h5 class="dorado">Eliminar</h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="card cardNegra cardRp mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Nombre Monito</h5>
                                        <p class="card-text text-center">30/50
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 znBtns">
                                   
                                    <div class="editar">
                                       <h5 class="dorado">Editar</h5>
                                       </div>
                                       <div class="eliminar">
                                       <h5 class="dorado">Eliminar</h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> 
                        <div class="card cardNegra cardRp mb-3" style="max-width: 540px;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">Nombre Monito</h5>
                                        <p class="card-text text-center">30/50
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-2 znBtns">
                                   
                                    <div class="editar">
                                       <h5 class="dorado">Editar</h5>
                                       </div>
                                       <div class="eliminar">
                                       <h5 class="dorado">Eliminar</h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                       
                        
        
        </div>
    </div>
                </div>

                <div class="tab-pane fade" id="nav-eventos" role="tabpanel" aria-labelledby="nav-eventos-tab">...</div>
                <div class="tab-pane fade" id="nav-diseno" role="tabpanel" aria-labelledby="nav-diseno-tab">...</div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="editarStaff">
                        <div class=" flex1">
                            <input type="file" class="hideInput" id="customFile1" name="pic1"
                                onchange="openFile(event)">
                            <label for="customFile1"><img id="foto1" src="vistas/img/cuadroCarga.svg"> </label>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control inputsClaros" id="nombre">
                        </div>
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="number" class="form-control inputsClaros" id="telefono">
                        </div>
                        <div class="form-group">
                            <label class="negro" for="exampleFormControlSelect1">Puesto</label>
                            <select class="form-control inputsClaros" id="puesto">
                                <option selected value='0'>-Selecciona uno-</option>
                                <option value='1'>RP </option>
                                <option value='2'>Mesero </option>
                                <option value='3'>Capitán </option>
                                <option value='3'>Cadenero </option>
                                <option value='3'>Gerente </option>
                            </select>
                        </div>

                        <div class="form-group">
      <label for="mail">Email</label>
      <input type="email" class="form-control inputsClaros" id="mail">
    </div>
    <div class="form-group">
      <label>Cumpleaños</label>
      <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
        <input type="text" id="cumpleaños" class="form-control datetimepicker-input inputsClaros" data-target="#datetimepicker4" />
        <div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="password">Contraseña</label>
      <input type="password" class="form-control inputsClaros" id="password">
    </div>
    <div class="form-group">
      <label for="password2">Repetir Contraseña</label>
      <input type="password" class="form-control inputsClaros" id="password2">
    </div>

                       <div class="zoneRadios">
                       <label class="negro" for="exampleFormControlSelect1">Acceso a Scanner</label><br>
                            <div class="form-check form-check-inline">
                            
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                       </div><br>
                       <div class="zoneRadios">
                       <label class="negro" for="exampleFormControlSelect1">Acceso a Panel de Control</label><br>
                            <div class="form-check form-check-inline">
                            
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                    value="option1">
                                <label class="form-check-label" for="inlineRadio1">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                    value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                       </div>

                        <div class="zonaBtnRegistro">
                            <button type="button" class="btn btnRegistro" id="botonRegistrar" onclick="actualizarStaff()">Actualizar</button>
                        </div>
                    </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar Staff</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente deseas eliminar a esta persona?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
</div>