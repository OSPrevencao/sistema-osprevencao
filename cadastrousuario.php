<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();



$nome_usuario = $_POST['nome_usuario'];
$email_usuario = $_POST['email_usuario'];
$login_usuario = $_POST['login_usuario'];
$senha_usuario = $_POST['senha_usuario'];

$senha_usuario_modificado = md5($senha_usuario);

$cadastrousuario = insert($conn,'usuario', [
'usuario' => $login_usuario,
'senha' => $senha_usuario_modificado,
'nome_usuario'=>$nome_usuario,
'email' => $email_usuario,
]);

if (TRUE == $cadastrousuario
) {?>

 <script type="text/javascript">
     alert("Cadastro Realizado com sucesso!")
 </script>
<?php
}else{
    ?>	
 <script type="text/javascript">
     alert("Cadastro Não Realizado")
 </script>
 <?php

}
echo final1();
?>
<meta http-equiv="refresh" content="1; url=paginainicial.php">
