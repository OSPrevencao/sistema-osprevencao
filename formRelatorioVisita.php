<?php 
include_once('sessao.php');
include_once('funcoes.php');
include_once('conexao.php');
echo inicio();
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
$produto_proprio = isset($_POST['produto_proprio']);
$dtvisita = $_POST['dtvisita'];
$vlr_mao_de_obra = $_POST['vlr_mao_de_obra'];
$dtinicio = $_POST['dtvisita'];
$dtermino = $_POST['dtermino'];
$status = \App\StatusOrcamento::ESPERANDO_APROVACAO;
$idEmpresa = $_POST['idEmpresa'];
$descricao_obra = $_POST['descricao_obra'];


$insert_visita = insert($conn, "agendavisita", [
    'Empresa_id_fk'=> $idEmpresa,
    'data_visita' => "'".$dtvisita."'"
]);

$insert_obra = insert($conn, "obra", [
    'DataFim'=> "'".$dtinicio."'",
    'descricao'=> "'".$descricao_obra."'",
    'dataInicio' => "'".$dtermino."'"
]);

$insert_orcamento = insert($conn, "orcamento", [
    'empresa_fk'=> $idEmpresa,
    'id_status_fk' => $status,
    'id_visita_fk' =>$insert_visita ,
    'id_obra_fk' => $insert_obra,
    'ValorMaoObra' => "'".$vlr_mao_de_obra."'"
]);


//verifica se o produto vai ser comprado pela maximus 
if ($produto_proprio == "produto_selecionado" || isset($_POST["produtos"])) {

    $_POST['produtos'] = decodeFormat($_POST['produtos']);
    echo $insert_orcamento;
    //montando um insert da lista de materiais
    $insert = "INSERT INTO listamateriais (id_Produto_fk, quantidadeProduto, id_Orcamento_fk) VALUES ";
    $produtos = [];
    foreach ($_POST["produtos"] as $produto => $qtde) {
        //buscando o id do produto que foi selecionado
        $produto2 = select($conn, "produto", "produto = '{$produto}'", "id");
        $produtos[] =  "(".$produto2[0]['id'].", {$qtde}, ".$insert_orcamento.")";
        //buscando a quantidade em estoque do respectivo produto
        $quantidade_estoque = select($conn, "estoque", "id_Produto_fk =".$produto2[0]['id'], "quantidade");
        //fazendo um update na tabela de produtos, atualizando a quantidade em estoque.
        $update_estoque = update($conn, "estoque", [
            'quantidade' => $quantidade_estoque[0]['quantidade'] - $qtde
            ], "id_Produto_fk =".$produto2[0]['id'] );
    }

    $produtos = implode(", ", $produtos);
    $insert .= $produtos.";";


    mysqli_query($conn, $insert);

    
    if (true == $insert){
        ?>

        <script type="text/javascript">
            alert("Alteração Realizada com sucesso!")
        </script>
        <?php
    }else{
        ?>  
        <script type="text/javascript">
            alert("Alteração Não Realizada")
        </script>
        <?php
        exit();

    }

    echo final1();


    ?>
    <meta http-equiv="refresh" content="1; url=orcamentos.php">
    
    <?php  
    exit();
}

if (true == $insert_orcamento){
    ?>

    <script type="text/javascript">
        alert("Alteração Realizada com sucesso!")
    </script>
    <?php
}else{
    ?>  
    <script type="text/javascript">
        alert("Alteração Não Realizada")
    </script>
    <?php
    exit();

}

echo final1();
?>
    <meta http-equiv="refresh" content="1; url=orcamentos.php">
    
<?php  
    exit();
?>