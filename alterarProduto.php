<?php 
    include_once('funcoes.php');
    include_once('sessao.php');
    include_once('conexao.php');
    echo inicio();
    $produto = select($conn, "produtos_compra", "id = {$_GET['id']}");
    $produto = $produto[0];

 ?>


 
 <?php 
    echo final1();
  ?>