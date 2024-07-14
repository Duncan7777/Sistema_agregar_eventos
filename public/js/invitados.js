$(document).ready(function(){
    $('#tablaInvitados').load('listados/tabla_invitados.php');
});

function agregarInvitado(){
    $.ajax({
        type:"POST",
        data:$('#frmAgregarInvitado').serialize(),
        url:"../servidor/invitados/agregar.php",
        success:function(respuesta) {
            if(repuesta == 1){
                $('#tablaInvitados').load('listados/tabla_invitados.php');
                $('#frmAgregarInvitado')[0].reset();
                Swal.fire({
                    title: 'Exito!',
                    text: 'Agregado',
                    icon: 'success'
                    
                  })

            } else{
                Swal.fire({
                    title: 'Error!',
                    text: 'Fallo con '+ respuesta,
                    icon: 'error'
                    
                  })
            }

        }
    });
    
    return false;
}

function eliminarInvitado(id_invitados){
    Swal.fire({
        title: "Esta seguro de eliminar este invitado?",
        text: "Si lo elimina no podra ser recuperado!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Eliminar!"
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type:"POST",
            data:'id_invitados=' + id_invitados,
            url:"../servidor/invitados/eliminar.php",
            success:function(respuesta) {   
                if(repuesta == 1){
                    $('#tablaInvitados').load('listados/tabla_invitados.php');
                    Swal.fire({
                        title: 'Exito!',
                        text: 'Eliminado',
                        icon: 'success'
                        
                      });
    
                } else{
                    Swal.fire({
                        title: 'Error!',
                        text: 'Fallo con '+ respuesta,
                        icon: 'error'
                        
                      })
                }
    
            }
        });
        }
      });
}