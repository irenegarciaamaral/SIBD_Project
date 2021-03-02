<?php

  function findTripId($local)
  {
    global $dbh;
    $stmt = $dbh->prepare('SELECT idCoord
                           FROM locais
                           WHERE name = ?');
    $stmt->execute(array($local));
    return $stmt->fetch();
  }

  function findTrip($partida, $chegada, $dataPartida){
    global $dbh;
    $localPart= findTripId($partida);
    $localCheg= findTripId($chegada);

    $stmt = $dbh->prepare('SELECT *
                           FROM viagens
                           WHERE partida = ? AND chegada = ? AND DataPartida >= ?');
    $stmt->execute(array($localPart['idCoord'], $localCheg['idCoord'], $dataPartida));
    return $stmt->fetchAll();
  }

function checkLocais()
{
  global $dbh;
  $stmt = $dbh->prepare('SELECT name
                        FROM locais');
  $stmt->execute();
  return $stmt->fetchAll();
}

function getCityName($cityId)
{
  global $dbh;
  $stmt = $dbh->prepare('SELECT name
                        FROM locais
                        WHERE idCoord = ?');
  $stmt->execute(array($cityId));
  return $stmt->fetch();
}


//parte de publicar viagens, juntar a irene
function publicarViagem($dataPartida, $partida, $chegada, $email)
{
  global $dbh;
  $localPart= findTripId($partida);
  $localCheg= findTripId($chegada);
  $stmt = $dbh->prepare('INSERT INTO viagens (DataPartida, partida, chegada) VALUES (?,?,?)');
  $stmt->execute(array($dataPartida, $localPart['idCoord'], $localCheg['idCoord']));

  $stmt = $dbh->prepare('INSERT INTO viagensC(idVc, condutor) VALUES ((SELECT idV
                                                                          FROM viagens
                                                                          order by idV DESC
                                                                          Limit 1),(SELECT nUtilizador
                                                                                    FROM utilizadores where email=?))');
  $stmt->execute(array($email));
}




function publicarCarro($marca, $modelo, $combustivel, $matricula, $passageiros,$email)
{
  global $dbh;
  $stmt = $dbh->prepare('INSERT INTO carros(marca, modelo, combustível, matrícula, condutor)
                          VALUES (?,?,?,?,(SELECT nUtilizador FROM utilizadores where email=?))');

  $stmt->execute(array($marca, $modelo, $combustivel, $matricula, $email));


  $stmt = $dbh->prepare('INSERT INTO NumeroPassageiros(viagemC, nPassageiros) VALUES ((SELECT idVgCond
                                                                          FROM viagensC
                                                                          order by idVgCond DESC LIMIT 1 ),?)');
  $stmt->execute(array($passageiros));

}

?>
