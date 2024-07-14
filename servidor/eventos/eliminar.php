<?php session_start();
      include "../../clases/Eventos.php";
      $Eventos = new Eventos();
      $id_eventos = $_POST['id_eventos'];
      echo $Eventos->eliminarEvento($id_eventos);

?>