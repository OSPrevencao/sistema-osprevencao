<?php 
include_once('funcoes.php');
include_once('conexao.php');


$varSelect = select($conn, 'produtos_compra', '','produto as label, id as value');

exit(json_encode($varSelect));