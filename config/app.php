<?php

declare(strict_types=1);

/**
 * GT HOMES Holiday Resort — Application Configuration
 *
 * Central configuration file for application-wide constants.
 * All paths, URLs, and environment settings live here.
 */

// ─────────────────────────────────────────────
// Environment
// ─────────────────────────────────────────────
define('APP_ENV',       'development');   // 'development' | 'production'
define('APP_NAME',      'GT HOMES Holiday Resort');
define('APP_TAGLINE',   'Your Perfect Escape');
define('APP_VERSION',   '1.0.0');

// ─────────────────────────────────────────────
// URLs  (no trailing slash)
// ─────────────────────────────────────────────
define('APP_URL',       'http://localhost/GT-Homes');
define('ADMIN_URL',     APP_URL . '/admin');
define('ASSETS_URL',    APP_URL . '/assets');

// ─────────────────────────────────────────────
// Paths  (no trailing slash, absolute)
// ─────────────────────────────────────────────
define('BASE_PATH',     dirname(__DIR__));
define('CONFIG_PATH',   BASE_PATH . '/config');
define('VIEWS_PATH',    BASE_PATH . '/views');
define('STORAGE_PATH',  BASE_PATH . '/storage');
define('ASSETS_PATH',   BASE_PATH . '/assets');

// ─────────────────────────────────────────────
// Auth / Routing
// ─────────────────────────────────────────────
define('ADMIN_LOGIN_PATH',   '/GT-Homes/login');
define('ADMIN_DASH_PATH',    '/GT-Homes/admin');

// ─────────────────────────────────────────────
// Timezone & Locale
// ─────────────────────────────────────────────
define('APP_TIMEZONE',  'Asia/Colombo');

// ─────────────────────────────────────────────
// Session
// ─────────────────────────────────────────────
define('SESSION_LIFETIME',  3600);     // seconds
define('SESSION_NAME',      'GTHOMES_SESS');

// ─────────────────────────────────────────────
// CSRF
// ─────────────────────────────────────────────
define('CSRF_TOKEN_LENGTH',  64);
define('CSRF_SESSION_KEY',   '_csrf_token');

// ─────────────────────────────────────────────
// File Upload
// ─────────────────────────────────────────────
define('UPLOAD_MAX_SIZE',        5 * 1024 * 1024);  // 5 MB
define('UPLOAD_ALLOWED_TYPES',   ['image/jpeg', 'image/png', 'image/webp']);
define('UPLOAD_ALLOWED_EXTS',    ['jpg', 'jpeg', 'png', 'webp']);

// ─────────────────────────────────────────────
// WhatsApp & Contact Information
// ─────────────────────────────────────────────
// International format (no spaces, no dashes, with country code)
define('WHATSAPP_NUMBER', '94777872280');   // Sri Lanka: +94 777 872 280
define('HOTLINE_NUMBER',  '+94777872280');
define('HOTLINE_DISPLAY', '0777 872 280');
define('OFFICE_NUMBER',   '+94817872280');
define('OFFICE_DISPLAY',  '0817 872 280');
define('CONTACT_EMAIL',   'gthomes99ck@gmail.com');
define('RESORT_ADDRESS',  'No 99/C/3, Pragathi Road, Peradeniya, Sri Lanka');
define('MAPS_URL',        'https://www.google.com/maps/place/7%C2%B016%2727.3%22N+80%C2%B035%2717.3%22E/@7.2742367,80.5855518,826m/data=!3m2!1e3!4b1!4m4!3m3!8m2!3d7.2742367!4d80.5881267?hl=en&entry=ttu&g_ep=EgoyMDI2MDgxNi4wIKXMDSoASAFQAw%3D%3D');
define('ESTABLISHED_YEAR','2016');

// ─────────────────────────────────────────────
// Pagination
// ─────────────────────────────────────────────
define('ITEMS_PER_PAGE', 12);

// ─────────────────────────────────────────────
// Logging
// ─────────────────────────────────────────────
define('LOG_APP_FILE',  STORAGE_PATH . '/logs/app.log');
define('LOG_MAIL_FILE', STORAGE_PATH . '/logs/mail.log');
