<?php 
   function mostrarError($errores, $campo) {
    $alerta = '';
    if (isset($errores[$campo]) && !empty($campo)) {
      $alerta = "<div class='alerta alerta-error'>" . $errores[$campo] . '</div>';
    }
    return $alerta;
  }

  function borrarErrores() {
    $borrado = false;
    if (isset($_SESSION['errores'])) {
      $_SESSION['errores'] = null;
      $borrado = true;
      // unset($_SESSION['errores']);
    }

    if (isset($_SESSION['errores_entradas'])) {
      $_SESSION['errores_entradas'] = null;
      $borrado = true;
      // unset($_SESSION['errores_entradas']);
    }

    if (isset($_SESSION['completado'])) {
      $_SESSION['completado'] = null;
      $borrado = true;
      // unset($_SESSION['completado']);
    }

    return $borrado;
  }

  function obtenerCategorias($con) {
    $sql = "
      SELECT * FROM categorias
      ORDER BY id ASC;
    ";
    $categorias = mysqli_query($con, $sql);

    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
      $resultado = $categorias;
    }

    return $resultado;
  }

  function categoria($con, $id) {
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($con, $sql);

    $resultado = array();
    if ($categorias && mysqli_num_rows($categorias) >= 1) {
      $resultado = mysqli_fetch_assoc($categorias);
    }

    return $resultado;
  }

  function obtenerEntradas($con, $limite = null, $categoria = null, $busqueda = null) {
    $sql = "
      SELECT e.*, c.nombre AS 'categoria' FROM entradas e
      INNER JOIN categorias c ON e.categoria_id = c.id
      ";
      
    if (!empty($categoria)) {
      $sql .= "WHERE e.categoria_id = $categoria ";
    }

    if (!empty($busqueda)) {
      $sql .= "WHERE e.titulo LIKE '%$busqueda%' ";
    }   

    $sql .= " ORDER BY e.id DESC "; // Para respetar el orden de la consulta en sql
    
    if ($limite) {
      $sql .= " LIMIT 4;";
    }

    $entradas = mysqli_query($con, $sql);

    $resultado = array();
    if ($entradas && mysqli_num_rows($entradas) >= 1) {
      $resultado = $entradas;
    }

    return $resultado;
  }

  function conseguirEntrada($con, $id) {
    $sql = "
      SELECT e.*, c.nombre AS 'categoria', CONCAT(u.nombre, ' ', u.apellido) AS 'usuario' 
      FROM entradas e
      INNER JOIN categorias c ON e.categoria_id = c.id
      INNER JOIN usuarios u ON e.usuario_id = u.id
      WHERE e.id = $id;
    ";
    $entrada = mysqli_query($con, $sql);
    $resultado = array(); 

    if ($entrada && mysqli_num_rows($entrada) >= 1) {
      $resultado = mysqli_fetch_assoc($entrada);
    }

    return $resultado;
  }

?>