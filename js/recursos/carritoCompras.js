var ruta = ruta();
$(document).ready(function(){
    var total = 0;

    $("#pasarCarrito").on('click',function(e){
        e.preventDefault();
        var subtotalproductos = $("#subtotal").attr("total");
        if(subtotalproductos<= 0){
            swal("Tu carrito de compras esta Vacio")
        }
    });
    var uno = 1;
    if(localStorage.getItem("listaProductos")!=null){
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        listaCarrito.forEach(funcionForEach);
        $("#subtotal").html('$ '+number_format(total,2)+' MXN');
        $("#subtotal").attr("total",(total ) );
        carnalitos();//Esta funcion se encarga de sumar y restar el input de cantidad
        function funcionForEach(item,index){
            // var idproducto  = item.idproducto,
            //          nombre = item.nombre,
            //          precio = item.precio,
            //          imagen = item.imagen;
            // nuevaVersion.push({"idproducto": idproducto, "nombre": nombre, "precio": precio, "imagen": imagen});
            // console.log(listaCarrito);
            // localStorage.setItem("nuevosProductos",JSON.stringify(nuevaVersion) );
        // }); /////////////////
            $("#listaCarrito").after(`
            <tr class="table_row" idproducto="`+item.idproducto+`">
                <td class="column-1">   
                    <div class="how-itemcart1">
                        <img src="`+item.imagen+`" alt="IMG">
                    </div>
                </td>
                <td class="column-2">`+item.nombre+`</td>
                <td class="column-3" precio="`+(item.precio)+`">`+number_format(item.precio,2)+`</td>
                <td class="column-4">
                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-minus"></i>
                        </div>

                        <input class="mtext-104 cl3 txt-center num-product" type="text" name="num-product1" value="`+item.cantidad+`">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </td>
                <td class="column-5">`+number_format((item.precio*item.cantidad),2)+`</td>
            </tr>
            `);
            total= parseFloat(item.precio*item.cantidad)+parseFloat(total);
        }
    }

    function carnalitos (){
        var totalProd=0,
            costoprod = 0,
            totalSuma = 0,
            totalFinal=0;
        $(".btn-num-product-up").on('click',function(params) {
                totalProd = $(this).siblings('.num-product').val()
                totalProd=parseInt(totalProd)+1;
                costoprod = $(this).parent().parent().siblings('.column-3').attr('precio');//trae el precio
                var idproducto  = $(this).parent().parent().siblings('.column-3').parent().attr('idproducto');//trae el idDel producto
                totalSuma=number_format(parseFloat((totalProd) * parseFloat(costoprod) ) ,2 );
                $(this).siblings('.num-product').val(totalProd);//Le manda el valor al imput
                $(this).parent().parent().siblings('.column-5').html('$ '+totalSuma);//Manda el total al TOTAL

                // totalFinal = $("#subtotal").attr("total");//trael el total
                subtotalPrint(añadirProducto(idproducto,totalProd));
        });

        $(".btn-num-product-down").on('click',function(params) {
            totalProd = $(this).siblings('.num-product').val();//Trae el valor del imput
            if((totalProd-1) > 0 ){
                totalProd=parseInt(totalProd)-1;
                costoprod = $(this).parent().parent().siblings('.column-3').attr('precio');//trae el precio
                var idproducto  = $(this).parent().parent().siblings('.column-3').parent().attr('idproducto');//trae el idDel producto
                totalSuma=number_format(parseFloat((totalProd) * parseFloat(costoprod) ) ,2 );
                $(this).siblings('.num-product').val(totalProd);//Le manda el valor al imput
                $(this).parent().parent().siblings('.column-5').html('$ '+totalSuma);//Manda el total al TOTAL

                // totalFinal = $("#subtotal").attr("total");//trael el total
                subtotalPrint(añadirProducto(idproducto,totalProd));
            }else{
                Swal.fire({
                    title: '¡Cuidado!',
                    text: "Si quitas un producto más sera retirado de tu carrito",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, continuar!'
                  }).then((result) => {
                    if (result.value) {
                        $(this).parent().parent().parent().remove();
                        var eliminado = ( $(this).parent().parent().parent().attr('idproducto') );
                        EliminarProd(eliminado);
                    }
                  });
            }
        });
        $(".num-product").change(function(params) {
            var costo = $(this).val();
            if(costo <= 0 ){
                Swal.fire({
                    title: '¡Cuidado!',
                    text: "Si quitas un producto más sera retirado de tu carrito",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Si, continuar!'
                  }).then((result) => {
                    if (result.value) {
                        var eliminado = $(this).parent().parent().parent().attr('idproducto');
                        $(this).parent().parent().parent().remove();
                        EliminarProd(eliminado)
                    }else{
                        $(this).val(1);
                        
                    }
                  });
            }else{
                var producto = $(this).parent().parent().parent().attr('idproducto');
                subtotalPrint(añadirProducto(producto,costo));
            }
        });
        
    }

    function number_format(amount, decimals) {

        amount += ''; // por si pasan un numero en vez de un string
        amount = parseFloat(amount.replace(/[^0-9\.]/g, '')); // elimino cualquier cosa que no sea numero o punto

        decimals = decimals || 0; // por si la variable no fue fue pasada

        // si no es un numero o es igual a cero retorno el mismo cero
        if (isNaN(amount) || amount === 0) 
            return parseFloat(0).toFixed(decimals);

        // si es mayor o menor que cero retorno el valor formateado como numero
        amount = '' + amount.toFixed(decimals);

        var amount_parts = amount.split('.'),
            regexp = /(\d+)(\d{3})/;

        while (regexp.test(amount_parts[0]))
            amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');

        return amount_parts.join('.');
    } 
    
    function EliminarProd(idProd){
        console.log(idProd);
        var totalElim = 0;
        var nuevaVersion = [];
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        var contadorProd = 0;
        listaCarrito.forEach(function(item,index){
            contadorProd++;
            var idproducto  = item.idproducto,
                     nombre = item.nombre,
                     precio = item.precio,
                     imagen = item.imagen;
                     cantidad = item.cantidad;
                if(idproducto!=idProd){
                    nuevaVersion.push({"idproducto": idproducto, "nombre": nombre, "precio": precio, "imagen": imagen, "cantidad": cantidad});
                    console.log(listaCarrito);
                    localStorage.setItem("listaProductos",JSON.stringify(nuevaVersion) );
                    totalElim+= (precio*cantidad);
                }else{
                    contadorProd--;
                }
                
                if(contadorProd<1){
                    localStorage.setItem("listaProductos",JSON.stringify([]) );
                }
                subtotalPrint(totalElim);//Imprime el valor actual de los ITEMS
            
                
        });
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
    function subtotalPrint(subtotal){
        $("#subtotal").attr("total",(subtotal,2 ) );// Trae el total Del carrito
        $("#subtotal").html('$ '+number_format(subtotal ,2 ) +' MXN');
    }
 
    
})