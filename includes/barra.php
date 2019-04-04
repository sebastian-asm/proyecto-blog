    <aside id="sidebar">
      <div id="buscaor" class="bloque">
        <h3>Buscar en el blog</h3>

        <form action="buscar.php" method="POST">
          <input type="text" name="busqueda" id="busqueda">
          <button type="submit">Buscar</button>
        </form>
      </div>
      
      <?php if (isset($_SESSION['usuario'])): ?>
        <div id="usuario" class="bloque">
          <p>Biendenido,</p>
          <h3><?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellido']; ?></h3>
          <a href="crear-entradas.php" class="btn btn-naranja">Crear entradas</a>
          <a href="crear-categoria.php" class="btn">Crear categorias</a>
          <a href="mis-datos.php" class="btn btn-verde">Mis datos</a>
          <a href="cerrar.php" class="btn btn-rojo">Cerra sesión</a>
        </div>
      <?php endif; ?>

      <?php if (!isset($_SESSION['usuario'])): ?>
        <div id="login" class="bloque">
          <h3>Ingresa</h3>

          <?php if (isset($_SESSION['error_login'])): ?>
            <div id="usuario" class="alerta alerta-error">
              <?= $_SESSION['error_login']; ?>
            </div>
          <?php endif; ?>

          <form action="login.php" method="POST">
            <label>Email: <input type="email" name="email" id="email"></label>
            <label>Contraseña: <input type="password" name="password" id="password"></label>
            <button type="submit">Entrar</button>
          </form>
        </div>

        <div id="registro" class="bloque">

          <h3>Registrate</h3>

          <?php if (isset($_SESSION['completado'])): ?>
            <div class="alerta">
              <?= $_SESSION['completado'] ?>
            </div>
          <?php elseif (isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
              <?= $_SESSION['errores']['general'] ?>
            </div>
          <?php endif; ?>

          <form action="registro.php" method="POST">
            <label>Nombre: <input type="text" name="nombre" id="nombre"></label>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

            <label>Apellido: <input type="text" name="apellido" id="apeliido"></label>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellido') : ''; ?>

            <label>Email: <input type="email" name="email" id="email"></label>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

            <label>Contraseña: <input type="password" name="password" id="password"></label>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

            <button type="submit" name="btn-submit">Registrar</button>
          </form>

          <?php borrarErrores(); ?>
        </div>
      <?php endif; ?>
    </aside>