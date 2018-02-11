<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Empresa;

class ClienteController extends Controller
{
    public function index()
    {
    	return view('cliente.cliente');
    }

    public function cadastrar(Request $request)
    {
    
    	
    	$nomeEmpresa = $request->nomeEmpresa;
    	$endereco = $request->endereco;
    	$tipo_telefone = $request->tipo_telefone;
    	$telefone = $request->telefone;
    	$cnpj = $request->cnpj;
    	$tipo = '5';
    	$cidade = $request->cidade;
    	$estado = $request->estado;
    	$cep = $request->cep;
    	$logradouro = $request->logradouro;
    	$complemento = $request->complemento;
    	$numero = $request->numero;
    	$ddd = $request->ddd;
    	
    	
    	$cadastroEstado = Estado::create([
    		'estado' => $estado
    	]);
    	
    	$cadastroLogradouro = Lougradouro::create([
    		'Lougradouro' =>$logradouro
    	]);
    	
    	$cadastroTipoTelefone = TipoTelefone::create([
    		'TipoTelefone' => $tipo_telefone
    	]);
    	
// -----
    	$cadastroCliente = Empresa::create([
    		'NomeEmpresa' => $nomeEmpresa,
    		'cnpj' => $cnpj,	
    		'id_Tipo_Cadastro_fk' => $tipo
    	]);
    
    	$cadastroTelefone= Telefone::create([
    		'ddd' => $ddd,
    		'telefone' => $telefone,
    		'id_Empresa_fk' => $cadastroCliente,
    		'id_Tipo_telefone_fk' => $cadastroTipoTelefone
    	]);
    	
    	$cadastroCidade = Cidade::create([
    		'cidade'=> $cidade,
    		'id_Estado_fk' => $cadastroEstado
    	]);
    	
    	$cadastroCep = Cep::create([
    		'cep' => $cep,
    		'id_Cidade_fk' => $cadastroCidade,
    		'id_Estado_fk' => $cadastroEstado
    	]);
    	$cadastroEndereco = Endereco::create([
    		'id_Empresa_fk' => $cadastroCliente,
    		'id_CEP_fk' => $cadastroCep,
    		'complemento' => $complemento,
    		'Endereco' => $endereco,
    		'Numero' => $numero,
    		'id_Lougradouro_fk' => $cadastroLogradouro
    	]);
    	
    	
    	if (FALSE === $cadastroCliente) {
    	 	echo 'Cadastro não realizado';
    		
    	
    		exit();
    	}
    	
    	echo 'Cadastro Realizado com Sucesso!!';
    	
    }
}
