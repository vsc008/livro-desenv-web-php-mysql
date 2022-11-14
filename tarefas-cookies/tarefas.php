<!DOCTYPE html>

<?php 
setcookie('lista_tarefas');
?>

<html>
  <head>
    <title>Gerenciador de Tarefas</title>
  </head>
  <body>
    <h1>Gerenciador de Tarefas</h1>

    <form>
      <fieldset>
        <legend>Nova Tarefa</legend>
        <label>
          Tarefa:
          <input type="text" name="nome">
        </label>
        <input type="submit" value="Cadastrar">
      </fieldset>
    </form>

    <?php

      if (isset($_GET['nome'])) {
        $_COOKIE['lista_tarefas'][] = $_GET['nome'];
      }

      $lista_tarefas = array();

      if (isset($_COOKIE['lista_tarefas'])) {
        $lista_tarefas = $_COOKIE['lista_tarefas'];
      }
      
    ?>

    <table>
      <tr>
        <th>Tarefas</th>
      </tr>
       <?php foreach ($lista_tarefas as $tarefa) : ?>
        <tr>
          <td><?php echo $tarefa; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

  </body>
</html>