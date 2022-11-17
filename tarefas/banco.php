<?php
$bdServidor = '127.0.0.1';
$bdUsuario = 'sistematarefas';
$bdSenha = 'sistema';
$bdBanco = 'tarefas';

/* You should enable error reporting for mysqli before attempting to make a connection */
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

/* Set the desired charset after establishing a connection */
mysqli_set_charset($mysqli, 'utf8');

//printf("Success... %s\n", mysqli_get_host_info($mysqli));