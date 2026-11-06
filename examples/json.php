<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use BrowserSolver\Client;

$client = new Client(); // reads BROWSERSOLVER_API_KEY
$response = $client->websiteWebunlocker(['query' => 'https://example.com']);
echo json_encode($response->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), "\n";
