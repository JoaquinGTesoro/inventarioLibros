<?php
  include 'funciones.php';
  include 'conexion.php';

  $filtro = 'Addie';

  if (isset($_GET["$filtro"])) {
    $filtro = $_GET['$filtro'];
  }

  mostrarInfo($conexion, $filtro);
?>