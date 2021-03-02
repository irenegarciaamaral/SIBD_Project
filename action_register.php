<?php
  require_once('dbConnect.php');
  require_once('database/userDatabase.php');

  $username = $_POST['nome'];
  $email= $_POST['email'];
  $cartadeconducao = $_POST['nCartaConducao'];
  $password = $_POST['password'];
  $tipoUtilizador = $_POST['tipo-utilizador'];

  if ($tipoUtilizador == "condutor" and (strlen($cartadeconducao)<5 or strlen($cartadeconducao)>9)){
    $_SESSION['error']= "Carta de conducao invalida";
    header('Location: registar.php');
  } else {

    try {
      if ($tipoUtilizador == "condutor")
      {
        if ($cartadeconducao == "")
        {
          $_SESSION['error']= "campo Carta de conducao em falta";
          header('Location: ' . $_SERVER['HTTP_REFERER']);
          exit();
        }
        insertUser($username, $email, $password);
        insertCondutor($email, $cartadeconducao);
        header('Location: index.php');
      }
      else
      {
        insertUser($username, $email, $password);
        insertPassageiro($email);
        header('Location: index.php');
      }
    } catch(PDOException $e) {
      if (strpos($e->getMessage(), 'users_pkey') !== false)
        $_SESSION['error'] = 'email already exists!';
      else
        $_SESSION['error'] = 'Registration failed!';
        header('Location: registar.php');
    }
}
?>
