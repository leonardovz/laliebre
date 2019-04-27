<?php require_once 'administrador/templates/header.php';?>

    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">404</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> ¡Oops! <br> La pagina Solicitada no es Correcta</h3>

          <p>
            Busca algun producto o
             <a href="<?php echo $ruta;?>"> vuelve a la pagina de inicio</a> para continuar
          </p>

          <div id="FormBusqueda" class="search-form">
            <div class="input-group">
              <input type="text" name="search" id="search" class="form-control" placeholder="Search">

              <div class="input-group-btn">
                <button id="enviar" type="submit" class="btn btn-danger btn-flat"><i class="fa fa-search"></i>
                </button>
              </div>
            </div>
            <!-- /.input-group -->
          </div>
        </div>
      </div>
      <!-- /.error-page -->

    </section>
 
<?php require_once 'administrador/templates/footer.php';?>
<script>
  var ruta = ruta();
  $(document).ready(function(){
    $("#search").keypress(function(e) {
      if(e.which == 13) {
        var buscar = $(this).val();
        // console.log(buscar);
        window.location.replace(ruta+"tienda/"+buscar);
      }
    });
    $("#enviar").on('click',function(e) {
        var buscar = $("#search").val();
        // console.log(ruta+"tienda/"+buscar);
        window.location.replace(ruta+"tienda/"+buscar);
    });
    

  });
</script>