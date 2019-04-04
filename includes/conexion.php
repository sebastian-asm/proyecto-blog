<?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'blog';
  $conexion = mysqli_connect($host, $user, $pass, $db);
  mysqli_query($conexion, "SET NAMES 'utf8'");
?>