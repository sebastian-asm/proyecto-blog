<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  
  if (isset($_POST)) {
    require_once 'includes/conexion.php';
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conexion, $_POST['nombre']) : false;
    $apellido = isset($_POST['apellido']) ? mysqli_real_escape_string($conexion, $_POST['apellido']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conexion, trim($_POST['email'])) : false;

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

  }

  $guardar_usuario = false;

  if (count($errores) == 0) {
    $guardar_usuario = true;
    $usuario = $_SESSION['usuario']['id'];

    // Comprobar si el email ya existe
    // $sql = "SELECT id, email FROM usuarios WHERE email = '$email';";
    // $verif_email = mysqli_query($conexion, $sql);
    // $verif_ususario = mysqli_fetch_assoc($verif_email);

    // if ($verif_ususario['id'] == $usuario['id'] || empty($verif_ususario)) {
      
      $sql = "
        UPDATE usuarios 
        SET nombre = '$nombre',
            apellido = '$apellido',
            email = '$email'
        WHERE id = $usuario;
      ";
      $guardar = mysqli_query($conexion, $sql);
  
      if ($guardar) {
        $_SESSION['usuario']['nombre'] = $nombre;
        $_SESSION['usuario']['apellido'] = $apellido;
        $_SESSION['usuario']['email'] = $email;
  
        $_SESSION['completado'] = 'Actualizacion existosa!';
      } else {
        $_SESSION['errores']['general'] = 'Error al actualizar datos';
      }

    // } else {
    //   $_SESSION['errores']['general'] = 'El usuario ya existe';
    // }

  } else {
    $_SESSION['errores'] = $errores;
  }

  header('Location: mis-datos.php');
?>