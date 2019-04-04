<?php
  require_once 'includes/redireccion.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';
?>

  <div id="principal">
    <h1>Mis datos</h1>
    <p>Aqui puedes editar tus datos personales en el sitio.</p>


    <?php if (isset($_SESSION['usuario'])): ?>

      <?php if (isset($_SESSION['completado'])): ?>
        <div class="alerta">
          <?= $_SESSION['completado'] ?>
        </div>
      <?php elseif (isset($_SESSION['errores']['general'])): ?>
        <div class="alerta alerta-error">
          <?= $_SESSION['errores']['general'] ?>
        </div>
      <?php endif; ?>

      <form action="actualizar-usuario.php" method="POST">
        <label>Nombre: <input type="text" name="nombre" id="nombre" value="<?= $_SESSION['usuario']['nombre'] ?>"></label>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

        <label>Apellido: <input type="text" name="apellido" id="apeliido" value="<?= $_SESSION['usuario']['apellido'] ?>"></label>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

        <label>Email: <input type="email" name="email" id="email" value="<?= $_SESSION['usuario']['email'] ?>"></label>
        <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

        <button type="submit" name="btn-submit">Actualizar</button>
      </form>

    <?php 
      endif;
      borrarErrores(); 
    ?>

  </div>

</main>

<?php require_once 'includes/pie.php'; ?>