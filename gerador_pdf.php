<?php

//adiciona a classe no php
require_once __DIR__.'/vendor/autoload.php';
require_once('index.php');
include_once('funcoes.php');
include_once('conexao.php');
include_once('sessao.php');

// $empresa = select($conn, "empresa_dados", "id = {$_GET['id']}");
// $empresa = $empresa[0];
$orcamento = select($conn, "orcamento", "id = {$_GET['id']}");
$visita = select($conn, "agendavisita", "id = ".$orcamento[0]['id_visita_fk']."");
$obra = select($conn, "obra", "id = ".$orcamento[0]['id_obra_fk']."");
$empresa = select($conn, "empresa_dados", "id = ".$orcamento[0]['empresa_fk']."");
$listamateriais = select($conn, "listamateriais", "id_Orcamento_fk = ".$orcamento[0]['id']."");


 $data_visita = $visita[0]['data_visita'];
 $dataInicio = $obra[0]['dataInicio'];
 $DataFim = $obra[0]['DataFim'];
 $NomeEmpresa = $empresa[0]['NomeEmpresa'];
 $cnpj = $empresa[0]['cnpj'];
 $telefone_completo = $empresa[0]['telefone_completo'];
 $CEP = $empresa[0]['CEP'];
 $cidade = $empresa[0]['cidade']." - ".$empresa[0]['estado'];
 $endereco_completo = $empresa[0]['endereco_completo'];
 $descricao = $obra[0]['descricao'];
$maoobra = $orcamento[0]['ValorMaoObra']; 
 
$tcpdf = new TCPDF();   

$tcpdf->addPage();

$tbl = <<<EOD
    <table style = "border-spacing: 5x; border:thin solid black;">
       <tr>
           <td colspan ="12" style = "border-bottom:thin solid black;">Datas</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="3" >Data da Visita</td>
           <td colspan ="3" >Data de Início da Obra</td>
           <td colspan ="3" >Data de Término da Obra</td>
           <td colspan ="3" >Validade do Orçamento</td>
       </tr>
       <tr>
           <tr>
               <td colspan ="3" style = "border:thin solid black; border-radius: 20px;">$data_visita </td>
               <td colspan ="3" style = "border:thin solid black;"> $dataInicio </td>
               <td colspan ="3" style = "border:thin solid black;">$DataFim </td>
               <td colspan ="3" style = "border:thin solid black;"> 2018-12-01 </td>
           </tr>
        </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <hr>
       <tr>
           <td colspan ="12">Empresa Contratante</td>
       </tr>
       <tr>
           <td colspan ="12">CNPJ</td>
       </tr>
       <tr>
           <td colspan ="10"></td>
           <td colspan ="2"></td>
       </tr>
       <tr>
           <td colspan ="10" style = "border:thin solid black;"> $NomeEmpresa</td>
           <td colspan ="2" style = "border:thin solid black;">$cnpj </td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="2">Telefone para Contato</td>
           <td colspan ="2">CEP</td>
           <td colspan ="2">Cidade</td>
           <td colspan ="6">Endereço</td>
       </tr>
       <tr>
           <td colspan ="2" style = "border:thin solid black;">$telefone_completo </td>
           <td colspan ="2" style = "border:thin solid black;">$CEP </td>
           <td colspan ="2" style = "border:thin solid black;">$cidade </td>
           <td colspan ="6" style = "border:thin solid black;">$endereco_completo </td>
       </tr>
        <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="12">Descrição da Obra</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="12" style = "border:thin solid black;"> $descricao</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="12">Lista de Produtos para Compra</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="2">Nome do Produto</td>
           <td colspan ="2">Quantidade</td>
           <td colspan ="2">Valor Unitário</td>
           <td colspan ="6">Valor Total do Produto</td>
       </tr>
       <tr>
           <td colspan ="2" style = "border:thin solid black;">Prego </td>
           <td colspan ="2" style = "border:thin solid black;">10 </td>
           <td colspan ="2" style = "border:thin solid black;">R$ 12,00 </td>
           <td colspan ="6" style = "border:thin solid black;">R$ 1.200.00 </td>
       </tr>
       <tr>
           <td colspan ="2" style = "border:thin solid black;">Drywall </td>
           <td colspan ="2" style = "border:thin solid black;">12 </td>
           <td colspan ="2" style = "border:thin solid black;">R$ 200,00 </td>
           <td colspan ="6" style = "border:thin solid black;">R$ 2.400.00 </td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="6">Valor da Mão de Obra</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="6" style = "border:thin solid black;"> $maoobra</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="6">Valor Total da Obra</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="6" style = "border:thin solid black;"> R$ 3.720.00 </td>
       </tr>
    </table>
EOD;


$tcpdf->writeHtml($tbl);
ob_end_clean();
$tcpdf->Output('teste.pdf', 'I');



// $html = <<<HTML
// $html = '
//  <div>
// <b> Dados da Empresa</b>
// </div>
// <div>

// <p><b>Nome da Empresa:</b></p>'
// .$empresa["NomeEmpresa"].'
// <hr>

// <p><b>CNPJ:  </b></p>

// ' .$empresa["cnpj"].
// '
// <hr>

// <p><b>Telefone</b>
// <b>'.($empresa["TipoTelefone"]. ':</b><br> ' )
// .$empresa["telefone_completo"].'
// </p> 
// <hr>

// <p><b>CEP:  </b></p>

// ' .$empresa["CEP"].'
// </p>
// <hr>

// <p><b>Endereço:  </b></p>

// ' .$empresa["endereco_completo"].'
// </p>
// <hr>

// <p><b>Cidade:  </b></p>

// ' .$empresa["cidade"].'
// </p>
// <hr>

// <p><b>Estado:  </b></p>

// ' .$empresa["estado"].'
// </p>
// <hr>

// <p><b>Descrição da Obra:</b></p>
// <br>
// <br>
// <br>
// <br>
// <br>
// <br>
// <hr>
// <p><b>Produtos Utilizados:</b></p>
// <br>
// <br>
// <br>
// <br>
// <br>
// <br>
// <hr>
// <p><b>Valor do Orçamento:</b></p>


// ';
// HTML;


//return
// $previousPage = '';
// header('Location: '.$previousPage);
// exit();
