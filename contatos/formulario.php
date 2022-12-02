<form>
  <input type="hidden" name="id" value="<?php echo $contato['id']; ?>" >
  <fieldset>
    <legend>Novo Contato</legend>
    <label>
      Nome:
      <input type="text" name="nome" value="<?php echo $contato['nome']; ?>" >
    </label>
    <label>
      Telefone:
      <!-- <input type="tel" name="telefone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{9}" placeholder="DDI-12-34567890"> -->
      <input type="text" name="telefone" value="<?php echo $contato['telefone']; ?>" >
    </label>
    <label>
      E-mail:
      <input type="text" name="email" value="<?php echo $contato['email']; ?>" >
    </label>
    <label>
      Descricao:
      <textarea name="descricao">
        <?php echo $contato['nome']; ?>
      </textarea>
    </label>
    <label>
      Data nascimento:
      <input type="text" name="datanasc" value="<?php echo traduz_data_para_exibir($contato['datanasc']); ?>" >
    </label>
    <label>
      Favorito:
      <input type="checkbox" name="favorito" value="1" <?php echo ($contato['favorito'] == 1) ? 'checked' : ''; ?>>
    </label>

    <input type="submit" value="<?php echo ($contato['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>">
  </fieldset>
</form>
