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

    if(localStorage.getItem("listaProductos")!=null){
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        listaCarrito.forEach(funcionForEach);
        $("#subtotal").html('$ '+number_format(total,2)+' MXN');
        $("#subtotal").attr("total",(total ) );
        carnalitos();
        function funcionForEach(item,index){
            // console.log("item",item.idproducto);
            $("#listaCarrito").after(`
            <tr class="table_row">
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

                        <input class="mtext-104 cl3 txt-center num-product" type="text" name="num-product1" value="1">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </td>
                <td class="column-5">`+number_format(item.precio,2)+`</td>
            </tr>
            `);
            total= parseFloat(item.precio)+parseFloat(total);
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
            costoprod = $(this).parent().parent().siblings('.column-3').attr('precio');
            totalSuma=number_format(parseFloat((totalProd) * parseFloat(costoprod) ) ,2 );
            
            $(this).siblings('.num-product').val(totalProd);
            $(this).parent().parent().siblings('.column-5').html('$ '+totalSuma);
            // En Proceso
            totalFinal = $("#subtotal").attr("total");
            $("#subtotal").attr("total",(number_format(parseFloat(totalFinal) + parseFloat(costoprod),2 ) ) );
            $("#subtotal").html('$ '+number_format(parseFloat(totalFinal)+parseFloat(costoprod) ,2 ) +' MXN');
        });
        $(".btn-num-product-down").on('click',function(params) {
            totalProd = $(this).siblings('.num-product').val()
            if((totalProd-1) > 0 ){
                totalProd=parseInt(totalProd)-1;
                costoprod = $(this).parent().parent().siblings('.column-3').attr('precio');
                totalSuma=number_format(parseFloat((totalProd)* parseFloat(costoprod) ) ,2 );
                $(this).siblings('.num-product').val(totalProd);
                $(this).parent().parent().siblings('.column-5').html('$ '+totalSuma);
                totalFinal = $("#subtotal").attr("total");
                $("#subtotal").attr("total",(number_format(parseFloat(totalFinal) -  parseFloat(costoprod),2 ) ) );
                $("#subtotal").html('$ '+number_format(parseFloat(totalFinal)- parseFloat(costoprod) ,2 ) +' MXN');
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
                      //  registroUser(formulario)
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
                      //  Aliminar del Local Storage
                    }else{
                        $(this).val(1);
                    }
                  });
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

})