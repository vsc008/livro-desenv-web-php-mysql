<?php
$bdServidor = '127.0.0.1';
$bdUsuario = 'sistemacontatos';
$bdSenha = 'sistema';
$bdBanco = 'contatos';
$dbPorta = 8889;

/* You should enable error reporting for mysqli before attempting to make a connection */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $dbPorta);

/* Set the desired charset after establishing a connection */
mysqli_set_charset($conexao, 'utf8');

// printf("Success... %s\n", mysqli_get_host_info($conexao));

function gravar_contato($conexao, $contato) {

  if (is_null($contato['datanasc'])) {

    $sqlGravar = "INSERT INTO contatos 
    (nome, telefone, email, descricao, datanasc, favorito)
    VALUES 
    ( 
      '{$contato['nome']}', 
      '{$contato['telefone']}', 
      '{$contato['email']}',
      '{$contato['descricao']}',
      null,
      {$contato['favorito']}
    )";

  } else {

    $sqlGravar = "INSERT INTO contatos 
    (nome, telefone, email, descricao, datanasc, favorito)
    VALUES 
    ( 
      '{$contato['nome']}', 
      '{$contato['telefone']}', 
      '{$contato['email']}',
      '{$contato['descricao']}',
      '{$contato['datanasc']}',
      {$contato['favorito']}
    )";

  }

  mysqli_query($conexao, $sqlGravar);
}

function buscar_contato($conexao, $id) {
  $sqlBusca = 'SELECT * FROM contatos WHERE id = ' . $id;
  $resultado = mysqli_query($conexao, $sqlBusca);
  return mysqli_fetch_assoc($resultado);
}

function editar_contato($conexao, $contato) {
  if (is_null($contato['datanasc'])) {
    $sql = "
      UPDATE contatos SET
        nome = '{$contato['nome']}',
        telefone = '{$contato['telefone']}',
        descricao = '{$contato['descricao']}',
        email = '{$contato['email']}',
        datanasc = null,
        favorito = '{$contato['favorito']}'
      WHERE id = {$contato['id']}          
    ";
  } else {
    $sql = "
      UPDATE contatos SET
        nome = '{$contato['nome']}',
        telefone = '{$contato['telefone']}',
        descricao = '{$contato['descricao']}',
        email = '{$contato['email']}',
        datanasc = '{$contato['datanasc']}',
        favorito = '{$contato['favorito']}'
      WHERE id = {$contato['id']}          
    ";
  }
  mysqli_query($conexao, $sql);
}

function remover_contato($conexao, $id) {
  $sqlRemover = "DELETE FROM contatos WHERE id = {$id}";
  mysqli_query($conexao, $sqlRemover);
}