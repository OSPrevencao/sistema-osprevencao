
<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$nota = update($conn, "orcamento", [
    'id_status_fk' => 2
], "id = {$_GET['id']}");

echo final1();

 ?>
<meta http-equiv="refresh" content="1; url=orcamentos.php">
