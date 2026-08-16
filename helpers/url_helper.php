<?php

declare(strict_types=1);

/**
 * GT HOMES — URL Helper
 *
 * Centralised URL generation so no hard-coded URLs appear in views.
 */

/**
 * Generate an absolute public URL.
 * Examples:
 *   url()              → http://localhost/GT-Homes
 *   url('rooms')       → http://localhost/GT-Homes/rooms
 *   url('room/orchid') → http://localhost/GT-Homes/room/orchid
 */
function url(string $path = ''): string
{
    $base = rtrim(APP_URL, '/');
    $path = ltrim($path, '/');
    return $path === '' ? $base : $base . '/' . $path;
}

/**
 * Generate an asset URL.
 * Examples:
 *   asset('css/global.css')     → http://localhost/GT-Homes/assets/css/global.css
 *   asset('images/logo.png')    → http://localhost/GT-Homes/assets/images/logo.png
 */
function asset(string $path): string
{
    return rtrim(ASSETS_URL, '/') . '/' . ltrim($path, '/');
}

/**
 * Generate an admin URL.
 */
function admin_url(string $path = ''): string
{
    $base = rtrim(ADMIN_URL, '/');
    $path = ltrim($path, '/');
    return $path === '' ? $base : $base . '/' . $path;
}

/**
 * Perform an HTTP redirect and terminate.
 *
 * @param string $path  Full URL or an absolute path (starting with /)
 * @param int    $code  HTTP status code (301, 302, etc.)
 */
function redirect(string $path, int $code = 302): never
{
    // Protect against header injection
    $path = preg_replace('/[\r\n]/', '', $path);

    header('Location: ' . $path, true, $code);
    exit;
}

/**
 * Redirect back to the referring page (or to a fallback URL).
 */
function redirect_back(string $fallback = '/'): never
{
    $referer = $_SERVER['HTTP_REFERER'] ?? '';

    // Only trust referers from our own domain.
    if ($referer !== '' && str_starts_with($referer, APP_URL)) {
        redirect($referer);
    }

    redirect($fallback);
}

/**
 * Return the current request URI (path only, no query string).
 */
function current_path(): string
{
    return parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?? '/';
}

/**
 * Check whether the given path segment matches the current URL.
 * Useful for highlighting active navigation items.
 *
 * Example: is_active('rooms') → true when visiting /GT-Homes/rooms
 */
function is_active(string $segment): bool
{
    $current = current_path();
    return str_contains($current, '/' . ltrim($segment, '/'));
}
