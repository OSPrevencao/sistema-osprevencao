<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

?>
<!-- conteudo da pagina -->

<div class="card-header">Lançar Despesas</div>
<div class="card-body">
  <form method="POST" action="lancardespesa.php">
    <div class="form-group">
          <label for="lblnome">Nome do Despesa</label>
          <input class="form-control title_case" id="lblnome" type="text" name= "lblnome"  placeholder="Digite o nome da despesa">
    </div>
    <div class="form-group">
              <label for="valordespesa">Valor Despesa</label>
              <div class="input-group">
            <span class="input-group-addon">R$</span>
              <input class="form-control" id="valordespesa" type="Number" name="valordespesa" placeholder="Digite o Valor da Produto">
            </div>
    </div>
	<div class="form-group">
  		<label for="lbldescricao">Data da Despesa</label>
  		<input class="form-control title_case" id="datad" type="date" name= "datad">
	</div>
	<input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
	</form>
</div>
<?php
echo final1();
?>