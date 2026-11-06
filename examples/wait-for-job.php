<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use BrowserSolver\Client;

$client = new Client(); // reads BROWSERSOLVER_API_KEY
$submitted = $client->websiteWebunlocker(['query' => 'https://example.com', 'is_async' => true]);
$jobId = \is_array($submitted->data) ? (string) ($submitted->data['job_id'] ?? '') : '';
$job = $client->waitForJob($jobId, onProgress: static function (mixed $job): void {
    if (\is_array($job)) {
        echo $job['status'] ?? '?', ' ', $job['progress'] ?? 0, "%\n";
    }
});
print_r($job->data);
