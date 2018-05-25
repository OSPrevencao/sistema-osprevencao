<?php
require __DIR__.'/../conexao.php';
require __DIR__.'/../funcoes.php';

$nome = $_GET['produto'];
$quantidade = $_GET['quantidade'];
$productId = $_GET['productId'];

//TO-DO: QUERY
$search = select($conn, "produtos_compra", " quantidade > {$quantidade} AND id = {$productId}");

if (!empty($search)) {
    http_response_code(200);
    exit();
}

http_response_code(400);
exit();