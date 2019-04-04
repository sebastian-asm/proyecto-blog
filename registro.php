<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  
  if (isset($_POST)) {
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($conexion, $_POST['password']) : false;

    $errores = array();

    // Validar nombre
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match('/[0-9]/', $nombre)) {
      $nombre_valido = true;
    } else {
      $nombre_valido = false;
      $errores['nombre'] = 'El nombre no es valido';
    }

    // Validar apellido
    if (!empty($apellido) && !is_numeric($apellido) && !preg_match('/[0-9]/', $apellido)) {
      $apellido_valido = true;
    } else {
      $apellido_valido = false;
      $errores['apellido'] = 'El apellido no es valido';
    }

    // Validar email
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $email_valido = true;
    } else {
      $email_valido = false;
      $errores['email'] = 'El email no es valido';
    }

    // Validar password
    if (!empty($password)) {
      $password_valido = true;
    } else {
      $password_valido = false;
      $errores['password'] = 'El password no puede estar vacio';
    }
  }

  // var_dump(count($errores));

  $guardar_usuario = false;

  if (count($errores) == 0) {
    $guardar_usuario = true;

    $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);
    $sql = "
      INSERT INTO usuarios 
      VALUES (null, '$nombre', '$apellido', '$email', '$password_segura', CURDATE());
    ";
    $guardar = mysqli_query($conexion, $sql);

    // var_dump(mysqli_error($conexion));
    // die();

    if ($guardar) {
      $_SESSION['completado'] = 'Registro existoso!';
    } else {
      $_SESSION['errores']['general'] = 'Error al registrar';
    }

  } else {
    $_SESSION['errores'] = $errores;
  }

  header('Location: index.php');
?>