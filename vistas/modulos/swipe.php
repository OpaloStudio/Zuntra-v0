<div class="contenedorSwipe">


  <nav class="navbar fixed-top navbar-dark navSwipe" style="background-color: rgb(33, 33, 33,0.41);">
      <div class="iconos">
      <a href="?page=13"><i class="fas fa-arrow-left"></i></a>
      <a href="?page=7"> <i class="fas fa-user-circle"></i></a>
      <a href="?page=10"><i class="fas fa-comments"></i></a>
      <!--<img class="logoSwipe" src="vistas/img/otros/logoBlanco.png">-->
    </div>


    <button class="btn btnPuntos " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
      aria-expanded="false">
      <i class="fas fa-ellipsis-h"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
      <button type="button" class="btn btnModal center" data-toggle="modal" data-target="#exampleModal">Bloquear</button>

    </div>


  </nav>
  

  <div class=" carouselSwipe">
    
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
 
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 imgSwipe" id="imgSwip1" src="" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 imgSwipe" id="imgSwip2" src="" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 imgSwipe" id="imgSwip3" src="" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 imgSwipe" id="imgSwip4" src="" alt="Third slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 imgSwipe" id="imgSwip5" src="" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

    <div class="row">
      <div class="col-12">
      <div class="divNombre">
      <h2 id = 'nombreSwipe' >Rodrigo Rosas</h2>
      <h6>24 años - citas</h6>
      </div>
      </div>
    </div>
  


<!-- Modal -->
<div class="modal fade elModal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
      <div class="content">
  <div class="box">
    <p>
      <input class="checkBloquear" type="checkbox" id="c1" name="cb">
      <label for="c1">No especificar</label>
    </p>
    <p>
      <input class="checkBloquear" type="checkbox" id="c2" name="cb">
      <label for="c2">Comportamiento fuera de lugar</label>
    </p>
    <p>
      <input class="checkBloquear" type="checkbox" id="c3" name="cb">
      <label for="c3">Es muy insistente</label>
    </p>

    <p>
      <input class="checkBloquear" type="checkbox" id="c4" name="cb">
      <label for="c4">Hay una relación pasada</label>
    </p>
  </div>
</div>
        
        <div class="form-group">
    <label for="razon">Otra razón o queja</label>
    <textarea class="form-control razon" id="razon" rows="3"></textarea>
  </div>
      </div>
      </form>
      <div class="divSubmit">
        <button type="button" class="btn btnBloquear" onclick='bloqueo()' >Bloquear</button>
      </div>
    </div>
  </div>
</div>

  <span class="barritaBtn">
      <div class="btnEleccion" id="nelson">
      <i class="fas fa-thumbs-down" onclick='noMatch()'></i>
      </div>
      <div class="btnEleccion" id="simon">
      <i class="fas fa-thumbs-up" onclick='match()'></i>
      </div>
      <div class="btnEleccion" id="mensajeYA">
      <i class="fas fa-paper-plane avion" ></i>
      </div>
  </span>

  <div class="row bioSwipe">
    <div class="col-12">
    <p class="descripcion" id = 'bioSwipe'>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia perspiciatis beatae nobis sed possimus ad culpa animi fugiat maiores! Veniam explicabo vero veritatis.</p>
    </div>
  </div>



</div>