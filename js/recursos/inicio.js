var ruta = ruta();
$(document).ready(function() {
	$("#buscarProd").change(function(){
		var buscar =$(this).val();
		window.location.replace(ruta+"tienda/"+buscar);
    });
    var actual = 0;
    
    var accion = 'principal';
    $.ajax({
        url: ruta + 'php/mostrarProductos.php',
        type: 'POST',
        data: 'accion=' + accion + '&actual=' + actual,
        error: function(xhr,status) {
            $('#targeta').html(xhr);
        },
        success: function(resp) {
            if(resp==""){

            }
            else{ 
                $('#targeta').html(resp);
                addCart();
                actual++;
            }
        }
    });
    
    $("#traerMas").on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url: ruta + 'php/mostrarProductos.php',
            type: 'POST',
            data: 'accion=' + accion + '&actual=' + actual,
            error: function(xhr,status) {
                $('#targeta').html("Ocurrio un error al realizar la peticion al servidor");
            },
            success: function(resp) {
                if(resp.length < 10){
                    Swal.fire( "Ya no tienes mas Products para ver" );
                }
                else{ 
                    $('#targeta').append(resp);
                    addCart();
                    actual++;
                }
            }
        });
    });
    
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