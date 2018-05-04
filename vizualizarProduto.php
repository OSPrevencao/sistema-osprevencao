<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
    $produto = select($conn, "produtos_compra", "id = {$_GET['id']}");
    $produto = $produto[0];
 ?>


<div class="card-header "><b style="font-size:20px; text-align: center;"> Dados da Empresa</b></div>
<div  class="card-body">


   <?php 
       echo "<p style ='font-size: 19px; ' ><b>Nome do Produto:  </b></p>";
   
       echo $produto['produto'];
       echo "</p> <hr>
      ";
       echo "<p  style ='font-size: 19px; '><b>Nome do Fornecedor:  </b></p>";
      
       echo $produto['NomeEmpresa'];
       echo "</p> <hr>
       ";
       echo "<p  style ='font-size: 19px; '><b>Quantidade em estoque:  </b></p>";
      
       echo $produto['quantidade'];
       echo "</p><hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>Descrição do Produto:  </b></p>";
      
       echo $produto['descricao'];
       echo "</p><hr>
        "; 
       // echo "<p  style ='font-size: 19px; '><b>Cidade:  </b></p>";
      
       // echo $produto['cidade'];
       // echo "</p><hr>
       // "; 
       // echo "<p  style ='font-size: 19px; '><b>Estado:  </b></p>";
      
       // echo $produto['estado'];
       // echo "</p><hr>
       // "; 
   ?>
<a style="float:right; margin-bottom: 10px;" href='estoque.php' class = "btn btn-danger">
    Voltar
</a>

<!-- <a style="float:right; margin-right: 5px;" href='alterarProduto.php?id=<?php //echo $produto['id']; ?>' class = "btn btn-success"> -->
   <!--  Alterar cadastro
</a> -->
</div>


 <?php  
 final1();
?>