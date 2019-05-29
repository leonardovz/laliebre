var ruta = ruta();
$(document).ready(function() {
    var actual = 0;
    var Busqueda = $("#buscarProd").val();
    var expresion = /^[a-zA-ZñÑ 0-9]*$/;
    if(Busqueda == ""){
        traerProductos();
        $('#traerMas').on('submit',function(e){
            e.preventDefault();
            traerProductos();
        })
    }else{
        buscarProductos(Busqueda);
        $('#traerMas').on('submit',function(e){
            e.preventDefault();
            buscarProductos(Busqueda);
        })
    }
    $("#buscarProd").keypress(function(e) {
        if(e.which == 13) {
          var buscar = $(this).val();
          if(!expresion.test(buscar)){
            swal.fire("Evita ingresar caracteres especiales como lo son los acentos, las tildes etc");
            }else{
                window.location.replace(ruta+"tienda/"+buscar);
            }
        }
      });
    $("#tiendabuscar").on('click',function(e) {
        var buscar = $("#buscarProd").val();
        if(!expresion.test(buscar)){
            swal.fire("Evita ingresar caracteres especiales como lo son los acentos, las tildes etc");
        }else{
            window.location.replace(ruta+"tienda/"+buscar);
        }
    });
    
    function traerProductos() {
        var accion = 'principal';
        $.ajax({
            url: ruta + 'php/mostrarProductos.php',
            type: 'POST',
            data: 'accion=' + accion + '&actual=' + actual,
            error: function(xhr,status) {
                $('#targeta').html(xhr);
            },
            success: function(resp) {
                if(actual==0){
                    $('#targeta').html(resp);
                    addCart();

                }else{
                    $('#targeta').append(resp);
                    addCart();

                }
                if(resp.length < 10){
                    $('#traerMas').hide();
                }
                actual++;
            }
        });
    }

    function buscarProductos(buscar){
        var accion = 'busqueda';
        $.ajax({
            url: ruta + 'php/mostrarProductos.php',
            type: 'POST',
            data: 'accion=' + accion + '&actual=' + actual + '&busqueda=' + buscar,
            error: function(xhr,status) {
                $('#targeta').html(xhr);
            },
            success: function(resp) {
                if(actual==0){
                    $('#targeta').html(resp);
                    actual++;
                    addCart();
                    if(resp.length < 10){
                        $('#traerMas').hide();
                    }

                }else{
                    $('#targeta').append(resp);
                    actual++;
                    addCart();
                    if(resp.length < 10){
                        $('#traerMas').hide();
                    }
                }
                
            }
        });
    }
    /**////////////////////////////////////////////*/
    /**/////////////CARRITO DE COMPRAS ////////////*/
    /**/////////////////////////////// ////////////*/

    var listaCarrito;
    if(localStorage.getItem('listaProductos') != null ){
        listaCarrito = JSON.parse(localStorage.getItem('listaProductos'));
    }else{
        listaCarrito= [];
    }

    function addCart(){
        $('.producto-carrito').on('click',function(){
            var idproducto  = $(this).attr('idproducto'),
                     nombre = $(this).attr('nombre'),
                     precio = $(this).attr('precio'),
                     imagen = $(this).attr('imagen');
            listaCarrito.push({"idproducto": idproducto, "nombre": nombre, "precio": precio, "imagen": imagen});
            console.log(listaCarrito);
            localStorage.setItem("listaProductos",JSON.stringify(listaCarrito) );
        });
    }
    
});