<?php
  include_once 'conexion.php';
  include_once 'funciones.php';

  $isbn = $_POST['isbn'];
  $titulo = $_POST['titulo'];
  $autor = $_POST['autor'];
  $paginas = $_POST['paginas'];
  $editorial = $_POST['editorial'];
  $edicion = $_POST['edicion'];
  $idioma = $_POST['idioma'];
  $precio = $_POST['precio'];
  
  agregarDato($conexion, $isbn, $titulo, $autor, $paginas, $editorial, $edicion, $idioma, $precio);

  header('location: ../paginas/index.php?msg=ingresoexitoso');