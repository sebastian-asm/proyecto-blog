<?php
  require_once 'includes/conexion.php';
  require_once 'includes/helpers.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';

  // En caso de no existir el id de la entrada, devuelve index
  $entrada_actual = conseguirEntrada($conexion, $_GET['id']);
  if (!isset($entrada_actual['id'])) {
    header('Location: index.php');
  }
?>

    <div id="principal">
      <h1><?= $entrada_actual['titulo']; ?></h1>
      <a href="categoria.php?id=<?= $entrada_actual['categoria_id'] ?>">
        <h2><?= $entrada_actual['categoria']; ?></h2>
      </a>
      <h4><?= $entrada_actual['fecha']; ?> | <?= $entrada_actual['usuario']  ?></h4>
      <p><?= $entrada_actual['descripcion']  ?></p>
      <br/>
      <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>
        <a href="editar-entrada.php?id=<?= $entrada_actual['id']; ?>" class="btn btn-verde">Editar entrada</a>
        <a href="borrar-entrada.php?id=<?= $entrada_actual['id']; ?>" class="btn btn-rojo">Eliminar entrada</a>
      <?php endif; ?>

    </div>
  </main>

  <?php require_once 'includes/pie.php'; ?>