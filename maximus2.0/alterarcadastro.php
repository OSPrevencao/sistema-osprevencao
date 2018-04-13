<?php 
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();


if (!empty($_POST)) {
	$_POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
}

$email = $_POST['email_usuario'] ?? "";
$login = $_POST['login_usuario'] ?? "";
$nome_usuario = $_POST['nome_usuario'] ?? "";
$senha = $_POST['senha_usuario'] ?? "";

?>
<!-- conteudo da pagina -->
<form action="#" method = "POST">
	<input type="hidden" name = "email" value = "email">
	<input type="hidden">
	<input type="hidden">
	<input type="hidden">
	<input type="submit" value = "alterar">
</form>

<div class="card-header">Cadastro de Usuário</div>
<div class="card-body">
	<form method="POST" action="#">
		<div class="form-group">
			<div class="form-row">
				<div class="col-md-6">
					<label for="nome_usuario">Nome do Usuario</label>
					<input class="form-control" id="nome_usuario" type="text" name= "nome_usuario"  placeholder="Digite o nome do Usuário" value = "<?php echo $nome_usuario; ?>">
				</div>
				<div class="col-md-6">
					<label for="e-mail">E-Mail</label>
					<input class="form-control" id="email" type="email" name="email_usuario" placeholder="Digite um E-Mail" value = "<?php echo $email; ?>">
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for=" login"> Login</label>
			<input class="form-control" id=" login" type="text" name="login_usuario"  placeholder="Digite um login" value = "<?php echo $login; ?>">
		</div>
		<div class="form-group">
			<div class="form-row">
				<label for="senha">Senha</label>
				<input class="form-control" id="senha" type="password" name="senha_usuario" placeholder="Digite uma senha" value = "<?php echo $senha; ?>">
			</div>
		</div>
		<input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
	</form>
</div>
<?php
echo final1();
?>