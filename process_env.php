<?php
// Este arquivo será executado pelo GitHub Actions para gerar o HTML
function getEnvironmentVariables() {
    return [
        'APP_ENV' => getenv('APP_ENV') ?: 'production',
        'DB_HOST' => getenv('DB_HOST') ?: 'default_host',
        'DB_USER' => getenv('DB_USER') ?: 'default_user',
        'API_KEY' => getenv('API_KEY') ?: 'not_set'
    ];
}

// Gera o HTML com as variáveis
$vars = getEnvironmentVariables();
$html = <<<HTML
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variáveis de Ambiente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .variable {
            margin: 10px 0;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 3px;
        }
        .timestamp {
            color: #666;
            font-size: 0.9em;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Variáveis de Ambiente</h1>
        
        <div class="variables">
HTML;

foreach ($vars as $key => $value) {
    $html .= <<<HTML
            <div class="variable">
                <strong>$key:</strong> $value
            </div>
HTML;
}

$html .= <<<HTML
        </div>
        
        <div class="timestamp">
            Última atualização: {$_SERVER['REQUEST_TIME_FLOAT']}
        </div>
    </div>
</body>
</html>
HTML;

// Salva o HTML gerado
file_put_contents('index.html', $html);