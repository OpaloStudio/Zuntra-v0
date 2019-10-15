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
                            <label class="negro" for="puesto">Puesto</label>
                            <select class="form-control inputsClaros" id="puesto">
                                <option selected value='0' disabled>-Selecciona uno-</option>
                                <option value='1'>RP </option>
                                <option value='2'>Mesero </option>
                                <option value='3'>Capitán </option>
                                <option value='3'>Cadenero </option>
                                <option value='3'>Gerente </option>
                            </select>
                        </div>

                        <div class="zoneRadios">
                            <label class="negro">Acceso a Scanner</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="scanner" type="radio" id="scannerSi" value="1">
                                <label class="form-check-label" for="scannerSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="scanner" type="radio" id="scannerNo" value="0" checked>
                                <label class="form-check-label" for="scannerNo">No</label>
                            </div>
                        </div><br>
                        <div class="zoneRadios">
                            <label class="negro">Acceso a Panel de Control</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="controlPane" type="radio" id="controlPaneSi" value="1">
                                <label class="form-check-label" for="controlPaneSi">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="controlPane" type="radio" id="controlPaneNo" value="0" checked>
                                <label class="form-check-label" for="controlPaneNo">No</label>
                            </div>
                       </div>

                        <div class="zonaBtnRegistro">
                            <button type="button" class="btn btnRegistro" id="botonRegistrar" onclick="btnRegistrar()">Agregar</button>
                        </div>
                    </form>

                </div>

                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-eventos" role="tabpanel" aria-labelledby="nav-eventos-tab">...</div>
                <div class="tab-pane fade" id="nav-diseno" role="tabpanel" aria-labelledby="nav-diseno-tab">...</div>
            </div>
        </div>
    </div>
</div>