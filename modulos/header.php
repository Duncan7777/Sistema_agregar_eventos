<?php session_start(); 
  if (!isset($_SESSION['usuario'])) {
    header("location:index.php");
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/librerias/fontawesome-free-6.5.2-web/css/all.css">
    <link rel="stylesheet" href="../public/librerias/datatables/datatables.css">
    <link rel="stylesheet" href="../public/css/estilos.css">
    <link rel="stylesheet" herf="../public/css/menu.css">
    <title>FIEI RSU </title>
  </head>
  <body>