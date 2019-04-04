<?php
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';

  // En caso de no existir el id de categoria devuelve index
  $categoria = categoria($conexion, $_GET['id']);
  if (!isset($categoria['id'])) {
    header('Location: index.php');
  }
?>

    <div id="principal">
      <h1>Entradas de <?= $categoria['nombre'];  ?></h1>

      <?php 
        $entradas = obtenerEntradas($conexion, false, $_GET['id']); 
        if (!empty($entradas) && mysqli_num_rows($entradas) >= 1):
          while ($entrada = mysqli_fetch_assoc($entradas)):
      ?>
      
      <article class="entrada">
        <a href="entrada.php?id=<?= $entrada['id'] ?>">
          <h2><?= $entrada['titulo'] ?></h2>
          <span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?></span>
          <p><?= $entrada['descripcion'] ?></p>
        </a>
      </article>
      
      <?php
          endwhile;
        else:
      ?>
      <div class="alerta">No hay entradas en esta categoria</div>

      <?php endif; ?>

    </div>

  </main>

  <?php require_once 'includes/pie.php'; ?>