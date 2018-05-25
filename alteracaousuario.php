<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();


$id_usuario = $_POST['id_usuario'];
$nome_usuario = $_POST['nome_usuario'];
$email_usuario = $_POST['email_usuario'];
$login_usuario = $_POST['login_usuario'];
$senha_usuario = $_POST['senha_usuario'];

$senha_usuario_modificado = md5($senha_usuario);

$cadastrousuario = update($conn,'usuario', [
'usuario' => $login_usuario,
'senha' => $senha_usuario_modificado,
'nome_usuario'=>$nome_usuario,
'email' => $email_usuario
],'id = \''.$id_usuario.'\'');

if (FALSE == $cadastrousuario
) {?>

 <script type="text/javascript">
     alert("Alteração Realizada com sucesso!")
 </script>
<?php
}else{
    ?>  
 <script type="text/javascript">
     alert("Alteração Não Realizada")
 </script>
 <?php
 exit();

}
echo final1();
?>
<meta http-equiv="refresh" content="1; url=visualizarusuario.php">
