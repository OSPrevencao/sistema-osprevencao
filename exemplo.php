<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

$orcamento = select($conn, "orcamento", "id = {$_GET['id']}");
$visita = select($conn, "agendavisita", "id = ".$orcamento[0]['id_visita_fk']."");
$obra = select($conn, "obra", "id = ".$orcamento[0]['id_obra_fk']."");
$empresa = select($conn, "empresa_dados", "id = ".$orcamento[0]['empresa_fk']."");
$listamateriais = select($conn, "listamateriais", "id_Orcamento_fk = ".$orcamento[0]['id']."");

//formata as datas
$visita[0]['data_visita'] = date("d/m/Y", strtotime($visita[0]['data_visita']));
$obra[0]['dataInicio'] = date("d/m/Y", strtotime($obra[0]['dataInicio']));
$obra[0]['DataFim'] = date("d/m/Y", strtotime($obra[0]['DataFim']));
?>
<div class="card-header">
    <h1 style="text-align: center;">Orçamento</h1>
</div>
<br>
<form style=" ">   
    <label for="nome_empresa"><strong>Datas</strong></label> 
    <div class="form-row form-group form-control sm" style="border-color: black;">
        <div class="col-sm-3 mb-2">
            <label for="nome_empresa">Data da Visita</label>
            <div class="form-control" style="border-color: black;"><?php echo $visita[0]['data_visita']; ?></div>
        </div>
        <div class="col-sm-3 mb-2">
            <label for="nome_empresa">Data Prevista para Início da Obra</label>
            <div class="form-control" style="border-color: black;"><?php echo $obra[0]['dataInicio']; ?></div>
        </div>
        <div class="col-sm-3 mb-2">
            <label for="nome_empresa">Data Prevista para Término da Obra</label>
            <div class="form-control" style="border-color: black;"><?php echo $obra[0]['DataFim']; ?></div>
        </div>
        <div class="col-sm-3 mb-2">
            <label for="nome_empresa">Validade do Orçamento</label>
            <div class="form-control" style="border-color: black;">13/05/2018</div>
        </div>

    </div>
    <label for="nome_empresa"><strong>Empresa Contratante</strong></label> 
    <div class="form-group form-control" style="border-color: black;">    
        <div class="form-row">
            <div class="col-sm-10">
                <label for="nome_empresa">Nome do Empresa</label>
                <div class="form-control" style="border-color: black;"><?php echo $empresa[0]['NomeEmpresa']; ?></div>
            </div>
            <div class="col-sm-2">
                <label for="cnpj">CNPJ</label>
                <div class="form-control" style="border-color: black;"><?php echo $empresa[0]['cnpj']; ?></div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-2">
                <label for="nome_empresa">Telefones para contato</label>
                <div class="form-control" style="border-color: black;"><?php echo $empresa[0]['telefone_completo']; ?></div>
            </div>
            <div class="col-sm-2">
                <label for="cnpj">CEP</label>
                <div class="form-control" style="border-color: black;"><?php echo $empresa[0]['CEP']; ?></div>
            </div>
            <div class="col-sm-2">
                <label for="nome_empresa">Cidade</label>
                <div class="form-control" style="border-color: black;"><?php echo $empresa[0]['cidade']." - ".$empresa[0]['estado']; ?> </div>
            </div>
            <!-- </div> -->
            <!-- <div class="form-row"> -->
                <div class="col-sm-6">
                    <label for="nome_empresa">Endereço</label>
                    <div class="form-control" style="border-color: black;"><?php echo $empresa[0]['endereco_completo']; ?></div>
                </div>
            </div>
        </div>
        <label for="cnpj"><strong>Descrição da Obra</strong></label>
        <div class="form-group form-control" style="border-color: black;"> 
            <div class="form-row" >
                <?php echo $obra[0]['descricao']; ?>
            </div>
        </div>
        <?php
            if (!empty($listamateriais)) {
            
        ?>
        <label for="cnpj"><strong>Lista de Produtos para compra</strong></label>
        <div class="form-group form-control" style="border-color: black;"> 
            <div class="form-row" >
                <div class="col-sm-2">
                    <label for="nome_empresa">Nome do Produto</label>
                    <div class="form-control" style="border-color: black;">Prego</div>
                </div>
                <div class="col-sm-2">
                    <label for="cnpj">Quantidade</label>
                    <div class="form-control" style="border-color: black;">10</div>
                </div>
                <div class="col-sm-2">
                    <label for="nome_empresa">Valor Unitário</label>
                    <div class="form-control" style="border-color: black;">R$ 12,00</div>
                </div>
                <div class="col-sm-6">
                    <label for="nome_empresa">Valor total do produto</label>
                    <div class="form-control" style="border-color: black;">R$ 1200.00</div>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
        <label for="cnpj"><strong>Valor da Mão de Obra</strong></label>
        <div class="form-group" > 
            <div class="form-row" >
                <div class="col-sm-4">
                    <div class="form-control pull-right"style="border-color: black;">
                       <?php echo "R$ ".$orcamento[0]['ValorMaoObra']; ?>
                    </div>
                </div>
            </div>
        </div>
        <label for="cnpj"><strong>Valor Total do Orçamento</strong></label>
        <div class="form-group" > 
            <div class="form-row" >
                <div class="col-sm-4">
                    <div class="form-control pull-right"style="border-color: black;">
                        R$ 3.720,00
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<br>


<?php 
echo final1();
