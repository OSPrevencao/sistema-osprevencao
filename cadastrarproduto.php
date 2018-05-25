<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<!-- conteudo da pagina -->

<div class="card-header">Cadastro de Produto</div>
<div class="card-body">
  <form method="POST" action="cadastroproduto.php">
    <div class="form-group">
          <label for="lblnome">Nome do Produto</label>
          <input class="form-control title_case" id="lblnome" type="text" name= "lblnome"  placeholder="Digite o nome do produto">
        </div>



<div class="form-group">
  <label for="lbldescricao">Descrição do Produto</label>
  <textarea class="form-control title_case" id="lbldescricao" name="lbldescricao"  placeholder="Digite a descrição do produto"></textarea>
</div>
<input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
</div>
</form>
</div>
<?php
echo final1();
?>