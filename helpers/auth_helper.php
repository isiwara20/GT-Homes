<?php

declare(strict_types=1);

/**
 * GT HOMES — Authentication Helper
 *
 * Session-based admin authentication utilities.
 * All admin pages must call requireAdmin() before rendering.
 *
 * There is NO client/visitor authentication in this application.
 */

/**
 * Check whether the admin is currently logged in.
 */
function isAdminLoggedIn(): bool
{
    return isset($_SESSION['admin_id'], $_SESSION['admin_email'])
        && !empty($_SESSION['admin_id']);
}

/**
 * Require admin authentication.
 * If not authenticated, redirect to the login page and terminate.
 */
function requireAdmin(): void
{
    if (!isAdminLoggedIn()) {
        redirect(ADMIN_LOGIN_PATH);
    }
}

/**
 * If the admin is already logged in, redirect them away from login.
 * Use this on the login page to avoid showing it to an active admin.
 */
function redirectIfAuthenticated(): void
{
    if (isAdminLoggedIn()) {
        redirect(ADMIN_DASH_PATH);
    }
}

/**
 * Store admin identity in the session after successful login.
 * Always regenerates the session ID to prevent session fixation.
 */
function loginAdmin(int $adminId, string $email, string $name): void
{
    session_regenerate_id(true);

    $_SESSION['admin_id']    = $adminId;
    $_SESSION['admin_email'] = $email;
    $_SESSION['admin_name']  = $name;
    $_SESSION['login_time']  = time();
}

/**
 * Destroy the admin session cleanly.
 */
function logoutAdmin(): void
{
    // Unset all session variables
    $_SESSION = [];

    // Destroy the session cookie
    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params['path'],
            $params['domain'],
            $params['secure'],
            $params['httponly']
        );
    }

    session_destroy();
}

/**
 * Get the currently logged-in admin's name (safe for output).
 */
function getAdminName(): string
{
    return e($_SESSION['admin_name'] ?? 'Admin');
}

/**
 * Get the currently logged-in admin's email (safe for output).
 */
function getAdminEmail(): string
{
    return e($_SESSION['admin_email'] ?? '');
}

/**
 * Check whether the admin session has expired.
 * Returns true if the session is still valid.
 */
function isSessionValid(): bool
{
    if (!isset($_SESSION['login_time'])) {
        return false;
    }
    return (time() - $_SESSION['login_time']) < SESSION_LIFETIME;
}
