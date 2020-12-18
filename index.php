<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ControlMed</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <br> Bienvenido <?= $user['email']; ?>
      <br>Ingreso correcto - 
      <a href="logout.php">
        Logout
      </a>
      <?php sleep(1); ?>
      <?php header("Status: 301 Moved Permanently"); ?>
      <?php header("Location: main2.php"); ?>
    <?php else: ?>
      
      <h2>Para continuar, ingrese con usuario o regístrese</h2>

      <a href="login.php">Ingreso</a> / <a href="signup.php">Registro</a>
    <?php endif; ?>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>

  </body>

</html>
