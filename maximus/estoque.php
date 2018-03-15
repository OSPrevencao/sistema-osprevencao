<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();

include_once('conexao.php');
?>
<h1>Estoque</h1>
<fieldset class="row2">
	<legend><font color="white">-</font></legend>
	<p>
		<?php
		$result = select(
			$conn,
			'estoque e INNER JOIN produto p ON e.id_produto_fk = p.id INNER JOIN tiporegistro tr ON e.id_tipoRegistro_fk = tr.id INNER JOIN empresa empr ON p.id_Empresa_Fk = empr.id'
		);
		?>
		<table class="table table-inverse">
			<thead>
			    <tr>
			        <th>Nome do Produto</th>
			        <th>Nome do Fornecedor</th>
			        <th>Quantidade em<br> Estoque</th>
			        <!-- <th>Status</th> -->
			    </tr>
		  	</thead>
	    	<tbody>
	   			<?php 
	   			foreach ($result as $row) {
					echo "
						<tr>
					  		<td>{$row['produto']}</td>
					      	<td>{$row['NomeEmpresa']}</td>
					      	<td>{$row['quantidade']}</td>
					      	
					    </tr>
					";
				}
				?>
			</tbody>
		</table>
	</p>
</fieldset>

<?php
echo final1();
?>