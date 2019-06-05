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

                }else{
                    $('#targeta').append(resp);


                }
                if(resp.length < 10){
                    $('#traerMas').hide();
                }
                addCart();
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
                    
                    if(resp.length < 10){
                        $('#traerMas').hide();
                    }

                }else{
                    $('#targeta').append(resp);
                    actual++;
              
                    if(resp.length < 10){
                        $('#traerMas').hide();
                    }
                }
                addCart();
            }
        });
    }
    /**////////////////////////////////////////////*/
    /**/////////////CARRITO DE COMPRAS ////////////*/
    /**/////////////////////////////// ////////////*/
    
    

    function addCart(){
        $('.producto-carrito').off('click').on('click',function(){
            var listaCarrito;
            if(localStorage.getItem('listaProductos') != null ){
                listaCarrito = JSON.parse(localStorage.getItem('listaProductos'));
            }else{
                listaCarrito= [];
            }
            var idproducto  = $(this).attr('idproducto'),
                     nombre = $(this).attr('nombre'),
                     precio = $(this).attr('precio'),
                     imagen = $(this).attr('imagen');
                     cantidad = "1";
            listaCarrito.push({"idproducto": idproducto, "nombre": nombre, "precio": precio, "imagen": imagen, "cantidad": cantidad});
            console.log(listaCarrito);
            if(cantidad = prodExiste(idproducto) ){
                cantidad++;
                añadirProducto(idproducto, cantidad);
                swal(nombre, "Total : "+cantidad, "success");
            }else{
                localStorage.setItem("listaProductos",JSON.stringify(listaCarrito) );
                swal(nombre, "Añadido a tu carrito de compras", "success");
            }
        });
    }
    function prodExiste(idProd){
        var bandera =  false;
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        if(listaCarrito!=null){
            listaCarrito.forEach(function(item,index){
                var idproducto  = item.idproducto,
                        cantidad = item.cantidad;
                if(idproducto==idProd){
                    // swal('El producto Existe');
                     bandera =  cantidad;
                }
            });
        }
        return bandera;
    }
    function añadirProducto(idProd,cant){
        console.log(idProd);
        console.log(cant);
        var subtotal =0;
        var nuevaVersion = [];
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        listaCarrito.forEach(function(item,index){
            var idproducto  = item.idproducto,
                     nombre = item.nombre,
                     precio = item.precio,
                     imagen = item.imagen;
                if(idproducto==idProd){
                    nuevaVersion.push({"idproducto": idProd, "nombre": nombre, "precio": precio, "imagen": imagen, "cantidad": cant});
                    console.log(listaCarrito);
                    subtotal +=(precio*cant) ;
                }else{
                    var cantidad = item.cantidad;
                    nuevaVersion.push({"idproducto": idproducto, "nombre": nombre, "precio": precio, "imagen": imagen, "cantidad": cantidad});
                    console.log(listaCarrito);
                    subtotal +=(precio*cantidad) ;
                } 
                
                // total= parseFloat(item.precio)+parseFloat(total);
        });
        localStorage.setItem("listaProductos",JSON.stringify(nuevaVersion) );
        return subtotal;
    }
    /**////////////////////////////////////////////*/
    /**/////////////CARRITO DE COMPRAS ////////////*/
    /**/////////////////////////////// ////////////*/
    
});