<?php 
include_once('funcoes.php');
echo inicioAutenticacao();
?>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">OS Prevenção</div>
      <div class="card-body">
        <form method="POST" action="verificar_login.php">
          <div class="form-group">
            <label for="nome_usuario">Login</label>
            <input class="form-control" id="nome_usuario" name="nome_usuario" type="text" aria-describedby="emailHelp" placeholder="Insira seu Usuário">
          </div>
          <div class="form-group">
            <label for="senha_usuario">Senha</label>
            <input class="form-control" id="senha_usuario" name="senha_usuario" type="password" placeholder="Senha">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <!-- <input class="form-check-input" type="checkbox"> Lembrar</label> -->
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="btn" value="Login" >
        </form>
        <div class="text-center">
          <a class="d-block small" href="forgot-password.php">Esqueceu sua senha?</a>
        </div>
      </div>
    </div>
  </div>
 <?php
echo finalAutenticacao();
 ?>