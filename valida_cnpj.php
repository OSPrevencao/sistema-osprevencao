<?php
include_once("conexao.php");
include_once("funcoes.php");
$cnpj = $_GET['cnpj'];

$found = select($conn, "empresa", "cnpj = '{$cnpj}'");
if (empty($found)) {
    exit(json_encode([
        "status" => "sucesso"
    ]));
}

exit(json_encode([
    "status" => "erro"
]));