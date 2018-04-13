<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<h1>Estoque</h1>
<fieldset class="row2">
	<legend><font color="white">-</font></legend>
	<p>
		<?php
		$result = select(
			$conn,
			'produtos_compra'
			//'estoque e INNER JOIN produto p ON e.id_produto_fk = p.id INNER JOIN tiporegistro tr ON e.id_tipoRegistro_fk = tr.id INNER JOIN empresa empr ON p.id_Empresa_Fk = empr.id'
		);
		?>
		<table class="table table-inverse table-responsive">
			<thead>
			    <tr>
			        <th>Nome do Produto</th>
			        <th>Nome do Fornecedor</th>
			        <th>Quantidade em Estoque</th>
			        <!-- <th>Status</th> -->
			    </tr>
		  	</thead>
	    	<tbody>
	   			<?php 
	   			foreach ($result as $row) {?>
						<tr>
					  		<td><?php echo $row['produto'] ; ?></td>
					      	<td><?php echo $row['NomeEmpresa'] ; ?></td>
					      	<td><?php echo $row['quantidade'] ; ?></td>
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