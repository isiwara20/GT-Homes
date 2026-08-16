<?php

declare(strict_types=1);

/**
 * GT HOMES — View Helper
 *
 * Utility functions for rendering partials and view-level logic.
 */

/**
 * Render a partial view file.
 * The partial has access to $data if provided.
 *
 * Usage:
 *   partial('partials/public_header', ['title' => 'Rooms']);
 */
function partial(string $view, array $data = []): void
{
    $file = VIEWS_PATH . '/' . $view . '.php';

    if (!is_file($file)) {
        trigger_error("View partial not found: {$file}", E_USER_WARNING);
        return;
    }

    // Extract data so the partial can use $variable names directly.
    if (!empty($data)) {
        extract($data, EXTR_SKIP);
    }

    require $file;
}

/**
 * Render a view file, optionally passing data.
 *
 * Usage:
 *   render_view('public/rooms', $data);
 */
function render_view(string $view, array $data = []): void
{
    $file = VIEWS_PATH . '/' . $view . '.php';

    if (!is_file($file)) {
        trigger_error("View not found: {$file}", E_USER_WARNING);
        return;
    }

    if (!empty($data)) {
        extract($data, EXTR_SKIP);
    }

    require $file;
}

/**
 * Display a flash message stored in the session.
 * Returns an HTML string (escaped) or empty string.
 */
function flash(string $key = 'flash'): string
{
    if (!isset($_SESSION[$key])) {
        return '';
    }

    $message = $_SESSION[$key];
    $type    = $_SESSION[$key . '_type'] ?? 'info';

    unset($_SESSION[$key], $_SESSION[$key . '_type']);

    $safeMessage = e($message);
    $safeType    = e($type);   // success | error | warning | info

    return "<div class=\"alert alert--{$safeType}\" role=\"alert\">{$safeMessage}</div>";
}

/**
 * Set a flash message in the session for the next request.
 */
function set_flash(string $message, string $type = 'info', string $key = 'flash'): void
{
    $_SESSION[$key]              = $message;
    $_SESSION[$key . '_type']    = $type;
}

/**
 * Generate the HTML <title> tag content.
 * Falls back to APP_NAME if no page title is provided.
 */
function page_title(string $title = ''): string
{
    if ($title === '') {
        return e(APP_NAME);
    }
    return e($title) . ' — ' . e(APP_NAME);
}

/**
 * Output a CSRF hidden input field for use in forms.
 */
function csrf_field(): string
{
    $token = CsrfService::generateToken();
    return '<input type="hidden" name="_csrf_token" value="' . e($token) . '">';
}
