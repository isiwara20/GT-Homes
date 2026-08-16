<?php

declare(strict_types=1);

/**
 * GT HOMES — Logger Service
 *
 * Simple file-based logger.
 * Must be loaded before other services so Database can use it.
 *
 * Usage:
 *   LoggerService::info('Room loaded', ['room_id' => 5]);
 *   LoggerService::error('DB failed', ['msg' => $e->getMessage()]);
 */
final class LoggerService
{
    public const LEVEL_INFO    = 'INFO';
    public const LEVEL_WARNING = 'WARNING';
    public const LEVEL_ERROR   = 'ERROR';
    public const LEVEL_DEBUG   = 'DEBUG';

    /** Log an informational message. */
    public static function info(string $message, array $context = []): void
    {
        self::write(self::LEVEL_INFO, $message, $context, LOG_APP_FILE);
    }

    /** Log a warning. */
    public static function warning(string $message, array $context = []): void
    {
        self::write(self::LEVEL_WARNING, $message, $context, LOG_APP_FILE);
    }

    /** Log an error. */
    public static function error(string $message, array $context = []): void
    {
        self::write(self::LEVEL_ERROR, $message, $context, LOG_APP_FILE);
    }

    /** Log a debug message (only written in development). */
    public static function debug(string $message, array $context = []): void
    {
        if (APP_ENV !== 'development') {
            return;
        }
        self::write(self::LEVEL_DEBUG, $message, $context, LOG_APP_FILE);
    }

    /** Log a mail event. */
    public static function mail(string $message, array $context = []): void
    {
        self::write(self::LEVEL_INFO, $message, $context, LOG_MAIL_FILE);
    }

    /** Log a mail failure. */
    public static function mailError(string $message, array $context = []): void
    {
        self::write(self::LEVEL_ERROR, $message, $context, LOG_MAIL_FILE);
    }

    /**
     * Core write method.
     * Appends a formatted log line to the target log file.
     */
    private static function write(
        string $level,
        string $message,
        array  $context,
        string $logFile
    ): void {
        $timestamp = date('Y-m-d H:i:s');
        $contextStr = empty($context) ? '' : ' ' . json_encode($context, JSON_UNESCAPED_UNICODE);

        $line = "[{$timestamp}] [{$level}] {$message}{$contextStr}" . PHP_EOL;

        // Ensure the log directory exists.
        $dir = dirname($logFile);
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, recursive: true);
        }

        @file_put_contents($logFile, $line, FILE_APPEND | LOCK_EX);
    }
}
