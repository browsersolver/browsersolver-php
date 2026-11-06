<?php

declare(strict_types=1);

namespace BrowserSolver\Exception;

use BrowserSolver\JsonResponse;

/**
 * An async job did not reach a terminal status before the deadline.
 */
final class JobTimeoutException extends BrowserSolverException
{
    public function __construct(public readonly string $jobId, public readonly ?JsonResponse $lastResponse = null)
    {
        parent::__construct(sprintf('Job %s did not finish before the deadline.', $jobId));
    }
}
