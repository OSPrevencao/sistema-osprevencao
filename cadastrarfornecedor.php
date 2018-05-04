<?php 
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();
?>
<!-- conteudo da pagina -->

<div class="card-header">Cadastro de Fornecedores</div>
<div class="card-body">
	<form method="POST" action="cadastrofornecedor.php">
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-8">
					<label for="nome_empresa">Nome do Empresa</label>
					<input class="form-control title_case" id="nome_empresa" type="text" name= "nome_empresa"  placeholder="Digite o nome da empresa">
				</div>
				<div class="col-md-4">
					<label for="cnpj">CNPJ</label>
					<input class="form-control cnpj" id="cnpj" type="text" name="cnpj" placeholder="Digite o CNPJ">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-3">
				<label for="tipo_telefone">Tipo de Telefone:</label>
  				<select class="form-control" id="tipo_telefone" name="tipo_telefone">
					<option value="celular">Celular</option>
					<option value="empresarial">Empresarial</option>
					<option value="recados">Recados</option>
				</select>
			</div>
			<div class="col-md-3">
				<label for="ddd">DDD</label>
				<input class="form-control" id="ddd" type="text" name= "ddd"  placeholder="Digite o DDD">
			</div>
			<div class="col-md-6">
				<label for="telefone">Telefone</label>
				<input class="form-control" id="telefone" type="text" name= "telefone"  placeholder="Digite o telefone">
			</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		
		<div class="form-row">
			<div class="col-md-2">
				<label for="cep">CEP</label>
				<input class="form-control cep" id="cep" type="text" name="cep" placeholder="Digite o CEP">
			</div>
			<div class="col-md-2">
				<label for="logradouro">Logradouro</label>
  				<select class="form-control" id="logradouro" name="logradouro">
					<option value="rua">Rua</option>
					<option value="avenida">Avenida</option>
					<option value="estrada">Estrada</option>
					<option value="alameda">Alameda</option>
				</select>
			</div>
			<div class="col-md-8">
				<label for="endereco">Endereco</label>
				<input class="form-control title_case" id="endereco" type="text" name= "endereco"  placeholder="Digite o Endereço">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="numero">Número</label>
				<input class="form-control" id="numero" type="text" name="numero" placeholder="Digite o Número">
			</div>
			<div class="col-md-6">
				<label for="complemento">Complemento</label>
				<input class="form-control title_case" id="complemento" type="text" name= "complemento"  placeholder="Digite o Complemento">
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-6">
				<label for="cidade">Cidade</label>
				<input class="form-control title_case" id="cidade" type="text" name="cidade" placeholder="Digite a Cidade">
			</div>
			<div class="col-md-6">
				<label for="estado">Estado</label>
				<input class="form-control title_case" id="estado" type="text" name="estado" placeholder="Digite o Estado">
			</div>
		</div>
		<br>
		<br>
		<br>

		<input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
	</form>
</div>
<?php
echo final1();
?>