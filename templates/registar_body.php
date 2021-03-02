<section id="registar">

  <?php if (isset($_SESSION['error']))
          {
            echo " <h4>". $_SESSION['error']. "</h4>";
            unset($_SESSION['error']);
          } ?>
          
      <h2>Viaja connosco!</h2>
      <form class="registar" method="post" action="action_register.php">
        <label>Tipo de Utilizador
          <select name="tipo-utilizador" required="required">
            <option value="condutor">Condutor</option>
            <option value="passageiro">Passageiro</option>
          </select>
        </label>
        <label>
          Nome<input type="text" name="nome" required="required">
        </label>
        <label>
          Email<input type="email" name="email" required="required">
        </label>
        <label>
            Nº carta de condução <input type="text" name="nCartaConducao" value="desnecessario se passageiro">
        </label>
        <label>
          Palavra-passe <input type="password" name="password" required="required">
        </label>
        <input type="submit" value="REGISTAR">
      </form>
    </section>
