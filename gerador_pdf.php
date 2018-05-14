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
    <table style="border: solid;">
        <tr style="border: solid;">
            <td style="border: solid;">
               
                <tr style="border: solid;">
                    <td style="border: solid;">
                        Data
                    </td>
                </tr>
            </td>
        </tr>
        <tr>
            <td>
                Data
            </td>
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
