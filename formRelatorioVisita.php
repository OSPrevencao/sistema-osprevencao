<?php 
include_once('sessao.php');
include_once('funcoes.php');
include_once('conexao.php');
echo inicio();
// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$dtvisita = $_POST['dtvisita'];
$vlr_mao_de_obra = $_POST['vlr_mao_de_obra'];
$dtinicio = $_POST['dtvisita'];
$dtermino = $_POST['dtermino'];
$status = \App\StatusOrcamento::ESPERANDO_APROVACAO;
$idEmpresa = $_POST['idEmpresa'];
$descricao_obra = $_POST['descricao_obra'];

// if ($produto_proprio == true) {
// if (isset($_POST["produtos"])) {
//     $_POST['produtos'] = json_decode($_POST['produtos']);
// }
// var_dump($_POST["produtos"]);
// echo  PHP_EOL, json_last_error(); //JSON_SINTAX_ERROR
// die();
// $insert = "INSERT INTO listamateriais (FIELD,FIELD) VALUES ";
// $produtos = [];
// foreach ($_POST["produtos"] as $produto => $qtde) {
//     $produtos[] =  "({$produto}, {$qtde})";   
// }

// $produtos = implode(", ", $produtos);
// $insert .= $produtos.";";

// var_dump($_POST);
// }
//---------------------------------------

echo $dtvisita;
echo $dtinicio;
echo $dtermino;
echo $status;
echo $idEmpresa;
echo $vlr_mao_de_obra;
// echo $insert;
echo $descricao_obra;

die();

mysqli_exec($insert);

if (true == $insert
) {
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


header("Location: orcamentos.php");
exit();