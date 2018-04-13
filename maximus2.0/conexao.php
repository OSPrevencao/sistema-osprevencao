<?php
    //conexao local
	
	// $servidor = "127.0.0.1";
 //    $usuario = "root";
 //    $senha = "";
 //    $dbname = "osprevencao";
	
	// //Criar a conexão
	// $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

    //conexao no servidor
    $servidor = "mysql472.umbler.com";
    $usuario = "osprevencao";
    $senha = "sistemadovo";
    $dbname = "osprevencao";
    
    //Criar a conexão
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

