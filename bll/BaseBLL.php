<?php

declare(strict_types=1);

/**
 * GT HOMES — Base BLL (Business Logic Layer)
 *
 * All BLL classes extend this.
 * Provides shared result-building utilities.
 *
 * BLL rules:
 *  - Contains business rules and validation logic
 *  - Delegates ALL SQL to DAL classes
 *  - Never accesses $_POST, $_GET, $_SERVER directly
 *  - Never renders HTML
 *  - Returns structured arrays to Controllers
 */
abstract class BaseBLL
{
    /**
     * Build a success result.
     * @param array<string, mixed> $data
     */
    protected function success(array $data = [], string $message = 'Success.'): array
    {
        return [
            'success' => true,
            'message' => $message,
            'data'    => $data,
            'errors'  => [],
        ];
    }

    /**
     * Build a failure result with validation errors.
     * @param array<string, string> $errors
     */
    protected function failure(array $errors = [], string $message = 'Validation failed.'): array
    {
        return [
            'success' => false,
            'message' => $message,
            'data'    => [],
            'errors'  => $errors,
        ];
    }
}
