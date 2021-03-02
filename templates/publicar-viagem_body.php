<section id="publicar-viagem">
  <?php if (isset($_SESSION['error'])) {
   echo "<h4>{$_SESSION['error']}</h4>";
   unset($_SESSION['error']);} ?>
      <h2>Publica a tua viagem!</h2>
      <form class="dados-viagem" action="action_publicarViagem.php" method="post">
        <h3>Dados da viagem</h3>
        <label> Qual é o ponto de partida?
          <select name="partida" required="required">
            <option value="" selected disabled hidden>Escolhe de onde vais</option>
            <?php  $locais=checkLocais();
              foreach ($locais as $local){
                echo "  <option value=". $local['name']." > ".$local['name']. "</option>";} ?>
          </select>
        </label>
        <label> Para onde vais?
          <select name="chegada" required="required">
          <option value="" selected disabled hidden>Escolhe de onde vais</option>
          <?php  $locais=checkLocais();
            foreach ($locais as $local){
              echo "  <option value=". $local['name']." > ".$local['name']. "</option>";} ?>
        </select>
        </label>
        <label>
          Cidades de passagem? <input type="text" name="paragens">
        </label>
        <label>
          Data e Hora de partida: <input type="datetime-local" name="dataPartida" required="required">
        </label>
        <input type="submit" value="CONTINUAR">
      </form>
    </section>
