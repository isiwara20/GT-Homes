<?php

declare(strict_types=1);

/**
 * GT HOMES Holiday Resort — Database Configuration
 *
 * Returns a singleton PDO connection.
 * All credentials are sourced from constants defined in this file.
 * No credentials appear anywhere else in the application.
 *
 * Usage:
 *   $pdo = Database::getConnection();
 */

// ─────────────────────────────────────────────
// Credentials — adjust for your environment
// ─────────────────────────────────────────────
define('DB_HOST',     'localhost');
define('DB_PORT',     '3306');
define('DB_NAME',     'gt_homes');
define('DB_USER',     'root');
define('DB_PASSWORD', '');
define('DB_CHARSET',  'utf8mb4');

/**
 * Database — PDO singleton wrapper.
 */
final class Database
{
    private static ?PDO $instance = null;

    /** No instantiation. */
    private function __construct() {}
    private function __clone() {}

    /**
     * Return the shared PDO connection, creating it on first call.
     *
     * @throws RuntimeException on connection failure (safe message only).
     */
    public static function getConnection(): PDO
    {
        if (self::$instance === null) {
            self::$instance = self::createConnection();
        }

        return self::$instance;
    }

    private static function createConnection(): PDO
    {
        $dsn = sprintf(
            'mysql:host=%s;port=%s;dbname=%s;charset=%s',
            DB_HOST,
            DB_PORT,
            DB_NAME,
            DB_CHARSET
        );

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::MYSQL_ATTR_FOUND_ROWS   => true,
        ];

        try {
            return new PDO($dsn, DB_USER, DB_PASSWORD, $options);
        } catch (PDOException $e) {
            // Log the real error, never expose it publicly.
            LoggerService::error(
                'Database connection failed: ' . $e->getMessage()
            );

            if (APP_ENV === 'development') {
                // In development, give the developer a useful message.
                throw new RuntimeException(
                    'Database connection failed. Check your credentials in config/db.php. '
                    . 'Original: ' . $e->getMessage()
                );
            }

            // In production, show nothing sensitive.
            throw new RuntimeException(
                'A database error occurred. Please try again later.'
            );
        }
    }
}
