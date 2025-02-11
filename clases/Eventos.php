<?php
  include "Conexion.php";

  class Eventos extends Conexion{
    public function mostrarEventos() {
        $Conexion = Conexion::conectar();
        $sql = "SELECT * FROM t_eventos";
        $respuesta = mysqli_query($Conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);    
    }

    public function editarEvento($id_eventos) {
        $Conexion = Conexion::conectar();
        $sql = "SELECT id_eventos,
                       evento,
                       DATE_FORMAT(hora_inicio, '%H:%i:%s') AS hora_inicio,
                       DATE_FORMAT(hora_fin, '%H:%i:%s') AS hora_fin,
                       fecha
                         
                FROM 
                       t_eventos 
                WHERE  id_eventos = '$id_eventos'";
        $respuesta = mysqli_query($Conexion, $sql);
        return mysqli_fetch_all($respuesta, MYSQLI_ASSOC);    
    }

    public function agregar($data){
      $conexion = Conexion::conectar();
      $sql = "INSERT INTO t_eventos (id_usuario,
                                     evento,  
                                     hora_inicio,
                                     hora_fin,
                                     fecha) 
                      VALUES (?, ?, ?, ?, ?)";
      $query = $conexion->prepare($sql);
      $query->bind_param('issss', $data['id_usuario'],
                                  $data['evento'],
                                  $data['hora_inicio'],
                                  $data['hora_fin'],
                                  $data['fecha'],);
      return $query->execute();
                                  
    }

    public function eliminarEvento($id_eventos){
      $conexion = Conexion::conectar();
      $sql = "DELETE FROM t_eventos WHERE id_eventos = ?";
      $query = $conexion->prepare($sql);
      $query->bind_param('i', $id_eventos);
      return $query->execute();
    }

    public function actualizarEvento($data){
      $conexion = Conexion::conectar();
      $sql = "UPDATE t_eventos SET id_usuario = ?,
                                  evento = ?,
                                  hora_inicio = ?,
                                  hora_fin = ?,
                                  fecha = ?
              WHERE id_eventos = ?";
      $query = $conexion->prepare($sql);
      $query->bind_param('issssi', $data['id_usuario'],
                                   $data['evento'],
                                   $data['hora_inicio'],
                                   $data['hora_fin'],
                                   $data['fecha'],
                                   $data['id_eventos']);
      return $query->execute();
    }
}

