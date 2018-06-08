<?php 
//realizar a filtragem por numero nota
//colocar produtos comprados, valor unitário, nome do fornecedor, valor total da nota, e data da compra

include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$nota = select($conn, "nota", "numero_nota = {$_GET['numero_nota']}");
$nota = $nota[0];
//join com produto e fornecedor para obter o nome do produto e do fornecedor
// $produto2 = select($conn, "produto", "numero_nota = {$_GET['numero_nota']}");
// $produto2 = $produto2[0];

 ?>