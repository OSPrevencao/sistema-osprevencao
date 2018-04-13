<?php 
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');

echo inicio();
$empresa = select($conn, "empresa_dados", "id = {$_GET['id']}");
$empresa = $empresa[0];

?>


<div class="card-header">Relatório de Visitas</div>
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
    <input type="checkbox" id="produto_proprio" name="produto_proprio"> <label for="produto_proprio">Utilizará produtos do estoque?</label>
</div>
<div id="lista_produtos" style="display: none;">
    <br>
    <br>
    <br>
    Lista de produtos
    <br>
    <br>
    <div class ="form-row">
        <div class="col-md-4">
          <input class="form-control" type="text" id="txtBusca" placeholder="Buscar..."/>
        </div>
        <div class="col-md-4">
            <a  href="clientes.php ">
                <img style="width: 30px; height: 30px" src="search3.png" id="btnBusca" alt="Buscar"/>
            </a>
        </div>
    </div>
</div>
<br>
<br>

<input class="btn btn-primary btn-block" type="submit" name="btn" value="Registrar" >
</form>
</div>
<?php 
echo final1();
?>