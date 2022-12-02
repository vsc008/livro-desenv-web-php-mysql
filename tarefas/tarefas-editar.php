<?php

session_start();
include "banco.php";
include "ajudantes.php";

if (isset($_GET['nome']) && $_GET['nome'] != '') {
  $tarefa = array();

  $tarefa['id'] = $_GET['id'];
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

  if (isset($_GET['id']) && $_GET['id'] != '') {
    editar_tarefa($conexao, $tarefa);
  } else {
    gravar_tarefa($conexao, $tarefa);
  }
  header('Location: tarefas.php');
  die();
}

if (isset($_GET['id']) && $_GET['id'] != '') {
  $tarefa = buscar_tarefa($conexao, $_GET['id']);
  $exibir_tabela = false;
} else {
  $lista_tarefas = buscar_tarefas($conexao);
  $exibir_tabela = true;
  $tarefa = array(
    'id' => 0,
    'nome' => '',
    'descricao' => '',
    'prazo' => '',
    'prioridade' => 1,
    'concluida' => ''
  );
}

include "template.php";