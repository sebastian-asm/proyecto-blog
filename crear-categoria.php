<?php
  require_once 'includes/redireccion.php';
  require_once 'includes/cabecera.php';
  require_once 'includes/barra.php';
?>

  <div id="principal">
    <h1>Crear categoria</h1>
    <p>Aqui puedes añadir nuevas categorias, para despues ser utilizadas con las nuevas entradas.</p>
    <br/>
    <form action="guardar-categoria.php" method="POST">
      <label>Nombre: <input type="text" name="nombre"></label>
      <button type="submit">Guardar</button>
    </form>
  </div>

</main>

<?php require_once 'includes/pie.php'; ?>