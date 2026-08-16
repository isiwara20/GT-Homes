<?php

declare(strict_types=1);

/**
 * GT HOMES — Admin Login Entry Point
 * File: login.php
 *
 * NOTE: This URL is never linked from the public website.
 * Admin access URL: http://localhost/GT-Homes/login
 *
 * Apache rewrites /login → login.php (see .htaccess)
 */

require_once __DIR__ . '/config/init.php';

$controller = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->processLogin();
    // processLogin() always redirects — execution does not continue here.
} else {
    $data = $controller->showLogin();
    extract($data, EXTR_SKIP);
    require __DIR__ . '/views/auth/login.php';
}
