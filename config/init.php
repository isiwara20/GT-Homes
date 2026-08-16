<?php

declare(strict_types=1);

/**
 * GT HOMES Holiday Resort — Bootstrap / Initialization
 *
 * Every top-level entry point must begin with:
 *   require_once __DIR__ . '/../config/init.php';   (from sub-directories)
 *   require_once __DIR__ . '/config/init.php';       (from project root)
 *
 * This file handles, in order:
 *   1. Application configuration constants
 *   2. Mail configuration constants
 *   3. Timezone
 *   4. Error handling (environment-aware)
 *   5. Session security configuration
 *   6. Autoloader (Controllers / BLL / DAL / Services)
 *   7. Helper loading
 *   8. Database configuration (makes Database class available)
 *   9. Service dependencies loaded for autoloader resolution
 */

// ─────────────────────────────────────────────
// 1. Config — must be first (defines constants)
// ─────────────────────────────────────────────
require_once __DIR__ . '/app.php';
require_once __DIR__ . '/mail.php';

// ─────────────────────────────────────────────
// 2. Timezone
// ─────────────────────────────────────────────
date_default_timezone_set(APP_TIMEZONE);

// ─────────────────────────────────────────────
// 3. Error handling (environment-aware)
// ─────────────────────────────────────────────
if (APP_ENV === 'development') {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    error_reporting(0);
    // In production, all errors go to the log file only.
    ini_set('log_errors', '1');
    ini_set('error_log', LOG_APP_FILE);
}

// ─────────────────────────────────────────────
// 4. Autoloader
//    Resolves classes from: controllers/ bll/ dal/ services/
// ─────────────────────────────────────────────
spl_autoload_register(function (string $className): void {
    $root = dirname(__DIR__);   // project root (one level above /config)

    $directories = [
        $root . '/controllers/',
        $root . '/bll/',
        $root . '/dal/',
        $root . '/services/',
    ];

    foreach ($directories as $dir) {
        $file = $dir . $className . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

// ─────────────────────────────────────────────
// 5. Helpers (procedural, must be required manually)
// ─────────────────────────────────────────────
$helpersPath = dirname(__DIR__) . '/helpers/';

require_once $helpersPath . 'security_helper.php';
require_once $helpersPath . 'auth_helper.php';
require_once $helpersPath . 'url_helper.php';
require_once $helpersPath . 'validation_helper.php';
require_once $helpersPath . 'view_helper.php';
require_once $helpersPath . 'format_helper.php';

// ─────────────────────────────────────────────
// 6. Database class (makes Database::getConnection() available)
// ─────────────────────────────────────────────
require_once __DIR__ . '/db.php';

// ─────────────────────────────────────────────
// 7. Session
//    Configure session security before starting.
//    Session is started here so every page has $_SESSION available.
// ─────────────────────────────────────────────
if (session_status() === PHP_SESSION_NONE) {
    $cookieParams = [
        'lifetime' => SESSION_LIFETIME,
        'path'     => '/',
        'domain'   => '',           // current domain only
        'secure'   => false,        // set true in production (HTTPS)
        'httponly' => true,         // no JS access to session cookie
        'samesite' => 'Lax',        // CSRF mitigation
    ];

    session_name(SESSION_NAME);
    session_set_cookie_params($cookieParams);
    session_start();
}
