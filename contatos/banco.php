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
