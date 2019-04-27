var ruta = ruta();
$(document).ready(function() {
    var Busqueda = $("#buscarProd").val();
    var expresion = /^[a-zA-ZñÑ 0-9]*$/;
    if(Busqueda == ""){
        traerProductos();
    }else{
        buscarProductos(Busqueda);
    }
    $("#buscarProd").keypress(function(e) {
        if(e.which == 13) {
          var buscar = $(this).val();
          if(!expresion.test(buscar)){
            swal.fire("Evita ingresar caracteres especiales como lo son los acentos, las tildes etc");
            }else{
                window.location.replace(ruta+"tienda/"+buscar);
                // buscarProductos(buscar);
            }
        }
      });
    $("#tiendabuscar").on('click',function(e) {
        var buscar = $("#buscarProd").val();
        if(!expresion.test(buscar)){
            swal.fire("Evita ingresar caracteres especiales como lo son los acentos, las tildes etc");
        }else{
            window.location.replace(ruta+"tienda/"+buscar);
            // buscarProductos(buscar);
        }
    });
    
    function traerProductos() {
        var accion = 'principal',
            actual = 0;
        $.ajax({
            url: ruta + 'php/mostrarProductos.php',
            type: 'POST',
            data: 'accion=' + accion + '&actual=' + actual,
            error: function(xhr,status) {
                $('#targeta').html(xhr);
            },
            success: function(resp) {
                $('#targeta').before(resp);
               
            }
        });
    }

    function buscarProductos(buscar){
        var accion = 'busqueda';
            actual = 0;
        $.ajax({
            url: ruta + 'php/mostrarProductos.php',
            type: 'POST',
            data: 'accion=' + accion + '&actual=' + actual + '&busqueda=' + buscar,
            error: function(xhr,status) {
                $('#targeta').html(xhr);
            },
            success: function(resp) {
                $('#targeta').html(resp);
            }
        });
    }
    
});