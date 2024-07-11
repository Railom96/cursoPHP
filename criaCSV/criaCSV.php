<?php

require_once "config.conf";



// Função para buscar dados do web service com autenticação basic auth
function buscarDados()
{
	$curl = curl_init( $GLOBALS ['url'] );
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_USERPWD, $GLOBALS ['username']. ':' . $GLOBALS ['password']);
	
	$response = curl_exec($curl);
	
	if (curl_errno($curl)) 
	{  
		die('Erro cURL: ' . curl_error($curl));
	}
	
	curl_close($curl);
	return $response;
}

// Buscar dados do web service
$jsonData = buscarDados();

// Decodificar JSON
$data = json_decode($jsonData, true);

// Abrir arquivo CSV para escrita
$csvFile = 'dados.csv';
$csv = fopen($csvFile, 'w');

// Escrever cabeçalho do CSV
$header = [
	'empresa_codigo', 'situacao', 'empresa_nome', 'gestor_matricula', 'cargo_nome', 
	'localidade_nome', 'nome', 'localidade_codigo', 'departamento_nome', 'rg', 
	'data_admissao', 'cpf', 'matricula', 'razao_social', 'cargo_codigo', 
	'centro_custo', 'departamento_codigo', 'data_desligamento', 'gestor_cpf'
];
fputcsv($csv, $header);

// Escrever dados no CSV
foreach ($data['items'] as $item)
{
	$line = [
		$item['empresa_codigo'], $item['situacao'], $item['empresa_nome'], $item['gestor_matricula'], $item['cargo_nome'], 
		$item['localidade_nome'], $item['nome'], $item['localidade_codigo'], $item['departamento_nome'], $item['rg'], 
		$item['data_admissao'], $item['cpf'], $item['matricula'], $item['razao_social'], $item['cargo_codigo'], 
		$item['centro_custo'], $item['departamento_codigo'], $item['data_desligamento'], $item['gestor_cpf']
	];
	fputcsv($csv, $line);
}

// Fechar o arquivo CSV
fclose($csv);

echo "CSV criado com sucesso em: $csvFile\n";