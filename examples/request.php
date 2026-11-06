<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use BrowserSolver\Client;

$client = new Client(); // reads BROWSERSOLVER_API_KEY
try {
    $response = $client->request('GET', '/v1/usage');
    if ($response instanceof BrowserSolver\JsonResponse) {
        print_r($response->data);
    }
} catch (BrowserSolver\Exception\ApiException $exception) {
    fwrite(STDERR, sprintf("HTTP %d: %s\n", $exception->status, $exception->getMessage()));
}
