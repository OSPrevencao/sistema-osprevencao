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
<fieldset class="row2">
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