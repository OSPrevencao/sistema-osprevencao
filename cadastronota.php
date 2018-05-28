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
$validade = $_POST['validade'];

$cadastroestoque = insert($conn, 'estoque', '', [
        'id_produto_fk' => $id_produto,
        'quantidade' => $quantidade2
]);
$cadastronota = insert($conn, 'nota', '', [
        'produto_id_fk' => $id_produto,
        'empresaid_fk' => $id_fornecedor,
        'ValorUnitario' => $vlrunitario,
        'numero_nota' => $numeronota,
        'quantidade_produtos' => $quantidade2,
        'valor_nota' => $quantidade2 * $vlrunitario
]);


if (FALSE == $cadastronota
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
echo final1();
?>
<meta http-equiv="refresh" content="1; url=paginainicial.php">

