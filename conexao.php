<?php
//conexão com o servidor
   $servidor = "localhost";
     $usuario = "root";
     $senha = "";
     $dbname = "osprevencao2";
    
    // //Criar a conexão
     $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
     mysqli_set_charset($conn, 'utf8');

