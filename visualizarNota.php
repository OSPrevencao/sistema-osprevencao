<?php 
//realizar a filtragem por numero nota
//colocar produtos comprados, valor unitário, nome do fornecedor, valor total da nota, e data da compra

include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$nota = select($conn, "nota", "numero_nota = {$_GET['numero_nota']}");
// $nota2 = select($conn, "nota", "numero_nota = {$_GET['numero_nota']}","produto_id_fk");

//join com produto e fornecedor para obter o nome do produto e do fornecedor
// $produto2 = select($conn, "produto", "numero_nota = {$_GET['numero_nota']}");
// $produto2 = $produto2[0];
// print_r($nota);

 ?>


<div class="card-header "><b style="font-size:20px; text-align: center;"> Dados da Empresa</b></div>
<div  class="card-body">


   <?php 
       echo "<p style ='font-size: 19px; ' ><b>Número da Nota:  </b></p>";
   
       echo $nota[0]['numero_nota'];
       echo "</p> <hr>
      ";
       echo "<p  style ='font-size: 19px; '><b>Produtos Comprados:  </b></p>";
       $contt = 1;
      foreach ($nota as $row) {
            $produto = select($conn, "produto", "id =".$row['produto_id_fk']."","produto");
           echo $contt ;
           echo " - ";
           print_r($produto[0]['produto']);
           echo "</p>
           "; 
           $contt ++;
      }
      echo "<p><hr></p>
           ";
       echo "<p  style ='font-size: 19px; '><b>Valor do Produto:  </b></p>";

       $contt = 1;
       $valor_total = 0.00;
      foreach ($nota as $row) {
            $produto = select($conn, "nota", "produto_id_fk =".$row['produto_id_fk']."","valor_nota");
            $valor_total += (float)$produto[0]['valor_nota'];
            // echo $valor_total;
           echo $contt ;
           echo " - R$";
           print_r($produto[0]['valor_nota']);
           echo "</p>
           "; 
           $contt ++;
      }
      echo "<p><hr></p>
           ";
        echo "<p  style ='font-size: 19px; '><b>Valor Total da Nota:  </b></p>";
      
            echo "R$ ".$valor_total;
            echo ",00";
       // echo $nota2['descricao'];
       echo "</p><hr>
        "; 
   ?>
<a style="float:right; margin-bottom: 10px;" href='nota.php' class = "btn btn-danger">
    Voltar
</a>
<a style="float:right; margin-bottom: 10px;" href= "adicionarProdutoNota.php?numero_nota=<?php echo $nota[0]['numero_nota']; ?>" class = "btn btn-success">
    Adicionar produtos à nota
</a>

</div>
</div> 

 <?php  
echo final1();
?>