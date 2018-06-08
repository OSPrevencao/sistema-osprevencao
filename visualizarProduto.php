<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$produto = select($conn, "produtos_compra", "id = {$_GET['id']}");
$produto = $produto[0];
$produto2 = select($conn, "produto", "id = {$_GET['id']}");
$produto2 = $produto2[0];

 ?>


<div class="card-header "><b style="font-size:20px; text-align: center;"> Dados da Empresa</b></div>
<div  class="card-body">


   <?php 
       echo "<p style ='font-size: 19px; ' ><b>Nome do Produto:  </b></p>";
   
       echo $produto['produto'];
       echo "</p> <hr>
      ";
       echo "<p  style ='font-size: 19px; '><b>Quantidade em estoque:  </b></p>";
      
       echo $produto['quantidade'];
       echo "</p><hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>Descrição do Produto:  </b></p>";
      
       echo $produto2['descricao'];
       echo "</p><hr>
        "; 
   ?>
<a style="float:right; margin-bottom: 10px;" href='estoque.php' class = "btn btn-danger">
    Voltar
</a>

</div>
</div> 

 <?php  
echo final1();
?>