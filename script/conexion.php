<?php
  $conexion = mysqli_connect('localhost', 'root', '', 'inventario');

  if (!$conexion) {
    die("Falló la conexión: ". mysqli_connect_error());
  }