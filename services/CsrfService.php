<?php

declare(strict_types=1);

/**
 * GT HOMES — CSRF Service
 *
 * Provides CSRF token generation and validation.
 * Tokens are stored in the PHP session and compared on form submission.
 *
 * Usage (in a view form):
 *   <?= csrf_field() ?>          ← uses view_helper wrapper
 *
 * Usage (in a controller, after POST):
 *   CsrfService::validateOrFail();
 */
final class CsrfService
{
    /**
     * Generate a CSRF token and store it in the session.
     * Returns the existing token if one already exists.
     */
    public static function generateToken(): string
    {
        if (empty($_SESSION[CSRF_SESSION_KEY])) {
            $_SESSION[CSRF_SESSION_KEY] = bin2hex(
                random_bytes((int) (CSRF_TOKEN_LENGTH / 2))
            );
        }

        return $_SESSION[CSRF_SESSION_KEY];
    }

    /**
     * Validate the CSRF token submitted with a POST request.
     * Returns true if valid, false otherwise.
     */
    public static function validateToken(string $submittedToken): bool
    {
        if (empty($_SESSION[CSRF_SESSION_KEY])) {
            return false;
        }

        return hash_equals($_SESSION[CSRF_SESSION_KEY], $submittedToken);
    }

    /**
     * Validate the CSRF token from POST data, or abort with a 403 error.
     * Call this at the beginning of any POST-handling controller method.
     */
    public static function validateOrFail(): void
    {
        $submitted = $_POST['_csrf_token'] ?? '';

        if (!self::validateToken($submitted)) {
            LoggerService::warning('CSRF token validation failed', [
                'ip'  => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
                'uri' => $_SERVER['REQUEST_URI'] ?? 'unknown',
            ]);

            http_response_code(403);
            require VIEWS_PATH . '/errors/403.php';
            exit;
        }
    }

    /**
     * Regenerate the CSRF token.
     * Call this after successful form processing for extra security.
     */
    public static function regenerate(): string
    {
        unset($_SESSION[CSRF_SESSION_KEY]);
        return self::generateToken();
    }
}
