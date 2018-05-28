<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();

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
            <div class="form-control" style="border-color: black;">11/10/2017</div>
        </div>
        <div class="col-sm-3 mb-2">
            <label for="nome_empresa">Data Prevista para Início da Obra</label>
            <div class="form-control" style="border-color: black;">15/05/2018</div>
        </div>
        <div class="col-sm-3 mb-2">
            <label for="nome_empresa">Data Prevista para Término da Obra</label>
            <div class="form-control" style="border-color: black;">15/10/2018</div>
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
                <div class="form-control" style="border-color: black;">Faculdade Impacta de Tecnologia ou Colégio Impacta de Tecnologia da Informação</div>
            </div>
            <div class="col-sm-2">
                <label for="cnpj">CNPJ</label>
                <div class="form-control" style="border-color: black;">59.069.914/0001-51</div>
            </div>
        </div>
        <div class="form-row">
            <div class="col-sm-2">
                <label for="nome_empresa">Telefones para contato</label>
                <div class="form-control" style="border-color: black;">(11) 5593-5344</div>
            </div>
            <div class="col-sm-2">
                <label for="cnpj">CEP</label>
                <div class="form-control" style="border-color: black;">01133-000</div>
            </div>
            <div class="col-sm-2">
                <label for="nome_empresa">Cidade</label>
                <div class="form-control" style="border-color: black;">São Paulo - SP </div>
            </div>
            <!-- </div> -->
            <!-- <div class="form-row"> -->
                <div class="col-sm-6">
                    <label for="nome_empresa">Endereço</label>
                    <div class="form-control" style="border-color: black;">Avenida Rudge, 315</div>
                </div>
            </div>
        </div>
        <label for="cnpj"><strong>Descrição da Obra</strong></label>
        <div class="form-group form-control" style="border-color: black;"> 
            <div class="form-row" >
                A obra será realizada na escada de incendios.
            </div>
        </div>
        <label for="cnpj"><strong>Lista de Produtos para compra</strong></label>
        <div class="form-group form-control" style="border-color: black;"> 
            <div class="form-row" >
                <div class="col-sm-2">
                    <label for="nome_empresa">Nome do Produto</label>
                    <div class="form-control" style="border-color: black;">Extintor</div>
                </div>
                <div class="col-sm-2">
                    <label for="cnpj">Quantidade</label>
                    <div class="form-control" style="border-color: black;">2</div>
                </div>
                <div class="col-sm-2">
                    <label for="nome_empresa">Valor Unitário</label>
                    <div class="form-control" style="border-color: black;">R$ 130,00 </div>
                </div>
                <div class="col-sm-6">
                    <label for="nome_empresa">Valor total do produto</label>
                    <div class="form-control" style="border-color: black;">R$ 260,00</div>
                </div>
            </div>
        </div>
        <label for="cnpj"><strong>Valor da Mão de Obra</strong></label>
        <div class="form-group" > 
            <div class="form-row" >
                <div class="col-sm-4">
                    <div class="form-control pull-right"style="border-color: black;">
                        R$ 300,00
                    </div>
                </div>
            </div>
        </div>
        <label for="cnpj"><strong>Valor Total do Orçamento</strong></label>
        <div class="form-group" > 
            <div class="form-row" >
                <div class="col-sm-4">
                    <div class="form-control pull-right"style="border-color: black;">
                        R$ 560,00
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<br>


<?php 
echo final1();
?>