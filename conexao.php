<?php
//conexão com o servidor
   $servidor = "mysql427.umbler.com";
     $usuario = "osprevencao2";
     $senha = "sistemadovo1";
     $dbname = "osprevencao2";
    
    // //Criar a conexão
     $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
     mysqli_set_charset($conn, 'utf8');

