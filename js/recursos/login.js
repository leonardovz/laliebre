// var ruta =ruta();
$(document).ready(function() {

    $('#login').on('submit',function(e){
        e.preventDefault();
        console.log("click");
        $(".alert").remove();
        var errores = 0;
        var formulario = $(this).serializeArray();
        var correo = $("#email").val();
        var pass = $("#password").val();
        // ------------------------ //
        //-----Validar contraseña-- //
        // ------------------------ //
        if(pass != ""){
            var expresion = /^[a-zA-Z0-9]*$/;
            if(!expresion.test(pass)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> No se permiten Caracteres especiales solo @ </div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Contraseña obligatoria </div>');
        }

        // ------------------------ //
        //-----Validar correo------ //
        // ------------------------ //
        if(correo != ""){
            var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            if(!expresion.test(correo)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> El correo no esta escrito de forma correcta</div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Correo obligatoria </div>');
        }

        if(errores == 0){ 
            console.log("clickeaste");
            var formulario = $(this).serializeArray();
            $.ajax({
                type: 'POST',
                url: ruta+'php/login.php',
                data: formulario,
                dataType: 'json',
                success: function (data) {
                    if (data.respuesta == 'exito') {
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: data.Texto,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        timeout();
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: data.Texto
                        });
                    }
                    console.log(data);
                }
            
            });
        }
    });
    $('#registrarme').on('submit',function(e){
        e.preventDefault();
        console.log("click");
        $(".alert").remove();
        var errores = 0;
        var formulario = $(this).serializeArray();
        var correo = $("#email").val();
        var pass = $("#password").val();
        // ------------------------ //
        //-----Validar contraseña-- //
        // ------------------------ //
        if(pass != ""){
            var expresion = /^[a-zA-Z0-9]*$/;
            if(!expresion.test(pass)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> No se permiten Caracteres especiales solo @ </div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Contraseña obligatoria </div>');
        }

        // ------------------------ //
        //-----Validar correo------ //
        // ------------------------ //
        if(correo != ""){
            var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            if(!expresion.test(correo)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> El correo no esta escrito de forma correcta</div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Correo obligatoria </div>');
        }

        if(errores == 0){ 
            // console.log("clickeaste");
            var formulario = $(this).serializeArray();
            $.ajax({
                type: 'POST',
                url: ruta+'php/registro.php',
                data: formulario,
                dataType: 'json',
                success: function (data) {
                    if (data.respuesta == 'exito') {
                        swal({
                            position: 'top-end',
                            type: 'success',
                            title: data.Texto,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        timeout();
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: data.Texto
                        });
                    }
                    console.log(data);
                }
            
            });
        }
    });
    // if(localStorage.getItem("listaProductos")!=null){
    //     console.log("Entro");
    //     var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
    //     var total = 0;
    //     listaCarrito.forEach(funcionForEach);
    //     $("#cantidad").html(total);
    //     function funcionForEach(item,index){
    //         total++;
    //         $("#items").append(`
    //         <li>
    //             <a href="`+ruta+'carrito'+`">
    //             <div class="pull-left">
    //                 <img src="`+ruta+item.imagen+`" class="img-circle" alt="User">
    //             </div>
    //             <h4>
    //                 `+item.nombre+`
    //             </h4>
    //             <p>`+item.cantidad+`</p>
    //             </a>
    //         </li>
    //         `);
    //     }

    // }
    function timeout(){
        setTimeout(function(){
            location.reload();
        },2000,"JavaScript");
    }

});
