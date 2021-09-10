<?php
  include_once '../script/conexion.php';
  include_once '../script/funciones.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../estilos/main.css">
  <link rel="stylesheet" href="../estilos/agregar.css">
  <title>Añadir Libro</title>
</head>
<body>
  <header>
    <h1>Añadir nuevo libro</h1>
  </header>
  <main>
    <form action="../script/agregar.php" method="POST">
      <?php
        echo mostrarDatos($conexion, false);
      ?>
    </form>
  </main>
</body>
</html>