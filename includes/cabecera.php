<?php
  if (!isset($_SESSION['usuario'])) {
    session_start();
  }
  
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/main.css">
  <title>The Games Blog</title>
</head>
<body>
  <header id="encabezado">
    <div id="logo">
      <a href="index.php">
        <p>The Game Blog</p>
      </a>
    </div>

    <nav id="menu">
      <ul>
        <li><a href="index.php">Inicio</a></li>
        <?php 
          $categorias = obtenerCategorias($conexion);
          if (!empty($categorias)):
            while ($categoria = mysqli_fetch_assoc($categorias)): 
        ?>
            <li>
              <a href="categoria.php?id=<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></a>
            </li>
        <?php 
            endwhile; 
          endif;    
        ?>
        <li><a href="index.php">Acerca de mí</a></li>
        <li><a href="index.php">Contacto</a></li>
      </ul>
    </nav>
  </header>

  <div class="clearfix"></div>

  <main id="contenedor">