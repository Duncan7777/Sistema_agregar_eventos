<?php
     include "../../clases/Invitados.php";
     $Invitados = new Invitados();
     $id_invitados = $_POST['id_invitados'];
     echo $Invitados->eliminarInvitado($id_invitados);
?>