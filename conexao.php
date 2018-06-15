<?php
    $servidor = "127.1.0.0";
     $usuario = "root";
     $senha = "";
     $dbname = "osprevencao2";
    
    //Criar a conexão
     $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

     mysqli_set_charset($conn, 'utf8');
