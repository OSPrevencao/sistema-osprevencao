<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();

include_once('conexao.php');
$numeroproduto = $_POST['lblnumero'];
$codigoRegistro = $_POST['lblcodigo'];
$quantidade =  $_POST['lblquantidade'];
$quantidade2 = (float)$quantidade;


$cadastraproduto ="INSERT INTO `estoque`( `id_produto_fk`, `id_tipoRegistro_fk`, `quantidade`) VALUES ($numeroproduto,$codigoRegistro,$quantidade2);";


if ($cadastrofeito= mysqli_query($conn,$cadastraproduto)
) {
  echo "Cadastro Realizado com Sucesso!!";
}else{
  echo "Cadastro não realizado";
}

echo final1();
?>
