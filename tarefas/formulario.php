<form method="POST">
  <input type="hidden" name="id" value="<?php echo $tarefa['id']; ?>" />
  <fieldset>
    <legend>Nova tarefa</legend>
    <label>
      Tarefa:
      <input type="text" name="nome" value="<?php echo $tarefa['nome']; ?>" />
    </label>
    <label>
      Descricão (Opcional):
      <textarea name="descricao" />
        <?php echo $tarefa['descricao']; ?>
      </textarea>
    </label>
    <label>
      Prazo (Opcional):
      <input type="text" name="prazo" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>" >
    </label>
    <fieldset>
      <legend>Prioridade:</legend>
      <input type="radio" name="prioridade" id="" value="1" <?php echo ($tarefa['prioridade'] == 1) ? 'checked' : ''; ?> />Baixa
      <input type="radio" name="prioridade" id="2" value="2" <?php echo ($tarefa['prioridade'] == 2) ? 'checked' : ''; ?> />Média
      <input type="radio" name="prioridade" id="2" value="3" <?php echo ($tarefa['prioridade'] == 3) ? 'checked' : ''; ?> />Alta
    </fieldset>
    <label for="">
      Tarefa concluída:
      <input type="checkbox" name="concluida" id="" valeu="1" <?php echo ($tarefa['concluida'] == 1) ? 'checked' : ''; ?> />
    </label>

    <?php if ($tarefa['id'] > 0) : ?>
      <!-- <?php echo "<a href='tarefas.php'>Cancelar</a>"; ?> -->
      <?php echo "<input type='button' value='Cancelar' onclick='history.back()'>"; ?>
    <?php endif; ?>
    
    <input type="submit" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>" />

  </fieldset>
</form>