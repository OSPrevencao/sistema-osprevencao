<?php 
include_once('conexao.php');
include_once('funcoes.php');

$nome_usuario = $_POST['nome_usuario'];
$senha_usuario = $_POST['senha_usuario'];

$senha_codificada = md5($senha_usuario);

$login_verif = select(
	$conn, "usuario", "usuario = '{$nome_usuario}' AND senha = '{$senha_codificada}'"
);

// se o login não for autorizado
if (empty($login_verif)) {
	header("Location: index.php");
	exit();

} 

session_start();
$_SESSION['user_id'] = $login_verif[0]['id'];

header("Location: paginainicial.php");
exit();
