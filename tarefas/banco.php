<?php
$bdServidor = '127.0.0.1';
$bdUsuario = 'sistematarefas';
$bdSenha = 'sistema';
$bdBanco = 'tarefas';
$dbPorta = 8889;

/* You should enable error reporting for mysqli before attempting to make a connection */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco, $dbPorta);

/* Set the desired charset after establishing a connection */
mysqli_set_charset($conexao, 'utf8');

// printf("Success... %s\n", mysqli_get_host_info($conexao));

function gravar_tarefa($conexao, $tarefa) {
  if (is_null($tarefa['prazo'])) {
    $sqlGravar = "INSERT INTO tarefas 
    (nome, descricao, prioridade, prazo, concluida)
    VALUES 
    ( 
      '{$tarefa['nome']}', 
      '{$tarefa['descricao']}', 
      {$tarefa['prioridade']},
      null,
      {$tarefa['concluida']}
    )";
  } else {
    $sqlGravar = "INSERT INTO tarefas 
    (nome, descricao, prioridade, prazo, concluida)
    VALUES 
    ( 
      '{$tarefa['nome']}', 
      '{$tarefa['descricao']}', 
      {$tarefa['prioridade']},
      '{$tarefa['prazo']}',
      {$tarefa['concluida']}
    )";
  }
  mysqli_query($conexao, $sqlGravar);
}

function buscar_tarefa($conexao, $id) {
  $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
  $resultado = mysqli_query($conexao, $sqlBusca);
  return mysqli_fetch_assoc($resultado);
}

function editar_tarefa($conexao, $tarefa) {
  if (is_null($tarefa['prazo'])) {
    $sql = "
      UPDATE tarefas SET
        nome = '{$tarefa['nome']}',
        descricao = '{$tarefa['descricao']}',
        prioridade = '{$tarefa['prioridade']}',
        prazo = null,
        concluida = '{$tarefa['concluida']}'
      WHERE id = {$tarefa['id']}          
    ";
  } else {
    $sql = "
      UPDATE tarefas SET
        nome = '{$tarefa['nome']}',
        descricao = '{$tarefa['descricao']}',
        prioridade = '{$tarefa['prioridade']}',
        prazo = '{$tarefa['prazo']}',
        concluida = '{$tarefa['concluida']}'
      WHERE id = {$tarefa['id']}          
    ";
  }
  mysqli_query($conexao, $sql);
}

function remover_tarefa($conexao, $id) {
  $sqlRemover = "DELETE FROM tarefas WHERE id = {$id}";
  mysqli_query($conexao, $sqlRemover);
}