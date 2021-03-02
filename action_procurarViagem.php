<?php
  require_once('dbConnect.php');
  require_once('database/viagemDatabase.php');

  if (!isset($_SESSION['email']))
  {
    $_SESSION['error']="Necessario fazer Login";
    header('Location: publicar-viagem.php');
  } else {

    $partida = $_POST['partida'];
    $chegada = $_POST['chegada'];
    $dataPartida = $_POST['dataPartida'];

    $date = new DateTime(); // Date object using current date and time
    $dt= $date->format('Y-m-d\TH:i');

    if ($dataPartida<$dt)
    {
      $_SESSION['error']="data incorreta";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else
    {
      if ($partida==$chegada)
      {
        $_SESSION['error']="partida e chegada iguais";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
      }else{
        $_SESSION['partida'] = $partida;
        $_SESSION['chegada'] = $chegada;
        $_SESSION['dataPartida'] = $dataPartida;
        header('Location: lista-de-viagens.php');
      }
    }
  }
?>
