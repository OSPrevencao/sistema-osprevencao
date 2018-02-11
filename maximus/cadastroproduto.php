
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
$id_Empresa_Fk =  $_POST['lblempresa'];
$valorUnitario =  $_POST['lblvlrunitario'];
$valorUnitario2 = (float)$valorUnitario;

$cadastraproduto ="INSERT INTO `produto`( `id_Empresa_Fk`, `produto`, `ValorUnitario`, `descricao`) VALUES ('$id_Empresa_Fk','$nomeproduto','$valorUnitario2','$descricao');";


if ($cadastrofeito= mysqli_query($conn,$cadastraproduto)
) {
  echo "Cadastro Realizado com Sucesso!!";
}else{
 echo "Cadastro não realizado";
}
//-----------------------
echo final1();
