var ruta = ruta();
$(document).ready(function(){
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass   : 'iradio_flat-red'
      });
      $('.select2').select2();
      //Money Euro
      $('[data-mask]').inputmask();
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-red',
        radioClass   : 'iradio_flat-green'
      });
    
    $.ajax({
        url: ruta+'php/ajax.php',
        type: 'POST',
        data: 'opcion=categoriaOption',
        error: function(xhr,status) {
            $('#targeta').html("Ocurrio un error al realizar la peticion al servidor");
        },
        success: function(resp) {
            $('#contCategoria').html(resp);
            console.log(resp);
            $('.select2').select2();
        }
      });
    $("#inGaleria").change(function(){
          var imagen = document.getElementById("inGaleria");
          validarImagen(imagen);
      });
    $('#registroCategoria').on('submit',function(e){
        $(".alert").remove();
        e.preventDefault();
        var nombreCat      = $('#nombreCategoria').val();
        var errores = 0;
        if(nombreCat != ""){
            var expresion =/^[a-zA-Z0-9 áéíóúÁÉÍÓÚ ,. #-]*$/;
            if(!expresion.test(nombreCat)){
                errores +=1;
                swal(' No puedes ingresar caracteres especiales en le Nombre ');
            }
        }else{
            errores +=1;
            swal(' ERROR:  <small class="fs-18">Nombre de producto obligatorio</small>');
        }
        
        console.log(errores);
        if(errores == 0 ){
            Swal.fire({
                title: 'Atengo!',
                text: "Estas apunto de agregar una nueva Categoria",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, continuar!'
              }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: ruta+'php/ajax.php',
                        type: 'POST',
                        data: 'opcion=nuevaCategoria&nombreCat='+nombreCat,
                        dataType: 'json',
                        error: function(xhr,status) {
                            $('#targeta').html("Ocurrio un error al realizar la peticion al servidor");
                        },
                        success: function(data) {
                            if (data.respuesta == 'exito') {
                                Swal.fire({
                                    position: 'top-end',
                                    type: 'success',
                                    title: data.Texto,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                $("#registroCategoria")[0].reset();
                            } else {
                                swal({
                                    type: 'error',
                                    title: 'Oops...',
                                    text: data
                                });
                            }
                        }
                    });
                }
              });
        }

    });
    $('#nuevoProducto').on('submit',function(e){
        $(".alert").remove();
        e.preventDefault();
        var nombreProd      = $('#nombreProd').val(),
            Descripcion         = $('#Descripcion').val(),
            categoria           = $('#categoria').val(),
            precio              = $('#precio').val();
        var imagen = document.getElementById("inGaleria");
        var formData = new FormData($(this)[0]);
        var checados = 0;
        var errores = 0;

        var archivo = "registrarProductos.php";
       
        validarImagen(imagen);
        
        if(nombreProd != ""){
            var expresion =/^[a-zA-Z0-9 áéíóúÁÉÍÓÚ ,. #-]*$/;
            if(!expresion.test(nombreProd)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> No puedes ingresar caracteres especiales en le Nombre </div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Nombre de producto obligatorio</div>');
        }
        if(categoria != ""){
            var expresion =/^[0-9]*$/;
            if(!expresion.test(categoria)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Categoria incorrecta </div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Selecciona una categoria</div>');
        }
        if(precio != ""){
            var expresion =/^[0-9.]*$/;
            if(!expresion.test(precio)){
                errores +=1;
                $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Caracteres invalidos en el precio </div>');
            }
        }else{
            errores +=1;
            $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Precio obligatorio</div>');
        }
        $('input[type=radio]:checked').each(function() {
            // console.log("Checkbox " + $(this).prop("id") +  " (" + $(this).val() + ") Seleccionado");
            checados++;
            var valor = $(this).val();
            if(valor != ""){
                var expresion =/^[a-zA-Z/]*$/;
                if(!expresion.test(valor)){
                    errores +=1;
                    $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Error al seleccionar la ubicación de la publicación </div>');
                }
            }else{
                errores +=1;
                $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Selecciona almenos una Ubicación obligatorio</div>');
            }
        });
        if(checados == 0 ){
            errores +=1;
            $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Selecciona almenos una Ubicación obligatorio</div>');
        }
        if(Descripcion == "" && Descripcion.length < 200){
            errores +=1;
            $("#errores").html('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> tienes que agregar contenido a la publicación al menos 200 caracteres</div>');
        }
        console.log(errores);
        if(errores == 0 ){
            registrarAJAX(formData,archivo,this);
        }

    });
    
    function registrarAJAX(formData,archivo,idform){
        
        $.ajax({
            url: ruta + 'php/registrarProducto.php',
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            error : function(xhr, status) {
                $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> Ocurrio un error al enviar la petición'+JSON.stringify(xhr)+' </div>');
            },
            success: function (data) {
                // data = JSON.stringify(data);
                console.log(data);
                if (data.respuesta == 'exito') {
                    Swal.fire({
                        position: 'top-end',
                        type: 'success',
                        title: data.Texto,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $(idform)[0].reset();
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: data
                    });
                }
            }
        });
    }

    function validarImagen(obj){
        var uploadFile = obj.files[0];
        var control = $('#inGaleria');
    
        if (!window.FileReader) {
            Swal.fire('El navegador no soporta la lectura de archivos');
             return;
        }
    
        if (!(/\.(jpg|png|gif)$/i).test(uploadFile.name)) {
            Swal.fire('El archivo a adjuntar no es una imagen');
            control.replaceWith( control = control.val('').clone( true ) );
        }
        else {
            var img = new Image();
            img.onload = function () {
                if (this.width.toFixed(0) !=  this.height.toFixed(0)  && ( this.width.toFixed(0)<950 || this.width.toFixed(0)> 1200 ) )  {
                    swal.fire('Las medidas deben ser: cuadradas entre 1200 y 900 px');
                    control.replaceWith( control = control.val('').clone( true ) );
                }
                else if (uploadFile.size > 750000)
                {
                    swal.fire('El peso de la imagen no puede exceder los 0.750 mb');
                    control.replaceWith( control = control.val('').clone( true ) );
                }
            };
            img.src = URL.createObjectURL(uploadFile);
        }                 
    }

});