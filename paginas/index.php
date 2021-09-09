<?php
  include_once '../script/conexion.php';
  include_once '../script/funciones.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../estilos/main.css">
  <link rel="stylesheet" href="../estilos/index.css">
  <title>Inventario</title>
</head>
<body>
  <div class="container">
    <header>
        <form class="filtro-container" action="index.php" method="GET">
          <img class="filtro-img" src="../media/filtro.svg" alt="">
          <input type="text" name="filtro" id="" placeholder="Filtrar libros">
          <button type="submit"><img src="../media/flecha.svg" alt="Enviar busqueda"></button>
        </form>
      <a class="nuevo" href="">+ Añadir nuevo libro</a>
    </header>
    <main>
      <table>
        <tr>
          <th class="borde-izq"></th>
          <th>Código ISBN</th>
          <th>Titulo del libro</th>
          <th>Autor/a</th>
          <th>Cant. páginas</th>
          <th>Editorial</th>
          <th>Edición</th>
          <th>Idioma</th>
          <th>Precio</th>
          <th></th>
        </tr>
        <?php
          $filtro = false;

          if (isset($_GET["filtro"])) {
            $filtro = $_GET['filtro'];
          }
        
          mostrarInfo($conexion, $filtro);
        ?>
      </table>
    </main>
      <a href="" class="eliminar"><img src="../media/tacho.svg" alt=""> Eliminar todos los elementos seleccionados</a>
  </div>

  <script>
    const checkboxes = document.querySelectorAll('.checkbox');
    const eliminarMsg = document.querySelector('.eliminar');
    let checked = 0;

    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('click', () => {
        if (checkbox.checked == true) {
          checked++;  
        } else {
          checked--;
        }
        (checked) ? eliminarMsg.classList.add('mostrar') : eliminarMsg.classList.remove('mostrar') 
      })
    });
    
  </script>
</body>
</html>