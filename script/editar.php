<?php
  include_once '../script/conexion.php';
  include_once '../script/funciones.php';

  $id = $_POST['id'];
  $isbn = $_POST['isbn'];
  $titulo = $_POST['titulo'];
  $autor = $_POST['autor'];
  $paginas = $_POST['paginas'];
  $editorial = $_POST['editorial'];
  $edicion = $_POST['edicion'];
  $idioma = $_POST['idioma'];
  $precio = $_POST['precio'];
  
  editarDato($conexion, $id, $isbn, $titulo, $autor, $paginas, $editorial, $edicion, $idioma, $precio);

  header('location: ../paginas/index.php?msg=edicionexitosa');
?>