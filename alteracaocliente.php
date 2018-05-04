<?php

// $_POST = filter_var_array($_POST);
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();
//----------------------------
//conteudo da pagina
include_once('conexao.php');

$idEmpresa = $_POST['empresa_id'];
$id_tipotelefone = $_POST['tipotelefone_id'];
$id_telefone = $_POST['telefone_id'];
$id_estado = $_POST['estado_id'];
$id_logradouro = $_POST['logradouro_id'];
$id_cep = $_POST['cep_id'];
$id_cidade = $_POST['cidade_id'];
$nome_empresa = $_POST['nome_empresa'];
$endereco = $_POST['endereco'];
$tipo_telefone = $_POST['tipo_telefone'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];
$tipo = "5";
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$complemento = $_POST['complemento'];
$numero = $_POST['numero'];
$ddd = $_POST['ddd'];


$Alterar_estado = update($conn, 'estado',
[
    'estado' => $estado
],'id = \''.$id_estado.'\'');

$Alterar_logradouro = update($conn, 'lougradouro',
[
    'Lougradouro' =>$logradouro
],'id = \''.$id_logradouro.'\'');

$Alterar_tipo_telefone = update($conn, 'tipotelefone',
[
    'TipoTelefone' => $tipo_telefone
],'id = \''.$id_tipotelefone.'\'');
/*$Alterar_tipoforn = update($conn, 'tipoAlterar',
[
    'TipoAlterar' => $tipo
]);*/

$Alterar_cliente = update($conn, 'empresa',
[
    'NomeEmpresa' => $nome_empresa,
    'cnpj' => $cnpj    
    //'id_Tipo_Alterar_fk' => $Alterar_tipoforn
    // 'id_Tipo_Alterar_fk' => $tip
],'id = \''.$idEmpresa.'\'');
$Alterar_telefone= update($conn, 'telefone',
[
    'ddd' => $ddd,
    'telefone' => $telefone
    // 'id_Empresa_fk' => $Alterar_cliente,
    // 'id_Tipo_telefone_fk' => $Alterar_tipo_telefone
],'id = \''.$id_telefone.'\'');

$Alterar_cidade = update($conn, 'cidade', 
[
    'cidade'=> $cidade
    // 'id_Estado_fk' => $Alterar_estado
],'id = \''.$id_cidade.'\'');

$Alterar_cep = update($conn, 'cep',
[
    'cep' => $cep
    // 'id_Cidade_fk' => $Alterar_cidade,
    // 'id_Estado_fk' => $Alterar_estado
],'id = \''.$id_cep.'\'');
$Alterar_endereco = update($conn, 'endereco', [
    // 'id_Empresa_fk' => $Alterar_cliente,
    // 'id_CEP_fk' => $Alterar_cep,
    'complemento' => $complemento,
    'Endereco' => $endereco,
    'Numero' => $numero,
    // 'id_Lougradouro_fk' => $Alterar_logradouro
],'id_Empresa_fk = \''.$idEmpresa.'\'');


if (FALSE === $Alterar_cliente) {
    echo "Alteração não realizado";
    echo final1();

    exit();
}



 ?>
 <div class="text-center">
     <?php echo "Alteração Realizada" ; ?>
 </div>
 <script type="text/javascript">
     alert("Alteração Realizada com sucesso!")
 </script>

<?php
//-----------------------
echo final1();
?>
<meta http-equiv="refresh" content="1; url=clientes.php">
