<section class="lista-de-viagens">

        <?php
        require_once('dbConnect.php');
        require_once('database/viagemDatabase.php');

        $partida = $_SESSION['partida'];
        $chegada = $_SESSION['chegada'];
        $dataPartida = $_SESSION['dataPartida'];

        $aux = strpos($dataPartida,"T");
        $aux1 = substr($dataPartida, 0, $aux );
        $aux2= substr($dataPartida, $aux + 1);
        $dataPartida = $aux1 . " " . $aux2;


        $trips = findTrip($partida, $chegada, $dataPartida);

        //print_r($trips);
        foreach($trips as $trip) { ?>
            <table id="showTrips">
              <tr><th>Cidade Partida</th><th>Cidade Chegada</th><th>Data Partida</th></tr>
              <article>
            <h3>
            <?php
            $cidadePartida = getCityName($trip['partida']);
            $cidadeChegada = getCityName($trip['chegada']);
            echo "<tr><td align=\"center\">{$cidadePartida['name']}</td><td align=\"center\">{$cidadeChegada['name']}</td><td align=\"center\">{$trip['DataPartida']}</td></tr></table>"
        /*echo $trip['partida'] ." " . $trip['chegada'] ." ". $trip['DataPartida'] . "\n";  */   ?></h3>
          </article>
        <?php } ?>
      </section>
