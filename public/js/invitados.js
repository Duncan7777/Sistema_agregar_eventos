$(document).ready(function(){
    $('#tablaInvitados').load('listados/tabla_invitados.php');
});

function agregarInvitado(){
    $ajax({
        type:"POST",
        data:$('#frmAgregarInvitado').serialize(),
        url:"../servidor/invitados/agregar.php",
        success:function(respuesta){
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