<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$result = select($conn,	'produtos_compra');

?>
<div class="card-header">
<h1>Estoque</h1>
</div>
<div class=" card-header ">
	<form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" >
		<div class="form-group">    
            <div class="form-row">
                <div class="col-md-6">
    				<input type="text" name="palavra" class="title_case form-control col-md-10">
    			</div>
    			<div class="col-md-6">
    				<input type="submit" value="Buscar" class="btn btn-success col-md-2">
    			</div>
    		</div>
    	</div>
	</form>
</div>
<?php

 
// Recuperamos a ação enviada pelo formulário
$a = $_GET['a'];
 
// Verificamos se a ação é de busca
if ($a == "buscar") {
 
	// Pegamos a palavra
	$palavra = trim($_POST['palavra']);
	


$sql=mysqli_query($conn,"SELECT `produto`,`descricao`, `quantidade` FROM `produtos_compra` WHERE produto LIKE '%".$palavra."%'");


	$linha = mysqli_fetch_assoc($sql);
	$total = mysqli_num_rows($sql);

	}
echo "<div>";

	// se o número de resultados for maior que zero, mostra os dados
	if($total > 0) {
		// inicia o loop que vai mostrar todos os dados
		do {

			echo "<p><strong>Nome_:</strong> ".$linha['produto']." <strong>Descrição_:</strong> ".$linha['descricao']." <strong>Quantidade_:</strong> ".$linha['quantidade']."</p>";

		// finaliza o loop que vai mostrar os dados
		}while($linha = mysqli_fetch_assoc($sql));
	// fim do if 
	}
?>

 </div>
	
<fieldset class="row3">
	<legend><font color="white">-</font></legend>
	<p>
		<table class="table table-inverse table-responsive">
			<thead>
			    <tr>
			        <th>Nome do Produto</th>
			        <th>Nome do Fornecedor</th>
			        <th>Quantidade em Estoque</th>
			        <th></th>
			    </tr>
		  	</thead>
	    	<tbody>
	   			<?php 
	   			foreach ($result as $row) {?>
						<tr>
					  		<td><?php echo $row['produto'] ; ?></td>
					      	<td><?php echo $row['NomeEmpresa'] ; ?></td>
					      	<td><?php echo $row['quantidade'] ; ?></td>
					      	<td>
					      	<a id="vizualizarcadastro" href='vizualizarProduto.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                Vizualizar cadastro
                            </a>
                            <!-- <a id="alterarcadastro" href='vizualizarProduto.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                Alterar cadastro
                            </a> -->
                       		 </td>
					    </tr>
					
				<?php }
				?>
			</tbody>
		</table>
	</p>
</fieldset>

<?php
echo final1();
?>