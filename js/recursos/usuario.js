var ruta = ruta();
$(document).ready(function(){
    $('#pswd_info').hide();
    $('#pswdR_info').hide();
    $(".select2").select2();
    $('[data-mask]').inputmask();

    $("#dependencia").ready(function(){
        traerDependencias();
        function traerDependencias(){
            $.ajax({
                url: ruta+'php/ajax.php',
                type: 'POST',
                data:'opcion=traerDependencia',
                success: function(resp){
                $("#dependencia").html(resp);
                }
            });
        }
    });
    var pass = 0, pass2=0;
    $('#inPassword').keyup(function() {
        // set password variable
        var pswd = $(this).val();
        //validate the length
        if ( pswd.length < 8 ) {
            $('#length strong').removeClass('text-success').addClass('text-danger');
            pass = 0;
        } else {
            $('#length strong').removeClass('text-danger').addClass('text-success');
            pass = 1;
        }

        //validate letter
        if ( pswd.match(/[A-z]/) ) {
            $('#letter strong').removeClass('text-danger').addClass('text-success');
            pass = 0;
        } else {
            $('#letter strong').removeClass('text-success').addClass('text-danger');
            pass = 1;
        }

        //validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital strong').removeClass('text-danger').addClass('text-success');
            pass = 0;
        } else {
            $('#capital strong').removeClass('text-success').addClass('text-danger');
            pass = 1;
        }

        //validate number
        if ( pswd.match(/\d/) ) {
            $('#number strong').removeClass('text-danger').addClass('text-success');
            pass = 0;
        } else {
            $('#number strong').removeClass('text-success').addClass('text-danger');
            pass = 1;
        }
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    });

    $('#inPasswordR').change(function() {
        var pass = $(this).val();
        var passR = $("#inPassword").val();
        if(pass != passR){
            $('#pswdR_info').show();
            pass2 = 1;
        }else{
            $('#pswdR_info').hide();
            pass2 = 0;
        }

    });
    $('#inPassword').change(function() {
        var pass = $(this).val();
        var passR = $("#inPasswordR").val();
        if(pass != passR){
            $('#pswdR_info').show();
            pass2 = 1;
        }else{
            $('#pswdR_info').hide();
            pass2 = 0;
        }

    });
    $("#formRegistroUser").on('submit',function(e){
        e.preventDefault();
        var correo = $('#correo').val(),
            telefono = $('#telefono').val(),
            inNombre = $('#inNombre').val(),
            inApellidos = $('#inApellidos').val(),
            inRangoUser = $('#inRangoUser').val();
        var formulario = $(this).serializeArray();

        $(".alert").remove();

        var errores = 0;

        if(inNombre != ""){
            var expresion =/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
            if(!expresion.test(inNombre)){
                errores +=1;
                $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Caracteres invalidos en el campo Nombre </div>');
            }
        }else{
            errores +=1;
            $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Nombre obligatorio </div>');
        }
        
        // ------------------------ //
        //-----Validar Apellidos -- //
        // ------------------------ //
        if(inApellidos != ""){
            var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
            if(!expresion.test(inApellidos)){
                errores +=1;
                $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Caracteres invalidos en el campo Apellidos </div>');
            }
        }else{
            errores +=1;
            $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Apellidos obligatorios </div>');
        }
        // ------------------------ //
        //-----Validar Rol -- //
        // ------------------------ //
        if(inRangoUser != ""){
            var expresion = /^[0-6]*$/;
            if(!expresion.test(inRangoUser)){
                errores +=1;
                $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Caracteres invalidos en el campo Rol </div>');
            }
        }else{
            errores +=1;
            $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Rol obligatorio </div>');
        }


        // ------------------------ //
        //-----Validar correo------ //
        // ------------------------ //
        if(correo != ""){
            var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
            if(!expresion.test(correo)){
                errores +=1;
                $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> El correo no esta escrito de forma correcta</div>');
            }
        }else{
            errores +=1;
            $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Correo obligatoria </div>');
        }
        // --------------------------- //
        // ---Validar Telefono--- //
        // --------------------------- //
        if(telefono == ""){
            errores +=1;
            $("#errores").after('<div class="alert alert-warning fs-16" role="alert"> <small class="fs-18">ERROR: </small> Telefono Postal obligatorio </div>');
        }
        // errores +=  pass + pass2;
        if(errores == 0){
            Swal.fire({
              title: '¿Estas Seguro?',
              text: "Una Ves Registrado no podrias hacer modificaciones",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: '¡Si, Guardar!'
            }).then((result) => {
              if (result.value) {
                //  registroUser(formulario)
              }
            });
            
        }
    });
    function registroUser(formulario){
        $.ajax({
            type: 'post',
            url: ruta + 'php/usuario.php',
            data: formulario,
            dataType: 'json',
            error : function(xhr, status) {
                $("#errores").html('<div class="alert alert-danger fs-16" role="alert"> <small class="fs-18">ERROR: </small> '+(xhr.responseText)+' No se pudo enviar el formulario, si el problema persiste consulte a el programador </div>');
            },
            success: function (data) {
                if (data.respuesta == 'exito') {
                    Swal.fire({
                        type: 'success',
                        title: 'Registrado',
                        text: data.Texto
                    });
                    $("#formRegistroUser")[0].reset();
                    // traerEjeTransTabla();
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: data.Texto
                    });
                }
            }
        });
    }
});