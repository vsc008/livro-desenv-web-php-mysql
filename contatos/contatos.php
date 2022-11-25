<?php

session_start();
include "banco.php";
include "ajudantes.php";

if (isset($_GET['nome']) && $_GET['nome'] != '') {
  $contato = array();
  
  $contato['nome'] = $_GET['nome'];

  if (isset($_GET['telefone'])) {
    $contato['telefone'] = $_GET['telefone'];
  } else {
    $contato['telefone'] = '';
  }

  if (isset($_GET['email'])) {
    $contato['email'] = $_GET['email'];
  } else {
    $contato['email'] = '';
  }

  if (isset($_GET['descricao'])) {
    $contato['descricao'] = $_GET['descricao'];
  } else {
    $contato['descricao'] = '';
  }

  if (isset($_GET['datanasc'])) {
    $contato['datanasc'] = traduz_data_para_banco($_GET['datanasc']);
  } else {
    $contato['datanasc'] = '';
  }
  
  if (isset($_GET['favorito'])) {
    $contato['favorito'] = 1;
  } else {
    $contato['favorito'] = 0;
  }

  // $_SESSION['lista_contatos'][] = $contato;
  gravar_contato($conexao, $contato);
}

// if (isset($_SESSION['lista_contatos'])) {
//   $lista_contatos = $_SESSION['lista_contatos'];
// } else {
//   $lista_contatos = array();
// }

$lista_contatos = buscar_contatos($conexao);

function buscar_contatos($conexao) {
  $sqlBusca = 'SELECT * FROM contatos';
  $resultado = mysqli_query($conexao, $sqlBusca);

  $contatos = array();
  while ($contato = mysqli_fetch_assoc($resultado)) {
    $contatos[] = $contato;
  }
  return $contatos;
}

include "template.php";