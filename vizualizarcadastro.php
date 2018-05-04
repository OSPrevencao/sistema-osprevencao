<?php  
include_once('funcoes.php');
include_once('conexao.php');
include_once('sessao.php');

echo inicio();
$empresa = select($conn, "empresa_dados", "id = {$_GET['id']}");
$empresa = $empresa[0];
?>


<div class="card-header "><b style="font-size:20px; text-align: center;"> Dados da Empresa</b></div>
<div  class="card-body">


   <?php 
       echo "<p style ='font-size: 19px; ' ><b>Nome da Empresa:  </b></p>";
   
       echo $empresa['NomeEmpresa'];
       echo "</p> <hr>
      ";
       echo "<p  style ='font-size: 19px; '><b>CNPJ:  </b></p>";
      
       echo $empresa['cnpj'];
       echo "</p> <hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>Telefone  </b>";
       //
       echo "<b>".($empresa['TipoTelefone']." :</b><br> ");
       echo $empresa['telefone_completo'];
       echo "</p> <hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>CEP:  </b></p>";
      
       echo $empresa['CEP'];
       echo "</p><hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>Endereço:  </b></p>";
      
       echo $empresa['endereco_completo'];
       echo "</p><hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>Cidade:  </b></p>";
      
       echo $empresa['cidade'];
       echo "</p><hr>
       "; 
       echo "<p  style ='font-size: 19px; '><b>Estado:  </b></p>";
      
       echo $empresa['estado'];
       echo "</p><hr>
       "; 
   ?>
<a style="float:right; margin-bottom: 10px;" href='clientes.php' class = "btn btn-danger">
    Voltar
</a>

<a style="float:right; margin-right: 5px;" href='alterarcliente.php?id=<?php echo $empresa['id']; ?>' class = "btn btn-success">
    Alterar cadastro
</a>
</div>

<?php echo final1(); ?>