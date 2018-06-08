
<?php

$_POST = filter_var_array($_POST);
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$nomeproduto = $_POST['lblnome'];
$descricao = $_POST['lbldescricao'];

$cadastraproduto = insert($conn,
    'produto',[
        'produto' => $nomeproduto, 
        'descricao'=> $descricao
    ] 
);
if (true == $cadastraproduto
) {?>

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
<meta http-equiv="refresh" content="1; url=paginainicial.php">
