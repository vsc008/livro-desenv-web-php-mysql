<?php

session_start();
include "banco.php";
include "ajudantes.php";

$tarefa = buscar_tarefa($conexao, $_GET['id']);
gravar_tarefa($conexao, $tarefa);
header('Location: tarefas.php');
die();

include "template.php";
