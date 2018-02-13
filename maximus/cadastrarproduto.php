<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();
?>
<!-- conteudo da pagina -->

<div class="card-header">Cadastro de Produto</div>
<div class="card-body">
  <form method="POST" action="cadastroproduto.php">
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <label for="lblnome">Nome do Produto</label>
          <input class="form-control" id="lblnome" type="text" name= "lblnome"  placeholder="Digite o nome do produto">
        </div>
        <div class="col-md-6">
          <label for="lblempresa">Codigo da Empresa</label>
          <input class="form-control" id="lblempresa" type="text" name="lblempresa" placeholder="Digite o codigo do empresa">
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="lbldescricao">Descrição do Produto</label>
      <input class="form-control" id="lbldescricao" type="text" name="lbldescricao"  placeholder="Digite a descrição do produto">
    </div>
    <div class="form-group">
      <div class="form-row">
        <label for="lblvlrunitario">Valor Unitario</label>
        <input class="form-control" id="lblvlrunitario" type="text" name="lblvlrunitario" placeholder="Digite o valor unitario">
      </div>
    </div>
    <input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
  </form>
</div>
<?php
echo final1();
?>