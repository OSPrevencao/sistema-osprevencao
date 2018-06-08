<?php

//adiciona a classe no php
require_once __DIR__.'/vendor/autoload.php';
require_once('index.php');
include_once('funcoes.php');
include_once('conexao.php');
include_once('sessao.php');

$empresa = select($conn, "empresa_dados", "id = {$_GET['id']}");
$empresa = $empresa[0];
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
               <td colspan ="3" style = "border:thin solid black; border-radius: 20px;"> <hr></td>
               <td colspan ="3" style = "border:thin solid black;"> <hr></td>
               <td colspan ="3" style = "border:thin solid black;"> <hr></td>
               <td colspan ="3" style = "border:thin solid black;"> <hr></td>
           </tr>
        </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="12">Empresa Contratante</td>
       </tr>
       <tr>
           <td colspan ="12"></td>
       </tr>
       <tr>
           <td colspan ="10">Nome da Empresa</td>
           <td colspan ="2">CNPJ</td>
       </tr>
       <tr>
           <td colspan ="10" style = "border:thin solid black;"> <hr></td>
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
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
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
           <td colspan ="6" style = "border:thin solid black;"> <hr></td>
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
           <td colspan ="12" style = "border:thin solid black;"> <hr></td>
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
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
           <td colspan ="2" style = "border:thin solid black;"> <hr></td>
           <td colspan ="6" style = "border:thin solid black;"> <hr></td>
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
           <td colspan ="6" style = "border:thin solid black;"> <hr></td>
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
           <td colspan ="6" style = "border:thin solid black;"> <hr></td>
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
