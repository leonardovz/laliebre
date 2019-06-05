var ruta =ruta();
$(document).ready(function() {
    $("input").focus(function(){
        $(".alert").remove();
    });

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
        var nombre = $("#nombre").val();
        var apellidos = $("#apellidos").val();
        var correo = $("#correo").val();
        var pass = $("#password1").val();
        var passR = $("#password2").val();
        // ------------------------ //
        //-----Validar contraseña-- //
        // ------------------------ //
        if(nombre != ""){
            var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
            if(!expresion.test(nombre)){
                errores +=1;
                $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> No se permiten Caracteres especiales  </div>');
            }
        }else{
            errores +=1;
            $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Contraseña obligatoria </div>');
        }
        if(apellidos != ""){
            var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
            if(!expresion.test(apellidos)){
                errores +=1;
                $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> No se permiten Caracteres especiales </div>');
            }
        }else{
            errores +=1;
            $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Contraseña obligatoria </div>');
        }
        if(pass != ""){
            var expresion = /^[a-zA-Z0-9]*$/;
            if(!expresion.test(pass)){
                errores +=1;
                $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> No se permiten Caracteres especiales solo @ </div>');
            }
        }else{
            errores +=1;
            $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Contraseña obligatoria </div>');
        }
        
        if(pass!=passR){
            $("#errores").append('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Las contraseñas no coinciden </div>');
            errores +=1;
        }

        // ------------------------ //
        //-----Validar correo------ //
        // ------------------------ //
        if(correo != ""){
            var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            if(!expresion.test(correo)){
                errores +=1;
                $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> El correo no esta escrito de forma correcta</div>');
            }
        }else{
            errores +=1;
            $("#errores").append('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Correo obligatoria </div>');
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
                            type: 'success',
                            title: '¡Exito!...',
                            text: data.Texto
                        });
                        
                        $('#registrarme')[0].reset();
                        setTimeout(function(){
                            window.location.replace(ruta);
                        },4000,"JavaScript");
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: data.Texto
                        });
                    }
                    // console.log(data);
                }
            
            });
        }
    });
    if(localStorage.getItem("listaProductos")!=null){
        console.log("Entro");
        var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
        var total = 0;
        listaCarrito.forEach(funcionForEach);
        $("#cantidad").html(total);
        function funcionForEach(item,index){
            total++;
            $("#items").append(`
            <li>
                <a href="`+ruta+'carrito'+`">
                <div class="pull-left">
                    <img src="`+ruta+item.imagen+`" class="img-circle" alt="User">
                </div>
                <h4>
                    `+item.nombre+`
                </h4>
                <p>`+item.cantidad+`</p>
                </a>
            </li>
            `);
        }

    }
    function timeout(){
        setTimeout(function(){
            location.reload();
        },2000,"JavaScript");
    }

});
