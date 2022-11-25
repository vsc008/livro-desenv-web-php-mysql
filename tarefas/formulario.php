<form action="">
<input type="hidden" name="id" value="<?php echo $tarefa['id']; ?> " />
  <fieldset>
    <legend>Nova tarefa</legend>
    <label for="">
      Tarefa:
      <input type="text" name="nome" id="" value="<?php echo $tarefa['nome']; ?>" >
    </label>
    <label for="">
      Descricao (Opcional):
      <textarea name="descricao" id="">
        <?php echo $tarefa['descricao']; ?>
      </textarea>
    </label>
    <label for="">
      Prazo (Opcional):
      <input type="text" name="prazo" id="" value="<?php echo traduz_data_para_exibir($tarefa['prazo']); ?>" >
    </label>
    <fieldset>
      <legend>Prioridade:</legend>
      <input type="radio" name="prioridade" id="" value="1" checked>Baixa
      <input type="radio" name="prioridade" id="2" value="2">Media
      <input type="radio" name="prioridade" id="2" value="3">Alta
    </fieldset>
    <label for="">
      Tarefa concluida:
      <input type="checkbox" name="concluida" id="" valeu="1">
    </label>
    <input type="submit" value="Cadastrar">
  </fieldset>
</form>