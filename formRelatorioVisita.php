<?php 
include_once('sessao.php');
include_once('conexao.php');
echo "<pre>";
var_dump($_POST);
echo "</pre>";

$idEmpresa = $_POST['idEmpresa']
$descricao_obra = $_POST['descricao_obra']
if (isset($_POST["produtos"])) {
    $_POST["produtos"] = json_decode($_POST["produtos"], true);
}
var_dump($produtos);
die();



$insert = "INSERT INTO SOMETHING (FIELD,FIELD) VALUES "
$produtos = [];
foreach ($_POST["produtos"] as $produto => $qtde) {
    $produtos[] =  "({$produto}, {$qtde})";   
}

$produtos = implode(", ", $produtos);
$insert .= $produtos.";";

mysqli_exec($insert);


if (true == $insert
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


header("Location: orcamentos.php");
exit();