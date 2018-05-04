<?php 
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();

?>
<!-- conteudo da pagina -->

<div class="card-header">Cadastro de Usuário</div>
<div class="card-body">
	<form method="POST" action="cadastrousuario.php">
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-6">
					<label for="nome_usuario">Nome do Usuario</label>
					<input class="form-control title_case" id="nome_usuario" type="text" name= "nome_usuario"  placeholder="Digite o nome do Usuário">
				</div>
				<div class="col-md-6">
					<label for="e-mail">E-Mail</label>
					<input class="form-control" id="email" type="email" name="email_usuario" placeholder="Digite um E-Mail">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for=" login"> Login</label>
			<input class="form-control" id=" login" type="text" name="login_usuario"  placeholder="Digite um login">
		</div>
		<div class="form-group">
			<div class="form-row">
				<label for="senha">Senha</label>
				<input class="form-control" id="senha" type="password" name="senha_usuario" placeholder="Digite uma senha">
			</div>
		</div>
		<input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
	</form>
</div>
<?php
echo final1();
?>