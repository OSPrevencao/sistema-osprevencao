<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();
$result = select(
  $conn,
  'empresa_dados','tipoCadastro = "Fornecedor"');

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