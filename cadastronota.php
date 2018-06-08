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
$datanota = $_POST['datanota'];
$valor_nota = $quantidade2 * $vlrunitario;


$cadastro_estoque = insert($conn, 'estoque', [
    'id_produto_fk' => $id_produto,
    'quantidade' => $quantidade2,

]);

$cadastro_nota = insert($conn, 'nota', [
    'produto_id_fk' => $id_produto,
    'empresaid_fk' => $id_fornecedor,
    'ValorUnitario' => $vlrunitario,
    'numero_nota' => $numeronota,
    'valor_nota' => $valor_nota,
    'quantidade_produtos' => $quantidade,
    'data_compra' => $datanota,

]);


if (FALSE === ($cadastro_estoque and $cadastro_nota)) {
    echo "Cadastro não realizado";
    echo final1();

    exit();
}

 ?>
 <div class="text-center">
     <?php echo "Cadastro Realizado" ; ?>
 </div>
 <script type="text/javascript">
     alert("Cadastro Realizada com sucesso!")
 </script>

<?php 
echo final1();  
?>

<meta http-equiv="refresh" content="1; url=paginainicial.php">

