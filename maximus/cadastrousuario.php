<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();

include_once('conexao.php');


$nome_usuario = $_POST['nome_usuario'];
$email_usuario = $_POST['email_usuario'];
$login_usuario = $_POST['login_usuario'];
$senha_usuario = $_POST['senha_usuario'];

$senha_usuario_modificado = md5($senha_usuario);

$cadastrausuario ="INSERT INTO `usuario`( `nome_usuario`, `email`, `usuario` , `senha`) VALUES ('$nome_usuario','$email_usuario','$login_usuario','$senha_usuario_modificado');";

if ($cadastrousuariofeito= mysqli_query($conn,$cadastrausuario)
) {
	echo "Cadastro Realizado com Sucesso!!";
}else{
	echo "Cadastro não realizado";
}
echo final1();
?>