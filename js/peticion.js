//  $(obtener_registros());

//  function obtener_registros(productos)
//  {
// 	 $.ajax({
// 		 url : 'php/busquedaProd.php',//Archivo donde Esta realizando la peticion
//  		type : 'POST',//Metodo
//  		dataType : 'html',//Documento que Envia los datos
//  		data : { productos: productos },//Obtiene las Letras y Las manda en un objeto
// 	})
	
// 	.done(function(resultado){
// 		$("#Targeta").html(resultado);//Si se resuelve la peticion de Sevuelven los datos al lugar Especificado
// 	});
//  }
// //Buscar al precionar cualquier tecla
// // $(document).on('keypress', '#buscarProd', function()//Al precionar una tecla dentro de el input de texto
// // {
// // 	 var valorBusqueda=$(this).val();//Toma los valores
// // 	 buscar(valorBusqueda);
	 
// // });

// // Al precionar enter

// $("#buscarProd").keypress(function(e) {
// 	if(e.which == 13) {
// 		var valorBusqueda=$(this).val();//Toma los valores
// 		console.log(valorBusqueda);
// 		buscar(valorBusqueda);
// 	}
//   });

// function buscar(valorBusqueda){
// 	if (valorBusqueda!=""){
// 		obtener_registros(valorBusqueda);//Toma los valores y los envia a la funcion
// 	}
// 	else{
// 	   obtener_registros();//No importa si no tiene registros
//    }
// }
// function buscarCategoria(valorBusqueda){

// }