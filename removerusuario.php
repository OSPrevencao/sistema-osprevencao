<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
    $usuario = select($conn, "usuario", "id = {$_GET['id']}");
    $usuario = $usuario[0];

$removercadastro = "DELETE FROM usuario WHERE id = {$_GET['id']}";

if ($removercadastros= mysqli_query($conn,$removercadastro)
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
