<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$numeronota = $_POST['numeronota'];
$id_produto = $_POST['lblnome'];
$id_fornecedor = $_POST['empresa_fornecedora'];
$quantidade =  $_POST['quantidade'];
$quantidade2 = (float)$quantidade;
$vlrunitario = $_POST['vlrunitario'];


$valida_produto_estoque = select($conn, "estoque", "id_produto_fk = {$id_produto}","id_produto_fk");

if ($valida_produto_estoque[0]["id_produto_fk"] != "")     {
    $quantidade_estoque = select($conn, "estoque", "id_produto_fk = {$id_produto}","quantidade");
    $quantidade_atualizada = $quantidade_estoque[0]['quantidade'] + $quantidade2; 
    $valor_produto = select($conn, "estoque", "id_produto_fk = {$id_produto}","valor_produto");
    
    if($valor_produto[0]['valor_produto'] <= $vlrunitario )
        $valor_produto_atualizado = $valor_produto[0]['valor_produto']; 
    else
        $valor_produto_atualizado = $vlrunitario; 

    $cadastroestoque = update($conn, 'estoque', [
            'quantidade' => $quantidade_atualizada,
            'valor_produto' => $valor_produto_atualizado
    ], "id_produto_fk = {$id_produto}" );

    $cadastronota = insert($conn, 'nota',[
        'produto_id_fk' => $id_produto,
        'empresaid_fk' => $id_fornecedor,
        'ValorUnitario' => "'".$vlrunitario."'",
        'numero_nota' => "'".$numeronota."'",
        'quantidade_produtos' => $quantidade2,
        'valor_nota' => "'".$quantidade2 * $vlrunitario."'"
    ]);

    if (true == $cadastronota
    ) {?>

     <script type="text/javascript">
         alert("Cadastro Realizado com sucesso!")
     </script>
    <?php
    }else{
        ?>  
     <script type="text/javascript">
         alert("Cadastro Não Realizado")
     </script>
     <?php

    }

}else{
    $cadastroestoque = insert($conn, 'estoque',[
            'id_produto_fk' => $id_produto,
            'quantidade' => $quantidade2
    ]);
    
    $cadastronota = insert($conn, 'nota',[
            'produto_id_fk' => $id_produto,
            'empresaid_fk' => $id_fornecedor,
            'ValorUnitario' => "'".$vlrunitario."'",
            'numero_nota' => "'".$numeronota."'",
            'quantidade_produtos' => $quantidade2,
            'valor_nota' => "'".$quantidade2 * $vlrunitario."'"
    ]);

    if (true == $cadastronota
    ) {?>

     <script type="text/javascript">
         alert("Cadastro Realizado com sucesso!")
     </script>
    <?php
    }else{
        ?>  
     <script type="text/javascript">
         alert("Cadastro Não Realizado")
     </script>
     <?php


    }
}
    echo final1();
    ?>
    <meta http-equiv="refresh" content="1; url=paginainicial.php">