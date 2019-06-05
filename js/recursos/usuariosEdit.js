// var ruta = ruta();
$(document).ready(function() {
    var banderaDatatable = true;
    $("input").focus(function(){
        $(".alert").remove();
    });
    
    
    ActualizarUsuarios();

    function tabladedatos(){
    $("#tabla").DataTable({
        "order": [
            [0, "asc"]
        ],
        "language": {
            "lengthMenu": "Ver _MENU_ registros por página.",
            "info": "Página _PAGE_ de _PAGES_.",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrada de _MAX_ registros)",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "No se encontraron registros coincidentes",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    }
      
    function ActualizarUsuarios(){
        $('#contenedorPersonal').html(`
            <table id="tabla" class="table table-striped">
                <thead>
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th>Correo</th>
                        <th>Feecha Registro</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="rowUsuario">

                </tbody>
            </table>
        `);
        $.ajax({
            url: ruta+'php/ajax.php',
            type: 'POST',
            data: 'opcion=traerUsuarios',
            error:function(xhr,status) {
                console.log(JSON.stringify(xhr));
            },
            success: function(resp) {
                $("#rowUsuario").html(resp);
                updateTrabajador();
                tabladedatos();
                
            }
        });
    }
    
    function updateTrabajador(){
        $('.delUsuario').off('click').on('click',function(){
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "Una vez eliminado no lo podras revertir",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!'
                }).then((result) => {
                if (result.value) {
                    var usuario = $(this).attr('idusuario');
                    // console.log(usuario);
                    eliminarUsuario(usuario);
                }
            });
        })
        $('.activarUser').off('click').on('click',function(){
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "Estas apunto de activar",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!'
                }).then((result) => {
                if (result.value) {
                    var usuario = $(this).attr('idusuario');
                    // console.log(usuario);
                    activarUsuario(usuario,1);
                }
            });
        })
        $('.bloquearUser').off('click').on('click',function(){
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "Estas apunto de bloquear",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, actualizar!'
                }).then((result) => {
                if (result.value) {
                    var usuario = $(this).attr('idusuario');
                    // console.log(usuario);
                    activarUsuario(usuario,0);
                }
            });
        })
    }
    function eliminarUsuario(idUsuario){
        $.ajax({
            url: ruta+'php/ajax.php',
            type: 'POST',
            data: 'opcion=eliminarUsuario&idUsuario='+idUsuario,
            dataType: 'json',
            error:function(xhr,status){
                console.log(JSON.stringify(xhr) );
            },
            success: function(resp) {
                console.log(resp);
                if (resp.respuesta == 'exito') {
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: resp.Texto,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    ActualizarUsuarios();
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: resp.Texto
                    });
                }
            }
        });
    }
    function activarUsuario(idUsuario,estado){
        $.ajax({
            url: ruta+'php/ajax.php',
            type: 'POST',
            data: 'opcion=activarUsuario&idUsuario='+idUsuario+'&status='+estado,
            dataType: 'json',
            error:function(xhr,status){
                console.log(JSON.stringify(xhr) );
            },
            success: function(resp) {
                console.log(resp);
                if (resp.respuesta == 'exito') {
                    swal({
                        position: 'top-end',
                        type: 'success',
                        title: resp.Texto,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    ActualizarUsuarios();
                } else {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: resp.Texto
                    });
                }
            }
        });
    }


});