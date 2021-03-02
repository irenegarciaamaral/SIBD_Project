<?php
  // Inserir na Tabela dos utilizadores
  function insertUser($nome, $email, $password){
    global $dbh;
    $stmt = $dbh->prepare('INSERT INTO utilizadores (nome, email, password) VALUES(?,?,?)');
    $stmt->execute(array($nome, $email, sha1($password)));
  }

  // inserir na tabela dos condutores usando o email unico
  function insertCondutor($email, $cartadeconducao){
      global $dbh;
      $stmt = $dbh->prepare('INSERT INTO condutores (idC, nCartaConducao)
                              VALUES((SELECT nUtilizador FROM utilizadores where email=?),?)');
      $stmt->execute(array($email, $cartadeconducao));
  }

  //inserir na tabela dos passageiros usando  email unico
  function insertPassageiro($email){
      global $dbh;
      $stmt = $dbh->prepare('INSERT INTO passageiros (idP)
                              VALUES((SELECT nUtilizador FROM utilizadores where email=?))');
      $stmt->execute(array($email));
  }

  //verificar se o login esta correto
  function isLoginCorrect($email, $password) {
    global $dbh;
    $stmt = $dbh->prepare('SELECT *
                         FROM utilizadores
                         WHERE email = ? AND password = ?');
    $stmt->execute(array($email, sha1($password)));
    return $stmt->fetch() !== false;
  }
?>
