<div class="container-fluid reservaciones">
    <div class="zonaReservaciones2">
        <div class="card cardReservTotales2 ">
            <h2>Reservaciones Totales</h2>
            <h1 id="reservacionesTotales">0 / 0</h1>
        </div>

        <div class="card cardReservTotales2 ">
            <h2>Reservaciones del día</h2>
            <h1 id="reservacionesDia">0</h1>
        </div>

    </div>
    <div class="divTabla d-flex flex-column">
        <div class="zonaZona">
            <div class="cardTableReserv">
                <div class="searchUsuarios">
                    <input class="form-control mr-sm-2 busquedaRp" type="search" placeholder="Search" aria-label="Search" onkeyup="buscarUsuarioNombre(this)">
                </div>
                <div class="table-responsive flexTable">
                    <table class="table table-hover tablaUsuarios" id="tablaUsuarios">
                        <thead class="headTabla">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Nombre Reservación</th>
                                <th scope="col">Tipo de Reservación</th>
                                <th scope="col">Nº de Reservaciones</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="paginacion">
                <ul class="pagination justify-content-center" id="paginacionUsuarios">
                    <li class="page-item disabled" id="paginacionUsuariosPrevious">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item" id="paginacionUsuariosNext">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>