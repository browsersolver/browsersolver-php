<?php

declare(strict_types=1);

namespace BrowserSolver\Exception;

/**
 * The request failed before a complete HTTP response was received.
 */
final class TransportException extends BrowserSolverException
{
    public function __construct(string $message, \Throwable $previous)
    {
        parent::__construct($message . ' ' . $previous->getMessage(), 0, $previous);
    }
}
