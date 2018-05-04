<?php

$nome = $_GET['produto'];
$quantidade = $_GET['quantidade'];

//TO-DO: QUERY
select();

$response = [
    'valid' => //colocar o resultado da query
];
exit(json_encode($response));
