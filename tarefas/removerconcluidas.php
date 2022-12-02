<?php
include "banco.php";
remover_concluidas($conexao);
header('Location: tarefas.php');
