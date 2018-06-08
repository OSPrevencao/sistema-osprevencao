
<?php

$_POST = filter_var_array($_POST);
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$nome = $_POST['lblnome'];
$valordespesa1 = $_POST['valordespesa'];
$valordespesa = (float)$valordespesa1;
$data= $_POST['datad'];

$cadastrodespesa = insert($conn,
    'despesas',[
        'nome' => "'".$nome."'", 
        'valordespesa'=> "'".$valordespesa."'",
        'datadespesa'=> "'".$data."'",
    ] 
);
if (true == $cadastrodespesa
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
