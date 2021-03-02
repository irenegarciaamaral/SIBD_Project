<?php
    require_once('dbConnect.php');
    require_once('database/viagemDatabase.php');
?>
<section id="procurar-viagem">

  <?php if (isset($_SESSION['error']))
          {
            echo " <h4>". $_SESSION['error']. "</h4>";
            unset($_SESSION['error']);
          } ?>

      <h2>Onde queres ir?</h2>
      <form action="action_procurarViagem.php" method="post">
        <label> De
          <select name="partida" required="required">
            <option value="" selected disabled hidden>Escolhe de onde vais</option>
            <?php  $locais=checkLocais();
              foreach ($locais as $local){
                echo "  <option value=". $local['name']." > ".$local['name']. "</option>";} ?>
          </select>
        </label>
        <label> Para
          <select name="chegada" required="required">
            <option value="" selected disabled hidden>Escolhe para onde vais</option>
          <?php  $locais=checkLocais();
              foreach ($locais as $local){
          echo "  <option value=". $local['name']." > ".$local['name']. "</option>";} ?>
          </select>
        </label>
        <label>
          Data e Hora <input type="datetime-local" name="dataPartida">
        </label>
        <input type="submit" value="PROCURAR">
      </form>
    <!--  <a href="lista-de-viagens.php">Procurar</a>-->
    </section>
