<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
$result = select(
  $conn,
  'empresa_dados','tipoCadastro = "Fornecedor"');
$result2 = select(
  $conn, 'produto'
);
?>
<!-- conteudo da pagina -->
<div class="card-header">Cadastro de Nota</div>
<div class="card-body">
  <form method="POST" action="cadastroproduto.php">
    <div class="form-group">
      <div class="form-row">
        <div class="col-sm-12">
          <label for="numeronota">Número da Nota</label>
            <input class="form-control title_case" id="numeronota" type="Number" name= "numeronota"  placeholder="Digite o Número da Nota">
          </div>
        </div>
      </div>
    <div class="form-group">
      <div class="form-row">
        <div class="col-sm-6">
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
          <div class="col-sm-6">
            <label for="empresa_fornecedora">Empresa Fornecedora</label>
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
            <div class="col-sm-6">
              <label for="quantidade">Quantidade</label>
              <input class="form-control" id="quantidade" type="Number" name="quantidade" placeholder="Digite a quantidade">
            </div>
            <div class="col-sm-6">
              <label for="vlrunitario">Valor Unitario</label>
              <div class="input-group">
            <span class="input-group-addon">R$</span>
              <input class="form-control" id="vlrunitario" type="Number" name="quantidade" placeholder="Digite o Valor Unitario do Produto">
            </div>
            </div>
            <!-- <div class="col-sm-6">

              <label for="validade">Data de validade</label>
              <input class="form-control title_case" id="validade" type="date" name="datavalidade">
            </div> -->
          </div>
        </div>
        <input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
      </form>
    </div>
  </div>

  <?php
  echo final1();
  ?>
