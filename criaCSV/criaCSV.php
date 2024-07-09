<?php
// Função para carregar configurações do arquivo ini
function loadConfig($file)
{
    if (!file_exists($file)) {
        die('Arquivo de configuração não encontrado: ' . $file);
    }
    return parse_ini_file($file, true);
}

// Função para buscar dados do web service com autenticação basic auth
function fetchData($url, $username, $password)
{
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "$username:$password");
    
    $response = curl_exec($curl);
    
    if (curl_errno($curl)) {
        die('Erro cURL: ' . curl_error($curl));
    }
    
    curl_close($curl);
    return $response;
}

// Carregar configurações do arquivo config.ini
$config = loadConfig('config.ini');

// Obter URL e credenciais do arquivo ini
$url = $config['api']['url'];
$username = $config['api']['username'];
$password = $config['api']['password'];

// Buscar dados do web service
$jsonData = fetchData($url, $username, $password);

// Decodificar JSON
$data = json_decode($jsonData, true);

// Verificar se a decodificação foi bem-sucedida
if (json_last_error() !== JSON_ERROR_NONE) {
    die('Erro ao decodificar JSON: ' . json_last_error_msg());
}

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
foreach ($data['items'] as $item) {
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
