<?php
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';

  if (!isset($_POST{'busqueda'})) {
    header('Location: index.php');
  }
  
?>
 
    <div id="principal">
      <h1>Buscando por: <?= $_POST['busqueda'];  ?></h1>

      <?php 
        $entradas = obtenerEntradas($conexion, null, null, $_POST['busqueda']); 
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
      <div class="alerta">No hay coincidencias</div>

      <?php endif; ?>

    </div>

  </main>

  <?php require_once 'includes/pie.php'; ?>