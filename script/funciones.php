<?php
  include_once 'svgs.php';

  function mostrarInfo($conexion, $filtro) {
    if (isset($filtro) === true) {
      $sql = mysqli_query($conexion, "SELECT * FROM `libros` WHERE isbn LIKE '%$filtro%' or titulo LIKE '%$filtro%' or autor like '%$filtro%' or editorial like '%$filtro%' or precio like '%$filtro%'; ");
    } else {
      $sql = mysqli_query($conexion, "SELECT * FROM `libros` WHERE 1;");
    }

    if (mysqli_num_rows($sql) == 0) {
      echo "<tr><td colspam = 5>No hay datos</td></tr>";
    } else {
      while ($fila = mysqli_fetch_assoc($sql)) {
        echo "<tr>
        <td class='borde-izq'><input type='checkbox' id='cbox".$fila['ID']."' value='".$fila['ID']."'></td>
        <td>".$fila['isbn']."</td>
        <td>".utf8_encode($fila['titulo'])."</td>
        <td>".utf8_encode($fila['autor'])."</td>
        <td>".$fila['paginas']."</td>
        <td>".utf8_encode($fila['editorial'])."</td>
        <td>".$fila['edicion']."</td>
        <td>".utf8_encode($fila['idioma'])."</td>
        <td>$".$fila['precio']."</td>
        <td>
        <a class='no-bkg eliminar-dato' href='' id='".$fila['ID']."'>".generarSVGeliminar()."</a>
        <a class='no-bkg editar-dato' href='editar.php?id=".$fila['ID']."'>".generarSVGeditar()."</a>
        </td>
      </tr>";
      }
    }
  }

  function mostrarDatos($conexion, $id) {
    if ($id === false) {
      echo "<div class='container'>
        <label for='isbn'>Código ISBN:</label>
        <input type='text' name='isbn' value='' required>
      </div>
      <div class='container'>
        <label for='titulo'>Titulo:</label>
        <input type='text' name='titulo' value='' required>
      </div>
      <div class='container'>
        <label for='autor'>Autor/a:</label>
        <input type='text' name='autor' value='' required>
      </div>
      <div class='container'>
        <label for='paginas'>Cantidad de páginas:</label>
        <input type='number' name='paginas' value='' min='0' required>
      </div>
      <div class='container'>
        <label for='editorial'>Editorial:</label>
        <input type='text' name='editorial' value='' required>
      </div>
      <div class='container'>
        <label for='edicion'>Edición:</label>
        <input type='text' name='edicion' value='' required>
      </div>
      <div class='container'>
        <label for='idioma'>Idioma:</label>
        <input type='text' name='idioma' value='' required>
      </div>
      <div class='container ultimo'>
        <label for='precio'>Precio:</label>
        <input type='number' name='precio' min='0' value='' required>
      </div>

      <input class='btn' type='submit' value='Aceptar'>";
    } else {
      $sql = mysqli_query($conexion, "SELECT * FROM `libros` WHERE ID = '$id' ");
      $fila = mysqli_fetch_assoc($sql);

      echo "<div class='container'>
        <label for='isbn'>Código ISBN:</label>
        <input type='text' name='isbn' value='".$fila['isbn']."' required>
      </div>
      <div class='container'>
        <label for='titulo'>Titulo:</label>
        <input type='text' name='titulo' value='".utf8_encode($fila['titulo'])."' required>
      </div>
      <div class='container'>
        <label for='autor'>Autor/a:</label>
        <input type='text' name='autor' value='".utf8_encode($fila['autor'])."' required>
      </div>
      <div class='container'>
        <label for='paginas'>Cantidad de páginas:</label>
        <input type='text' name='paginas' value='".$fila['paginas']."' required>
      </div>
      <div class='container'>
        <label for='editorial'>Editorial:</label>
        <input type='text' name='editorial' value='".utf8_encode($fila['editorial'])."' required>
      </div>
      <div class='container'>
        <label for='edicion'>Edición:</label>
        <input type='text' name='edicion' value='".$fila['edicion']."' required>
      </div>
      <div class='container'>
        <label for='idioma'>Idioma:</label>
        <input type='text' name='idioma' value='".utf8_encode($fila['idioma'])."' required>
      </div>
      <div class='container ultimo'>
        <label for='precio'>Precio:</label>
        <input type='number' name='precio' min='0' value='".$fila['precio']."' required>
      </div>

      <input class='btn' type='submit' value='Aceptar'>";
    }
  }

  function agregarDato($conexion, $isbn, $titulo, $autor, $paginas, $editorial, $edicion, $idioma, $precio) {
    $sql = mysqli_query($conexion, "INSERT INTO libros (isbn, titulo, autor, paginas, editorial, edicion, idioma, precio) VALUES ('$isbn', '$titulo', '$autor', '$paginas', '$editorial', '$edicion', '$idioma', '$precio'); ");
  }

  function editarDato($conexion, $id, $isbn, $titulo, $autor, $paginas, $editorial, $edicion, $idioma, $precio) {
    $sql = mysqli_query($conexion, "UPDATE libros SET isbn = '$isbn', titulo = '$titulo', autor = '$autor', paginas = '$paginas', editorial = '$editorial', edicion = '$edicion', idioma = '$idioma', precio = '$precio' WHERE ID = '$id'; ");
  }

  function eliminarDato($conexion, $id) {
    //poner mensajes de error y exito
    //pedir confirmacion
    $sql = mysqli_query($conexion, "DELETE FROM `libros` WHERE ID = '$id' ");
  }
?>