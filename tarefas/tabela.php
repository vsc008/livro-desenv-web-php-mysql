<table>
  <tr>
    <th>Tarefa</th>
    <th>Descricao</th>
    <th>Prazo</th>
    <th>Prioridade</th>
    <th>Concluida</th>
    <th>Opcoes</th>
  </tr>
  <?php foreach ($lista_tarefas as $tarefa) : ?>
    <tr>
      <td><?php echo $tarefa['nome']; ?></td>
      <td><?php echo $tarefa['descricao']; ?></td>
      <td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?></td>
      <td><?php echo traduz_prioridade($tarefa['prioridade']); ?></td>
      <td><?php echo traduz_concluida($tarefa['concluida']); ?></td>
      <td>
        <a href="editar.php?id=<?php echo $tarefa['id']; ?>">Editar</a>
        <a href="remover.php?id=<?php echo $tarefa['id']; ?>">Remover</a>
        <a href="duplicar.php?id=<?php echo $tarefa['id']; ?>">Duplicar</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
<br>
<a href="removerconcluidas.php">Remover concluídas</a>
<!-- <input type="button" value="Remover concluídas" onclick='history.back()'> -->