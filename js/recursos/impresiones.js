// var ruta = ruta();
$(document).ready(function(){
    var total = 0;
    var envio = 0;
    if(localStorage.getItem("listaProductos")!=null){
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        listaCarrito.forEach(funcionForEach);
        $("#subtotal").html('$ '+number_format(total,2)+' MXN');
        $("#subtotal").attr("total",(number_format(total,2) ) );
        
        $("#envio").html('$ '+number_format(envio,2)+' MXN');
        $("#total").html('$ '+number_format(total+envio,2)+' MXN');
        function funcionForEach(item,index){
            $("#listaCarrito").append(`
            <tr>
                <td>`+item.cantidad+`</td>
                <td>`+item.nombre+`</td>
                <td>$ `+number_format(item.precio,2)+`</td>
                <td>$ `+number_format(item.precio*item.cantidad,2)+`</td>
            </tr>
            
            `);
            total= parseFloat(item.precio*item.cantidad)+parseFloat(total);
        }
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