<?php 
// session_start();
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');

echo inicio();
$empresa = select($conn, "empresa_dados", "id = {$_GET['id']}");
$empresa = $empresa[0];

?>
<div class="card-header">Relatório de Visitas</div>
<form method="post" action="formRelatorioVisita.php" id="formRelatorioVisita">
    <input type="hidden" name="idEmpresa" id="idEmpresa" value="<?php echo $empresa['id'] ?? ''; ?>">
    <div class="form-group">      
        <div class="form-row">
            <div class="col-md-8">
                <label for="nome_empresa">Nome do Empresa</label>
                <input class="form-control" style="border-style: solid" value="<?php echo $empresa['NomeEmpresa'] ?? ''; ?>" disabled>
            </div>
            <div class="col-md-4">
                <label for="cnpj">CNPJ</label>
                <input class="form-control" style="border-style: solid" value="<?php echo $empresa['cnpj'] ?? ''; ?>" disabled>
            </div>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <label for="telefone">Telefone</label>
            <input class="form-control" style="border-style: solid" value="<?php echo $empresa['ddd'].$empresa['telefone'] ?? ''; ?>" disabled>
            
        </div>
    </div>
        <div class="form-row">
            <div class="col-md-4">
                <label for="nome_empresa">Data da Visita</label>
                <input class="form-control" style="border-style: solid" id="dtvisita" name ="dtvisita" type="date">
            </div>
            <div class="col-md-4">
                <label for="cnpj">Data de Inicio da Obra</label>
                <input class="form-control" style="border-style: solid" id="dtobra" name="dtobra" type="date">
            </div>
            <div class="col-md-4">
                <label for="nome_empresa">Data de Término da Obra</label>
                <input class="form-control" style="border-style: solid" id="dtermino" name="dtermino" type="date">
            </div>
        </div>  
    <div class="form-row">
        <div class="col">
            <label for="telefone">Valor da Mão de Obra</label>
            <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input class="form-control" style="border-style: solid" id="vlr_mao_de_obra" name="vlr_mao_de_obra" >
            </div>
        </div>
    </div>
    <br />
    <br />

    <div class="form-row">
        <div class="col">
            <label for="descricao_obra">Descrição da Obra</label>
            <textarea class="form-control" id="descricao_obra" name="descricao_obra" placeholder="Digite o que vai ser realizado na Obra" ></textarea> 
        </div>
    </div>
    <br>
    <div>
        <input type="checkbox" id="produto_proprio" name="produto_proprio" value="produto_proprio"> <label for="produto_proprio">Utilizará produtos do estoque?</label>
    </div>
    <div id="form-add-produto" class ="form-row" style="display:none;">
        <div class="col-md-4">
          <label for="txtBusca">Buscar Produto</label>
          <input class="form-control" type="text" id="txtBusca" placeholder="Buscar..."/>
        </div>
        <div class="col-md-4">
            <label for="quantidade_produto">Quantidade do produto</label>
            <input type="number" class="form-control" id ="quantidade_produto" placeholder="Digite a quantidade de produto" name="quantidade_produto">   
        </div>
        <div class=" col-md-4">
            <button id="btnadicionar" class="btn-primary btn-block" style="margin-top:35px"> <i class="fa fa-check"></i> </button> 
        </div>
    </div>
    <div id="lista_produtos" style="margin-top:10px;display: none;">
       <h5>Lista de produtos</h5>
    </div>

    <input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
    </form>
    </div>
</form>
<?php 
echo final1();
?>