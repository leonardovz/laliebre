$(document).ready(function(){
/**////////////////////////////////////////////*/
    /**/////////////CARRITO DE COMPRAS ////////////*/
    /**/////////////////////////////// ////////////*/
    addCart();
    var listaCarrito;
    if(localStorage.getItem('listaProductos') != null ){
        listaCarrito = JSON.parse(localStorage.getItem('listaProductos'));
    }else{
        listaCarrito= [];
    }

    function addCart(){
        $('.producto-carrito').off('click').on('click',function(){
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