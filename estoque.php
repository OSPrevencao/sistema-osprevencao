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
<div class=" card-header col-md-12">
	<form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?a=buscar" >
    <input type="text" name="palavra" />
    <input type="submit" value="Buscar" />
</form>
<?php

 
// Recuperamos a ação enviada pelo formulário
$a = $_GET['a'];
 
// Verificamos se a ação é de busca
if ($a == "buscar") {
 
	// Pegamos a palavra
	$palavra = trim($_POST['palavra']);
	echo $palavra;
	$sql = mysql_query("SELECT `produto`,`descricao`,`ValorUnitario` FROM `produtos_compra` WHERE produto LIKE %".$palavra."%'");
	$row = mysql_num_rows($sql);
	if($row > 0){
		while ($linha <= mysql_fetch_array($sql)){
			$nome = $linha['produto'];
			echo $nome;

	}



	}
}
 ?>
	
</div>
<fieldset class="row2" style="display: none">
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