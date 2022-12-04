<?php

session_start();
include "banco.php";
include "ajudantes.php";

$exibir_tabela = true;

if (isset($_POST['nome']) && $_POST['nome'] != '') {
  $tarefa = array();

  $tarefa['nome'] = $_POST['nome'];

  if (isset($_POST['descricao'])) {
    $tarefa['descricao'] = $_POST['descricao'];
  } else {
    $tarefa['descricao'] = '';
  }

  if (isset($_POST['prazo'])) {
    $tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
  } else {
    $tarefa['prazo'] = '';
  }

  $tarefa['prioridade'] = $_POST['prioridade'];

  if (isset($_POST['concluida'])) {
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
// print_r($_POST['id']);
// print '    </pre>' . "\n";
// die('Parando o script.');
