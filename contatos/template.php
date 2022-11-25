<!DOCTYPE html>
<html>

  <head>
    <title>Gerenciador de Contatos</title>
    <link rel="stylesheet" href="contatos.css" type="text/css" />
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
          <!-- <input type="tel" name="telefone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{9}" placeholder="DDI-12-34567890"> -->
          <input type="text" name="telefone">
        </label>
        <label>
          E-mail:
          <input type="text" name="email">
        </label>
        <label>
          Descricao:
          <textarea name="descricao"></textarea>
        </label>
        <label>
          Data nascimento:
          <input type="text" name="datanasc">
        </label>
        <label>
          Favorito:
          <input type="checkbox" name="favorito" value="Sim">
        </label>

        <input type="submit" value="Cadastrar">
      </fieldset>
    </form>
    
    <table border='1'>
      <tr>
        <th>Nome</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Descricao</th>
        <th>Data nascimento</th>
        <th>Favorito</th>
      </tr>
       <?php foreach ($lista_contatos as $contato) : ?>
        <tr>
          <td><?php echo $contato['nome']; ?></td>
          <td><?php echo $contato['telefone']; ?></td>
          <td><?php echo $contato['email']; ?></td>
          <td><?php echo $contato['descricao']; ?></td>
          <td><?php echo traduz_data_para_exibir($contato['datanasc']); ?></td>
          <td><?php echo traduz_favorito($contato['favorito']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

  </body>
</html>