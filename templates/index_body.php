<section id="procurar-info">
  <?php if (isset($_SESSION['success'])) {
   echo "<h4>{$_SESSION['success']}</h4>";
   unset($_SESSION['success']);} ?>
      <h2>3 coisas que vais adorar no àBoleia</h2>
      <h3>TU ESCOLHES</h3>
      <p class="p1">
        Milhares de destinos a preços incriveis.
      </p>
      <h3>PARTILHA O CARRO COM CONFIANÇA</h3>
      <p class="p2">
        Os perfis com documentação verificada aumentam ainda mais a confiança entre os membros.
      </p>
      <h3>É MAIS PRÁTICO</h3>
      <p class=p3>
        Já não tens de atravessar a cidade. Escolha uma viagem com partida da área onde vives.
      </p>
      <a href="procurar-viagem.php">PROCURAR VIAGEM</a>
    </section>
    <section id="publicar-info">
      <h2>Queres conduzir para onde?</h2>
      <p>Vamos fazer que esta seja a viagem mais barata da tua vida!</p>
      <img src="img/conduzir.png" alt="Condutor">
      <a href="publicar-viagem.php">PUBLICAR VIAGEM</a>
    </section>
