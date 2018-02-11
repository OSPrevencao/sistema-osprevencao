<?php
include_once('funcoes.php');
include_once('sessao.php');
echo inicio();

include_once('conexao.php');

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


$cadastro_estado = insert($conn, 'estado',
[
	'estado' => $estado
]);

$cadastro_logradouro = insert($conn, 'lougradouro',
[
	'Lougradouro' =>$logradouro
]);

$cadastro_tipo_telefone = insert($conn, 'tipotelefone',
[
	'TipoTelefone' => $tipo_telefone
]);
/*$cadastro_tipoforn = insert($conn, 'tipocadastro',
[
	'TipoCadastro' => $tipo
]);*/

$cadastro_cliente = insert($conn, 'empresa',
[
	'NomeEmpresa' => $nome_empresa,
	'cnpj' => $cnpj,	
	//'id_Tipo_Cadastro_fk' => $cadastro_tipoforn
	'id_Tipo_Cadastro_fk' => $tipo
]);
$cadastro_telefone= insert($conn, 'telefone',
[
	'ddd' => $ddd,
	'telefone' => $telefone,
	'id_Empresa_fk' => $cadastro_cliente,
	'id_Tipo_telefone_fk' => $cadastro_tipo_telefone
]);

$cadastro_cidade = insert($conn, 'cidade', 
[
	'cidade'=> $cidade,
	'id_Estado_fk' => $cadastro_estado
]);

$cadastro_cep = insert($conn, 'cep',
[
	'cep' => $cep,
	'id_Cidade_fk' => $cadastro_cidade,
	'id_Estado_fk' => $cadastro_estado
]);
$cadastro_endereco = insert($conn, 'endereco', [
	'id_Empresa_fk' => $cadastro_cliente,
	'id_CEP_fk' => $cadastro_cep,
	'complemento' => $complemento,
	'Endereco' => $endereco,
	'Numero' => $numero,
	'id_Lougradouro_fk' => $cadastro_logradouro
]);


if (FALSE === $cadastro_cliente) {
 	echo "Cadastro não realizado";
	echo final1();

	exit();
}

echo "Cadastro Realizado com Sucesso!!";
echo final1();

?>