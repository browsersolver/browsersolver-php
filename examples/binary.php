<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use BrowserSolver\Client;

$client = new Client(); // reads BROWSERSOLVER_API_KEY
$response = $client->websiteScreenshot(['url' => 'https://example.com', 'format' => 'png']);
if ($response instanceof BrowserSolver\BinaryResponse) {
    $response->save('screenshot.png');
    echo 'Saved screenshot.png (', $response->contentType, ', ', \strlen($response->bytes), " bytes)\n";
} else {
    print_r($response->data);
}
