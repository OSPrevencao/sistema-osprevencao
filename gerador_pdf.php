<?php

//adiciona a classe no php
require_once __DIR__.'/vendor/php/tcpdf/tcpdf.php';
require_once('index.php');
include_once('funcoes.php');
include_once('conexao.php');
include_once('sessao.php');

$empresa = select($conn, "empresa_dados", "id = 27");
$empresa = $empresa[0];
$tcpdf = new TCPDF();
    
    
    

$tcpdf->addPage();



// $html = <<<HTML
$html = '
 <div>
<b> Dados da Empresa</b>
</div>
<div>

<p><b>Nome da Empresa:</b></p>'
.$empresa["NomeEmpresa"].'
<hr>

<p><b>CNPJ:  </b></p>

' .$empresa["cnpj"].
'
<hr>

<p><b>Telefone</b>
<b>'.($empresa["TipoTelefone"]. ':</b><br> ' )
.$empresa["telefone_completo"].'
</p> 
<hr>

<p><b>CEP:  </b></p>

' .$empresa["CEP"].'
</p>
<hr>

<p><b>Endereço:  </b></p>

' .$empresa["endereco_completo"].'
</p>
<hr>

<p><b>Cidade:  </b></p>

' .$empresa["cidade"].'
</p>
<hr>

<p><b>Estado:  </b></p>

' .$empresa["estado"].'
</p>
<hr>

';
// HTML;

$tcpdf->writeHtml($html);
ob_end_clean();
$tcpdf->Output('teste.pdf', 'I');

//return
// $previousPage = '';
// header('Location: '.$previousPage);
// exit();
