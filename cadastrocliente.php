<?php
include_once('funcoes.php');
include_once('sessao.php');
include_once('conexao.php');
echo inicio();


$nome_empresa = $_POST['nome_empresa'];
$endereco = $_POST['endereco'];
$tipo_telefone = $_POST['tipo_telefone'];
$telefone = $_POST['telefone'];
$cnpj = $_POST['cnpj'];
$tipo = \App\TipoCliente::CLIENTE;
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$complemento = $_POST['complemento'];
$numero = $_POST['numero'];
$ddd = $_POST['ddd'];

$cadastro_cliente = insert($conn, 'empresa',
[
	'NomeEmpresa' => "'".$nome_empresa."'",
	'cnpj' => "'".$cnpj."'",	
	//'id_Tipo_Cadastro_fk' => $cadastro_tipoforn
	'id_Tipo_Cadastro_fk' =>$tipo
]);
$id_Empresa_fk = select($conn, 'empresa', 'cnpj = "'.$cnpj.'"');
$tipotelefone_fk = select($conn, 'tipotelefone', 'TipoTelefone = "'.$tipo_telefone.'"');
$cadastro_telefone= insert($conn, 'telefone',
[
	'ddd' => "'".$ddd."'",
	'telefone' => "'".$telefone."'",
	'id_Empresa_fk' => $id_Empresa_fk[0]['id'],
	'id_Tipo_telefone_fk' => $tipotelefone_fk[0]['id']
]);
$estado_fk_id = select($conn, 'estado', 'id = "'.$estado.'"');
$cidade_fk = select($conn, 'cidade', 'id_estado_fk = "'.$estado.'"');

$cadastro_cep = insert($conn, 'cep',
[
	'cep' => "'".$cep."'",
	'id_Cidade_fk' => $cidade_fk[0]['id'],
	'estado_fk' => $estado_fk_id[0]['id']
]);
$cep_fk = select($conn, 'cep', 'cep = "'.$cep.'"');
$cadastro_endereco = insert($conn, 'endereco', [
	'id_Empresa_fk' => $id_Empresa_fk[0]['id'],
	'id_cep_fk' => $cep_fk[0]['id'],
	'complemento' => "'".$complemento."'",
	'Endereco' => "'".$endereco."'",
	'Numero' => "'".$numero."'",
	'id_Logradouro_fk' => $logradouro
]);
// INSERT INTO empresa (NomeEmpresa, cnpj, id_Tipo_Cadastro_fk) VALUES ('Wal - Mart Stories Inc.', '00.063.960/0001-09', 1);INSERT INTO telefone (ddd, telefone, id_Empresa_fk, id_Tipo_telefone_fk) VALUES ('(11)', '2239 - 4833', ,);INSERT INTO cep (cep, id_Cidade_fk, estado_fk) VALUES (03527-000, undefined, 26);INSERT INTO endereco (id_Empresa_fk, id_cep_fk, complemento, Endereco, Numero, id_Logradouro_fk) VALUES (, , ', 'Aricanduva', '5555', 2)

// $cadastro_estado = insert($conn, 'estado',
// [
// 	'estado' => $estado
// ]);

// $cadastro_logradouro = insert($conn, 'logradouro',
// [
// 	'Logradouro' =>$logradouro
// ]);

// $cadastro_tipo_telefone = insert($conn, 'tipotelefone',
// [
// 	'TipoTelefone' => $tipo_telefone
// ]);
/*$cadastro_tipoforn = insert($conn, 'tipocadastro',
[
	'TipoCadastro' => $tipo
]);*/


// $cadastro_cidade = insert($conn, 'cidade', 
// [
// 	'cidade'=> $cidade,
// 	'id_Estado_fk' => $cadastro_estado
// ]);




if (FALSE === $cadastro_cliente) {
 	echo "Cadastro não realizado";
	echo final1();

	exit();
}

 ?>
 <div class="text-center">
     <?php echo "Cadastro Realizada" ; ?>
 </div>
 <script type="text/javascript">
     alert("Cadastro Realizada com sucesso!")
 </script>

<?php
//-----------------------
echo final1();
?>
<meta http-equiv="refresh" content="1; url=clientes.php">
