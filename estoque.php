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
	<form name="frmBusca" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
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
<div>
<?php

// Verificamos se a ação é de busca
    if (isset($_POST['palavra'])) {
        // Pegamos a palavra
        $palavra = trim($_POST['palavra']);
        $sql = select(
            $conn,
            'produtos_compra',
            "produto LIKE '%{$palavra}%'",
            "produto, descricao, quantidade"

        );

        echo listaRegistro($sql, [
            'produto' => 'Nome: ',
            'descricao' => 'Descrição: ',
            'quantidade' => 'Quantidade: '
        ]);

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
					      	<a id="visualizarcadastro" href='visualizarProduto.php?id=<?php echo $row['id']; ?>' class = "btn btn-primary">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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