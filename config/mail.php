<?php

declare(strict_types=1);

/**
 * GT HOMES Holiday Resort — Mail Configuration
 *
 * Centralised mail settings used by EmailService.
 * All values are constants — never scattered throughout views or controllers.
 */

// ─────────────────────────────────────────────
// Sender
// ─────────────────────────────────────────────
define('MAIL_FROM_ADDRESS', 'noreply@gthomes.lk');
define('MAIL_FROM_NAME',    'GT HOMES Holiday Resort');

// ─────────────────────────────────────────────
// Recipients
// ─────────────────────────────────────────────
define('MAIL_ADMIN_ADDRESS',    'gthomes99ck@gmail.com');   // enquiries go here
define('MAIL_BOOKING_ADDRESS',  'gthomes99ck@gmail.com');

// ─────────────────────────────────────────────
// Behaviour
// ─────────────────────────────────────────────
define('MAIL_REPLY_TO',     MAIL_ADMIN_ADDRESS);
define('MAIL_CHARSET',      'UTF-8');
define('MAIL_CONTENT_TYPE', 'text/html');

// ─────────────────────────────────────────────
// Logging
// ─────────────────────────────────────────────
// Failed mails are logged to LOG_MAIL_FILE (defined in app.php).
