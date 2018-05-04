<?php 
include_once('funcoes.php');
include_once('conexao.php');


$varSelect = select($conn, 'produto', '','id', 'produto');

$varSelect = array_column($varSelect , 'produto');
exit(json_encode($varSelect));