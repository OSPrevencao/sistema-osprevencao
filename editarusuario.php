<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
    $usuario = select($conn, "usuario", "id = {$_GET['id']}");
    $usuario = $usuario[0];


?>
<!-- conteudo da pagina -->

<div class="card-header">Cadastro de Usuário</div>
<div class="card-body">
    <form method="POST" action="altecaousuario.php">
        <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $usuario['id'] ?? ''; ?>">
        <div class="form-group">
            <div class="form-row">
                <div class="col-md-6">
                    <label for="nome_usuario">Nome do Usuario</label>
                    <input class="form-control title_case" id="nome_usuario" type="text" name= "nome_usuario"  placeholder="Digite o nome do Usuário" value="<?php echo $usuario['nome_usuario'] ?? ''; ?>">
                </div>
                <div class="col-md-6">
                    <label for="e-mail">E-Mail</label>
                    <input class="form-control" id="email" type="email" name="email_usuario" placeholder="Digite um E-Mail" value="<?php echo $usuario['email'] ?? ''; ?>">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for=" login"> Login</label>
            <input class="form-control" id=" login" type="text" name="login_usuario"  placeholder="Digite um login" value="<?php echo $usuario['usuario'] ?? ''; ?>">
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