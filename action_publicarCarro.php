<?php
  require_once('dbConnect.php');
  require_once('database/viagemDatabase.php');


  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $passageiros = $_POST['nPassageiros'];
  $matricula = $_POST['matricula'];
  $combustivel = $_POST['combustivel'];

  if (strlen($matricula)<8 or strlen($matricula)>8){
    $_SESSION['error']= "Matricula invalida";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    $partida = $_SESSION['partida'];
    $chegada = $_SESSION['chegada'];
    $dataPartida = $_SESSION['dataPartida'];

    publicarViagem($dataPartida, $partida, $chegada, $_SESSION['email']);
    publicarCarro($marca, $modelo, $combustivel, $matricula, $passageiros, $_SESSION['email']);
    $_SESSION['success']="Viagem Registada";
    header('Location: index.php');

  }
?>
