<div class="container-fluid reservaciones">
    <div class="zonaReservaciones">
        <div class="card cardReservTotales">
            <h2>Reservaciones Totales</h2>
            <h1 id="reservacionesTotales">0 / 0</h1>
        </div>
    </div>
    <div class="divTabla d-flex flex-column">
        <div class="cardTableReserv">
            <div class="searchUsuarios">
                <input class="form-control mr-sm-2 busquedaRp" type="search" placeholder="Search" aria-label="Search" onkeyup="buscarUsuarioNombre(this)">
            </div>
            <div class="table-responsive flexTable">
                <table class="table table-hover tablaUsuarios" id="tablaUsuarios">
                    <thead class="headTabla">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre de quién Reserva</th>
                            <th scope="col">Tipo de reservación</th>
                            <th scope="col">Reserva con</th>
                            <th scope="col">Número de personas</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
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