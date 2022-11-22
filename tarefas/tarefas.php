<?php

session_start();
include "banco.php";
include "ajudantes.php";

if (isset($_GET['nome']) && $_GET['nome'] != '') {
  $tarefa = array();

  $tarefa['nome'] = $_GET['nome'];

  if (isset($_GET['descricao'])) {
    $tarefa['descricao'] = $_GET['descricao'];
  } else {
    $tarefa['descricao'] = '';
  }

  if (isset($_GET['prazo'])) {
    $tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
  } else {
    $tarefa['prazo'] = '';
  }

  $tarefa['prioridade'] = $_GET['prioridade'];

  if (isset($_GET['concluida'])) {
    $tarefa['concluida'] = $_GET['concluida'];
  } else {
    $tarefa['concluida'] = '';
  }

  //$_SESSION['lista_tarefas'][] = $tarefa;
  gravar_tarefa($conexao, $tarefa);
}

// if (isset($_SESSION['lista_tarefas'])) {
//   $lista_tarefas = $_SESSION['lista_tarefas'];
// } else {
//   $lista_tarefas = array();
// }

$lista_tarefas = buscar_tarefas($conexao);

function buscar_tarefas($conexao) {
  $sqlBusca = 'SELECT * FROM tarefas';
  $resultado = mysqli_query($conexao, $sqlBusca);

  $tarefas = array();
  while ($tarefa = mysqli_fetch_assoc($resultado)) {
    $tarefas[] = $tarefa;
  }
  return $tarefas;
}

// print '<pre>' . "\n";
// print_r($_SESSION);
// print '    </pre>' . "\n";
// die('Parando o script.');

include "template.php";
