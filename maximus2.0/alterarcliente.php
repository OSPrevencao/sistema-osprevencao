<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
	$empresa = select($conn, "empresa_dados", "id = {$_GET['id']}");
 	$empresa = $empresa[0];
?>

<div class="card-header">Alterar Cadastro</div>
<div class="card-body">
	<form method="POST" action="alteracaocliente.php">
		<input type="hidden" name = "empresa_id" value = "<?php echo $empresa['id']; ?>">
		<input type="hidden" name = "tipotelefone_id" value = "<?php echo $empresa['id_tipo_telefone']; ?>">
		<input type="hidden" name = "telefone_id" value = "<?php echo $empresa['id_telefone']; ?>">
		<input type="hidden" name = "estado_id" value = "<?php echo $empresa['id_estado']; ?>">
		<input type="hidden" name = "logradouro_id" value = "<?php echo $empresa['id_logradouro']; ?>">
		<input type="hidden" name = "cep_id" value = "<?php echo $empresa['id_cep']; ?>">
		<input type="hidden" name = "cidade_id" value = "<?php echo $empresa['id_cidade']; ?>">
		<div class="form-group">	
			<div class="form-row">
				<div class="col-md-8">
					<label for="nome_empresa">Nome do Empresa</label>
					<input class="form-control title_case" id="nome_empresa" type="text" name= "nome_empresa"  placeholder="Digite o nome da empresa" value="<?php echo $empresa['NomeEmpresa'] ?? ''; ?>">
				</div>
				<div class="col-md-4">
					<label for="cnpj">CNPJ</label>
					<input class="form-control cnpj" id="cnpj" type="text" name="cnpj" placeholder="Digite o CNPJ" value="<?php echo $empresa['cnpj'] ?? ''; ?>">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-3">
				<label for="tipo_telefone">Tipo de Telefone:</label>
  				<select class="form-control" id="tipo_telefone" name="tipo_telefone">
					<option value="celular" <?php echo isSelected($empresa['TipoTelefone'] ?? '', 'celular');; ?>>Celular</option>
					<option value="empresarial" <?php echo isSelected($empresa['TipoTelefone'] ?? '', 'empresarial');; ?>>Empresarial</option>
					<option value="recados" <?php echo isSelected($empresa['TipoTelefone'] ?? '', 'recados');; ?>>Recados</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="ddd">DDD</label>
				<input class="form-control" id="ddd" type="text" name= "ddd"  placeholder="Digite o DDD" value="<?php echo $empresa['ddd'] ?? ''; ?>">
			</div>
			<div class="col-md-6">
				<label for="telefone">Telefone</label>
				<input class="form-control" id="telefone" type="text" name= "telefone"  placeholder="Digite o Telefone" value="<?php echo $empresa['telefone'] ?? ''; ?>">
			</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		
		<div class="form-row">
			<div class="col-md-2">
				<label for="cep">CEP</label>
				<input class="form-control cep" id="cep" type="text" name="cep" placeholder="Digite o  CEP" value="<?php echo $empresa['CEP'] ?? ''; ?>">
			</div>
			<div class="col-md-2">
				<label for="logradouro">Logradouro</label>
  				<select class="form-control" id="logradouro" name="logradouro">
					<option value="rua" <?php echo isSelected($empresa['Lougradouro'] ?? '', 'rua'); ?>>Rua</option>
					<option value="avenida" <?php echo isSelected($empresa['Lougradouro'] ?? '', 'avenida'); ?>>Avenida</option>
					<option value="estrada" <?php echo isSelected($empresa['Lougradouro'] ?? '', 'estrada'); ?>>Estrada</option>
					<option value="alameda" <?php echo isSelected($empresa['Lougradouro'] ?? '', 'alameda'); ?>>Alameda</option>
				</select>
			</div>
			<div class="col-md-8">
				<label for="endereco">Endereco</label>
				<input class="form-control title_case" id="endereco" type="text" name= "endereco"  placeholder="Digite o Endereço" value="<?php echo $empresa['Endereco'] ?? ''; ?>">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="numero">Número</label>
				<input class="form-control" id="numero" type="text" name="numero" placeholder="Digite o Número" value="<?php echo $empresa['Numero'] ?? ''; ?>">
			</div>
			<div class="col-md-6">
				<label for="complemento">Complemento</label>
				<input class="form-control title_casel" id="complemento" type="text" name= "complemento"  placeholder="Digite o Complemento" value="<?php echo $empresa['complemento'] ?? ''; ?>">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="cidade">Cidade</label>
				<input class="form-control title_case" id="cidade" type="text" name="cidade" placeholder="Digite a Cidade " value="<?php echo $empresa['cidade'] ?? ''; ?>">
			</div>
			<div class="col-md-6">
				<label for="estado">Estado</label>
				<input class="form-control title_case" id="estado" type= "text" name="estado" placeholder="Digite o Estado" value="<?php echo $empresa['estado'] ?? ''; ?>">
			</div>
		</div>
		<br>
		<br>
		<br>

		<input class="btn btn-primary btn-block" type="submit" name="btn" value="Alterar Cadastro" >
	</form>
</div>
<?php
echo final1();
?>