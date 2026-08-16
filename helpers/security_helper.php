<?php

declare(strict_types=1);

/**
 * GT HOMES — Security Helper
 *
 * Core output escaping and security utilities.
 * Every dynamic value rendered in a view must pass through e().
 */

/**
 * Escape a value for safe HTML output.
 * Use in views: <?= e($userInput) ?>
 */
function e(mixed $value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

/**
 * Escape a value for use inside a JavaScript string literal.
 * Use: var name = "<?= js_escape($value) ?>";
 */
function js_escape(mixed $value): string
{
    return json_encode(
        (string) $value,
        JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE
    );
}

/**
 * Sanitise a string for use in a URL segment (slug).
 */
function slugify(string $text): string
{
    $text = mb_strtolower($text, 'UTF-8');
    $text = preg_replace('/[^a-z0-9\s\-]/', '', $text);
    $text = preg_replace('/[\s\-]+/', '-', $text);
    return trim($text, '-');
}

/**
 * Sanitise an integer from user input.
 * Returns null if the value is not a valid integer.
 */
function sanitise_int(mixed $value): ?int
{
    $filtered = filter_var($value, FILTER_VALIDATE_INT);
    return ($filtered === false) ? null : (int) $filtered;
}

/**
 * Sanitise a string by stripping tags and trimming whitespace.
 */
function sanitise_string(mixed $value): string
{
    return trim(strip_tags((string) $value));
}

/**
 * Sanitise an email address.
 * Returns empty string if invalid.
 */
function sanitise_email(mixed $value): string
{
    $email = filter_var(trim((string) $value), FILTER_SANITIZE_EMAIL);
    return filter_var($email, FILTER_VALIDATE_EMAIL) ? $email : '';
}

/**
 * Return a safe JSON response and terminate execution.
 * Used by API endpoints.
 */
function json_response(bool $success, string $message, array $data = [], int $httpCode = 200): never
{
    http_response_code($httpCode);
    header('Content-Type: application/json; charset=UTF-8');
    header('X-Content-Type-Options: nosniff');

    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data'    => $data,
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

/**
 * Return a safe JSON error response and terminate execution.
 */
function json_error(string $message, array $errors = [], int $httpCode = 400): never
{
    http_response_code($httpCode);
    header('Content-Type: application/json; charset=UTF-8');

    echo json_encode([
        'success' => false,
        'message' => $message,
        'errors'  => $errors,
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

/**
 * Prevent clickjacking and set basic security headers.
 * Call this near the top of pages that render full HTML.
 */
function set_security_headers(): void
{
    header('X-Frame-Options: SAMEORIGIN');
    header('X-Content-Type-Options: nosniff');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}
