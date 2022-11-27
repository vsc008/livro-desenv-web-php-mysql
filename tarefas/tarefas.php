<?php

session_start();
include "banco.php";
include "ajudantes.php";

$exibir_tabela = true;

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
    $tarefa['concluida'] = 1;
  } else {
    $tarefa['concluida'] = 0;
  }

  //$_SESSION['lista_tarefas'][] = $tarefa;
  gravar_tarefa($conexao, $tarefa);
  header('Location: tarefas.php');
  die();
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

$tarefa = array(
  'id' => 0, 
  'nome' => '',
  'descricao' => '', 
  'prazo' => '', 
  'prioridade' => 1, 
  'concluida' => ''
);

include "template.php";

// print '<pre>' . "\n";
// print_r($_GET['id']);
// print '    </pre>' . "\n";
// die('Parando o script.');