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
$tipo = \App\TipoCliente::FORNECEDOR;
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

$cadastro_logradouro = insert($conn, 'logradouro',
[
	'Logradouro' =>$logradouro
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
	'estado_fk' => $cadastro_estado
]);
$cadastro_endereco = insert($conn, 'endereco', [
	'id_Empresa_fk' => $cadastro_cliente,
	'id_cep_fk' => $cadastro_cep,
	'complemento' => $complemento,
	'Endereco' => $endereco,
	'Numero' => $numero,
	'id_Logradouro_fk' => $cadastro_logradouro
]);


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
