<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
$result = select(
  $conn,
  'empresa_dados','tipoCadastro = "Fornecedor"');
$result2 = select(
  $conn, 'produtos_compra'
);
?>
<!-- conteudo da pagina -->
<div class="card-header">Cadastro de Estoque</div>
<div class="card-body">
  <form method="POST" action="cadastroproduto.php">
    <div class="form-group">
      <div class="form-row">
        <div class="col-md-6">
          <label for="lblnome">Nome do Produto</label>
          <!-- <input class="form-control title_case" id="lblnome" type="text" name= "lblnome"  placeholder="Digite o nome do produto"> -->
          <select class="form-control" id="lblnome" name="lblnome">
            <?php 
            foreach ($result2 as $row) {?>

              <option value="<?php echo $row['id']; ?>" ><?php echo $row['produto'] ?? ''; ?></option>
              <?php }

              ?>
            </select>
          </div>
          <div class="col-md-6">
            <label for="logradouro">Empresa Fornecedora</label>
            <select class="form-control" id="empresa_fornecedora" name="empresa_fornecedora">
              <?php 
              foreach ($result as $row) {?>

                <option value="<?php echo $row['id']; ?>" ><?php echo $row['NomeEmpresa'] ?? ''; ?></option> 
                <?php }

                ?>

              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-row">
            <div class="col-md-6">
              <label for="quantidade">Quantidade</label>
              <input class="form-control" id="quantidade" type="text" name="quantidade" placeholder="Digite a quantidade">
            </div>
            <div class="col-md-6">

              <label for="lbldescricao">Data de validade</label>
              <input class="form-control title_case" id="lbldescricao" type="date" name="datavalidade">
            </div>
          </div>
        </div>
        <input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
      </form>
    </div>
  </div>

  <?php
  echo final1();
  ?>
