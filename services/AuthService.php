<?php

declare(strict_types=1);

/**
 * GT HOMES — Auth Service
 *
 * Business-level authentication service.
 * Used by AuthController and AuthBLL to verify credentials.
 *
 * Responsibilities:
 *  - Verify raw password against stored hash
 *  - Hash new passwords before storage
 *  - Rate limiting / account lock (future)
 *
 * This service does NOT touch the session directly.
 * Session management is handled by auth_helper.php.
 */
final class AuthService
{
    /**
     * Hash a plain-text password for storage.
     * Uses PHP's default bcrypt algorithm (PASSWORD_DEFAULT).
     */
    public static function hashPassword(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_DEFAULT);
    }

    /**
     * Verify a plain-text password against a stored hash.
     */
    public static function verifyPassword(string $plainPassword, string $hash): bool
    {
        return password_verify($plainPassword, $hash);
    }

    /**
     * Check if a password hash needs to be rehashed (e.g., algorithm upgrade).
     * Call this after successful login and update the stored hash if true.
     */
    public static function needsRehash(string $hash): bool
    {
        return password_needs_rehash($hash, PASSWORD_DEFAULT);
    }

    /**
     * Validate raw login credentials format before hitting the database.
     *
     * @return array{valid: bool, errors: array<string, string>}
     */
    public static function validateLoginInput(string $email, string $password): array
    {
        $errors = [];

        if (!validate_required($email) || !validate_email($email)) {
            $errors['email'] = 'Please enter a valid email address.';
        }

        if (!validate_required($password)) {
            $errors['password'] = 'Password is required.';
        }

        return [
            'valid'  => empty($errors),
            'errors' => $errors,
        ];
    }
}
