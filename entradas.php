<?php
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';
?>

    <div id="principal">
      <h1>Todas las entradas del blog</h1>

      <?php 
        $entradas = obtenerEntradas($conexion); 
        if (!empty($entradas)):
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
        endif;
      ?>

    </div>

  </main>

  <?php require_once 'includes/pie.php'; ?>