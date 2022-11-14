<!DOCTYPE html>

<?php session_start(); ?>

<html>
  <head>
    <title>Gerenciador de Contatos</title>
  </head>
  <body>
    <h1>Gerenciador de Contatos</h1>

    <form>
      <fieldset>
        <legend>Novo Contato</legend>
        <label>
          Nome:
          <input type="text" name="nome">
        </label>
        <label>
          Telefone:
          <input type="tel" name="telefone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{9}" placeholder="DDI-12-34567890">
        </label>
        <label>
          E-mail:
          <input type="email" name="email">
        </label>
        <input type="submit" value="Cadastrar">
      </fieldset>
    </form>

    <?php

      if (isset($_GET['nome'])) {
        $_SESSION['lista_contatos'][] = $_GET['nome'];
      }
      if (isset($_GET['telefone'])) {
        $_SESSION['lista_contatos'][] = $_GET['telefone'];
      }
      if (isset($_GET['email'])) {
        $_SESSION['lista_contatos'][] = $_GET['email'];
      }

      $lista_contatos = array();

      if (isset($_SESSION['lista_contatos'])) {
        $lista_contatos = $_SESSION['lista_contatos'];
      }
      
    ?>

    <table>
      <tr>
        <th>Contatos</th>
      </tr>
       <?php foreach ($lista_contatos as $contato) : ?>
        <tr>
          <td><?php echo $contato; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

  </body>
</html>