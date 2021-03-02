<?php
  require_once('dbConnect.php');
  require_once('database/userDatabase.php');

  $email = $_POST['email'];
  $password= $_POST['password'];

  if (isLoginCorrect($email, $password)){
    $_SESSION['email'] = $email;
    header('Location:  index.php');
  }
  else{
    $_SESSION['message'] = 'Login failed!';}
  //  header('Location: publicar-viagem.php');}
  //header('Location: ' . $_SERVER['HTTP_REFERER']);}

?>




<!-- O QUE TINHAMOS ANTES:

  if(!$_POST['email'] || !$_POST['password']){
    $_SESSION ['form_values'] = $_POST;// ver se form_values é assim que funciona ( permanece os valores)
    $_SESSION['ErrorLog'][]= 'Campos em falta'; // erro campos em falta
    header('Location:' . $_SERVER['HTTP_REFERER']);
  }

  $email = $_POST['email'];
  $password= $_POST['password'];
  $password= sha1($password); //nao sei se é necessário porque é login e não insert

  $check = isLoginCorrect($email, $password);// ver se esta correto, ver tambem se se tira o false do usersDB
  $numCheck = count($check);

  if ($numCheck > 1){

    $_SESSION['Logged']=1;
    header('Location:' . $_SERVER['HTTP_REFERER']);
  }
  else {
    $_SESSION ['form_values'] = $_POST;
    $_SESSION['ErrorLog'][]= 'Email ou password incorrecto'; // erro log in errado
    header('Location:' . $_SERVER['HTTP_REFERER']);
  }
-->
