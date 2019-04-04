<?php
  require_once 'includes/redireccion.php';
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
    <h1>Editar entrada</h1>
    <p>Puedes editar una entrada creada por ti.</p>
    <p>Entrada actual: <?= $entrada_actual['titulo']; ?></p>
    <br/>
    <form action="guardar-entrada.php?editar=<?= $entrada_actual['id']; ?>" method="POST">
      <label>Titulo: <input type="text" name="titulo" value="<?= $entrada_actual['titulo'];  ?>"></label> 
      <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'titulo') : ''; ?>

      <label>Descripcion: <br/> 
        <textarea name="descripcion" cols="50" rows="10">
          <?= $entrada_actual['descripcion']; ?>
        </textarea>
      </label>
      <?php echo isset($_SESSION['errores_entradas']) ? mostrarError($_SESSION['errores_entradas'], 'descripcion') : ''; ?>

      <label>Categoria: <br/>
        <select name="categoria">
          <?php 
            $categorias = obtenerCategorias($conexion);  
            if (!empty($categorias)):
              while ($categoria = mysqli_fetch_assoc($categorias)): 
          ?>
            <option value="<?= $categoria['id']; ?>" <?= ($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected' : ''; ?>>
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
      <button type="submit">Guardar cambios</button>
    </form>

    <?php borrarErrores(); ?>

  </div>

</main>

<?php require_once 'includes/pie.php'; ?>