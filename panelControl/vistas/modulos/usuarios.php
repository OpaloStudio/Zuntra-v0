<div class="container-fluid usuarios">
    

    <div class="divTabla d-flex flex-column">
        <div class="cardTable">
            <div class="searchUsuarios">
                <input class="form-control mr-sm-2 busquedaRp" type="search" placeholder="Search" aria-label="Search" onkeyup="buscarUsuarioNombre(this)">
            </div>
            <div class="table-responsive flexTable d-flex flex-column">
                <table class="table table-hover tablaUsuarios" id="tablaUsuarios">
                    <thead class="headTabla">
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