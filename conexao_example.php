<?php
    $servidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $dbname = "osprevencao2";
    
    // Criar a conexão
   $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
     mysqli_set_charset($conn, 'utf8');
