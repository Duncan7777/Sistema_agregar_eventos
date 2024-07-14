<?php
  include "../../clases/Invitados.php";
  $Invitados = new Invitados();
  $items = $Invitados->mostrarInvitados();
?>

<style>
    #tabla_invitados_load {
        width: 100%;
        table-layout: fixed;
    }
    #tabla_invitados_load th, #tabla_invitados_load td {
        width: 20%;
        text-align: center;
    }
</style>


<table class="table table-sm table-hover" id="tabla_invitados_load">
    <thead>
        <tr>
            <th>Invitado</th>
            <th>Email</th>
            <th>Evento</th>
            <th>Fecha</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>

    </thead>
    <tbody>
       <?php
       foreach ($items as $key):?> 
        <tr>
            <td><?php echo $key['nombre']?></td>
            <td><?php echo $key['email']?></td>
            <td><?php echo $key['nombreEvento']?></td>
            <td><?php echo $key['fechaEvento']?></td>
            <td>
                <span class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal_editar_invitado">
                <i class="fa-solid fa-pen-to-square"></i>
            </span>
            </td>
            <td>
                <span class="btn btn-danger" onclick="eliminarInvitado('<?php echo $key['idInvitado'] ?>')"> 
                <i class="fa-solid fa-trash-can-arrow-up"></i>

                </span>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>
    $(document).ready(function(){
    $('#tabla_invitados_load').DataTable();
});
</script>