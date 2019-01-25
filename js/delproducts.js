var producto = document.querySelector('#tablaProductos td');

producto.addEventListener('click',function(){
    console.log('Hace Click');
})



function eliminarContacto(e) {
    if( e.target.parentElement.classList.contains('btn-borrar') ) {
         // tomar el ID
         const id = e.target.parentElement.getAttribute('data-id');

         // console.log(id);
         // preguntar al usuario
         const respuesta = confirm('¿Estás Seguro (a) ?');

         if(respuesta) {
              // llamado a ajax
              // crear el objeto
              const xhr = new XMLHttpRequest();

              // abrir la conexión
              xhr.open('GET', `inc/modelos/modelo-contactos.php?id=${id}&accion=borrar`, true);

              // leer la respuesta
              xhr.onload = function() {
                   if(this.status === 200) {
                        const resultado = JSON.parse(xhr.responseText);
                     
                        if(resultado.respuesta == 'correcto') {
                             // Eliminar el registro del DOM
                             console.log(e.target.parentElement.parentElement.parentElement);
                             e.target.parentElement.parentElement.parentElement.remove();

                             // mostrar Notificación
                             mostrarNotificacion('Contacto eliminado', 'correcto');

                             // Actualizar el número
                             numeroContactos();
                        } else {
                             // Mostramos una notificacion
                             mostrarNotificacion('Hubo un error...', 'error' );
                        }

                   }
              }

              // enviar la petición
              xhr.send();
         }
    }
}