<?php
  session_start();
  require_once 'includes/conexion.php';

  if (isset($_POST)) {
    $email = trim($_POST['email']); // trim = permite eliminar los espacios
    $password = $_POST['password'];

    $sql = "
      SELECT * FROM usuarios
      WHERE email = '$email' LIMIT 1;
    ";
    $login = mysqli_query($conexion, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
      $usuario = mysqli_fetch_assoc($login);
      $verificar = password_verify($password, $usuario['password']);

      if ($verificar) {
        $_SESSION['usuario'] = $usuario;
        if (isset($_SESSION['error_login'])) {
          unset($_SESSION['error_login']);
        }
      } else {
        $_SESSION['error_login'] = 'Login incorrecto';
      }
    } else {
      $_SESSION['error_login'] = 'Login incorrecto';
    }
  }

  header('Location: index.php');
?>