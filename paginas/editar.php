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
  <title>Editar Libro</title>
</head>
<body>
  <header>
    <h1>Editar información</h1>
  </header>
  <main>
    <form action="../script/editar.php" method="POST">
      <?php
        $id = false;

        if (isset($_GET["id"])) {
          $id = $_GET['id'];
        }
        echo "<input type='hidden' name='id' value='$id'>";
        echo mostrarDatos($conexion, $id);
      ?>
    </form>
  </main>
</body>
</html>