<div class="container-fluid rps">
    <div class="barraSearch">
        <input class="form-control mr-sm-2 busquedaRp" type="search" placeholder="Search" aria-label="Search" onkeyup="keyupBuscar(this)"><br>
        <div class="form-group">
            <label class="negro" for="tipoStaff">Cargo de staff</label>
            <select class="form-control inputsClaros" id="tipoStaff" onchange="changeTipoStaff(this)">
                <option selected value="0">-Todos-</option>
                <option value="2">Gerencia</option>
                <option value="3">RP</option>
                <option value="4">Mesero</option>
                <option value="7">Cadenero</option>
                <option value="8">Capitán</option>
            </select>
        </div>
    </div>
   <div class="zonaZona">
        <div class="zonaRps">
        <div class="loader">Loading...</div>
            <div class="wrap flexRps" id="rps">
           
                <!--
                <div class="card cardNegra cardRp mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="vistas/img/perfil.jpg" class="card-img" alt="profile-pic">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Nombre Monito</h5>
                                <p class="card-text">30/50
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
   </div>
</div>