<section id="publicar-carro">

  <?php if (isset($_SESSION['error']))
          {
            echo " <h4>". $_SESSION['error']. "</h4>";
            unset($_SESSION['error']);
          } ?>
          
      <h2>Publica a tua viagem!</h2>
      <form class="dados-carro" action="action_publicarCarro.php" method="post">
        <h3>Dados do Carro</h3>
        <label>
          Marca <input type="text" name="marca" required="required">
        </label>
        <label>
          Modelo <input type="text" name="modelo" required="required">
        </label>
        <label>Tipo de combustível
          <select name="combustivel">
            <option value="gasoleo">Gasóleo</option>
            <option value="gasolina" >Gasolina</option>
            <option value="gas">Gás</option>
            <option value="hibrido">Híbrido</option>
            <option value="eletrico">Elétrico</option>
          </select>
        </label>
        <label>
          Matrícula <input type="text" name="matricula" required="required">
        </label>
        <label>
          Número de lugares <input type="number" value="1" min="1" max="4" name="nPassageiros" required="required">
        </label>
        <input type="submit" value="PUBLICAR">
      </form>
    </section>
