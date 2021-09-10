<?php
  include_once '../script/conexion.php';
  include_once '../script/funciones.php';

  $id = false;

  if (isset($_GET["id"])) {
    $id = $_GET['id'];
  }
  
  eliminarDato($conexion, $id);
  header("location: ../paginas/index.php?msg=borradoexitoso");
?>