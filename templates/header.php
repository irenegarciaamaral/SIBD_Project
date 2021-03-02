<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="pt-PT">
  <head>
    <title>àBoleia</title>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/layout.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link href="css/forms.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <img src="img/logo1.png" alt="Logo of the website">
      <h1><a href="index.php">àBoleia</a></h1>
      <div id="cabeçalho">
        <a class="b1" href="procurar-viagem.php">Procurar Viagem</a>
        <a class="b2" href="publicar-viagem.php">Publicar Viagem</a>
        <?php if (!isset($_SESSION['email'])) { ?>
        <a class="b3" href="registar.php">Registar</a>
      <?php } ?>
      </div>
      <section id="iniciar-sessao">
      <?php if (isset($_SESSION['email'])) { ?>
        <form class="form-logout" action="action_logout.php">
          <span><?=$_SESSION['email']?></span>
          <input type="submit" value="LOGOUT">
        </form>
      <?php } else { ?>
        <form class="form-signup" action="action_login.php"  method="post">
          <input type="email" name="email" placeholder="email" required="required">
          <input type="password" name="password" placeholder="password">
          <input type="submit" value="INICIAR SESSÃO">
        </form>
      <?php } ?>
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="message">
          <?=$_SESSION['message']?>
        </div>
      <?php } ?>
      </section>
    </header>
