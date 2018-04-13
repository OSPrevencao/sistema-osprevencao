
<?php

$_POST = filter_var_array($_POST);
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();
//----------------------------
//conteudo da pagina
include_once('conexao.php');
$nomeproduto = $_POST['lblnome'];
$descricao = $_POST['lbldescricao'];
$id_Empresa_Fk =  $_POST['empresa_fornecedora'];
$quantidade_estoque =  (float)$_POST['quantidade'];

$cadastraproduto = insert($conn,
        'produto',['id_Empresa_Fk' => $id_Empresa_Fk, 'produto' => $nomeproduto, 'descricao'=> $descricao] );

// var_dump($cadastraproduto);

    $id_produto = mysqli_insert_id($conn);
    $cadastroestoque = insert($conn, "estoque",['quantidade' => $quantidade_estoque, 'id_produto_fk' => $id_produto] );
    // var_dump($cadastroestoque);  
    // 
    // #VERIFICAR!!!!
    // 
if (!$cadastrofeito= mysqli_query($conn,$cadastroestoque)
) {
    echo "Cadastro Realizado com Sucesso!!";

}else{
   echo "Cadastro não realizado";
}
//-----------------------
echo final1();
