<?php
  require_once 'includes/redireccion.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';
?>

  <div id="principal">
    <h1>Crear entradas</h1>
    <p>Puedes añadir nuestras entradas al blog, para que sean leidas por todos los internautas.</p>
    <br/>
    <form action="guardar-entrada.php" method="POST">
      <label>Titulo: <input type="text" name="titulo"></label> 
      <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

      <label>Descripcion: <br/> <textarea name="descripcion" rows="10" cols="50"></textarea></label>
      <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

      <label>Categoria: <br/>
        <select name="categoria">
          <?php 
            $categorias = obtenerCategorias($conexion);  
            if (!empty($categorias)):
              while ($categoria = mysqli_fetch_assoc($categorias)): 
          ?>
            <option value="<?= $categoria['id']; ?>">
              <?= $categoria['nombre']; ?>
            </option>
          <?php 
              endwhile; 
            endif;
          ?>
        </select>
      </label>
      <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'categoria') : ''; ?>
      <br/>
      <button type="submit">Guardar entrada</button>
    </form>

    <?php borrarErrores(); ?>

  </div>

</main>

<?php require_once 'includes/pie.php'; ?>