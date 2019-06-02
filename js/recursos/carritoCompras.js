var ruta = ruta();
$(document).ready(function(){
    var total = 0;
    if(localStorage.getItem("listaProductos")!=null){
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        listaCarrito.forEach(funcionForEach);
        sumarProductos(total);
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

                        <input class="mtext-104 cl3 txt-center num-product" type="text" id="totalProd" name="num-product1" value="1">

                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                            <i class="fs-16 zmdi zmdi-plus"></i>
                        </div>
                    </div>
                </td>
                <td class="column-5">$ 36.00</td>
            </tr>
            `);
            total= parseFloat(item.precio)+parseFloat(total);
            console.log(total);
        }
    }

    function carnalitos (){
        var totalProd=0,
            costoprod = 0,
            totalSuma = 0;
        $(".btn-num-product-up").on('click',function(params) {
            totalProd = $(this).siblings('.num-product').val()
            costoprod = $(this).parent().parent().siblings('.column-3').attr('precio');
            totalSuma=number_format(parseFloat((totalProd)* parseFloat(costoprod) ) ,2 );
            totalProd=parseInt(totalProd)+1;
            $(this).siblings('.num-product').val(totalProd);
            $(this).parent().parent().siblings('.column-5').html('$ '+totalSuma);            
        });
        $(".btn-num-product-down").on('click',function(params) {
            totalProd = $(this).siblings('.num-product').val()
            costoprod = $(this).parent().parent().siblings('.column-3').attr('precio');
            totalProd=parseInt(totalProd)-1;
            totalSuma=number_format(parseFloat((totalProd)* parseFloat(costoprod) ) ,2 );
            $(this).siblings('.num-product').val(totalProd);
            $(this).parent().parent().siblings('.column-5').html('$ '+totalSuma);            
        });
    }
    function sumarProductos(total){
        $("#subtotal").html('$ '+number_format(total,2)+' MXN');
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