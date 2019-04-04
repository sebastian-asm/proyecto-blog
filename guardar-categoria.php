<?php
  if (isset($_POST)) {
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false;

    $errores = array();

    // Validar nombre
    if (!empty($nombre)) {
      $nombre_valido = true;
    } else {
      $nombre_valido = false;
      $errores['nombre'] = 'El nombre no es valido';
    }

    if (count($errores) == 0) {
      $sql = "
        INSERT INTO categorias VALUES (null, '$nombre');
      ";
      $guardar = mysqli_query($conexion, $sql);
    }
  }

  header('Location: index.php');
?>