<?php

declare(strict_types=1);

/**
 * GT HOMES — Validation Helper
 *
 * Reusable validation utilities for forms and API inputs.
 * These functions validate and return true/false; they do NOT sanitise.
 * Always sanitise separately using security_helper.php functions.
 */

/**
 * Check if a string field is present and non-empty.
 */
function validate_required(mixed $value): bool
{
    return is_string($value) && trim($value) !== '';
}

/**
 * Check string length is within bounds (inclusive).
 */
function validate_length(string $value, int $min, int $max): bool
{
    $len = mb_strlen(trim($value), 'UTF-8');
    return $len >= $min && $len <= $max;
}

/**
 * Check that a value is a valid email address.
 */
function validate_email(mixed $value): bool
{
    return filter_var(trim((string) $value), FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Check that a value is a valid phone number (basic SL-friendly check).
 * Accepts formats: 07XXXXXXXX, +94XXXXXXXXX, 0094XXXXXXXXX
 */
function validate_phone(mixed $value): bool
{
    $phone = preg_replace('/[\s\-\(\)]/', '', (string) $value);
    return (bool) preg_match('/^(?:\+94|0094|0)[0-9]{9}$/', $phone);
}

/**
 * Check that a value is a valid date in Y-m-d format.
 */
function validate_date(mixed $value): bool
{
    if (!is_string($value) || empty($value)) {
        return false;
    }
    $d = DateTime::createFromFormat('Y-m-d', $value);
    return $d !== false && $d->format('Y-m-d') === $value;
}

/**
 * Check that check-out date is after check-in date.
 */
function validate_date_range(string $checkIn, string $checkOut): bool
{
    if (!validate_date($checkIn) || !validate_date($checkOut)) {
        return false;
    }
    return strtotime($checkOut) > strtotime($checkIn);
}

/**
 * Check that a check-in date is not in the past.
 */
function validate_future_date(string $date): bool
{
    if (!validate_date($date)) {
        return false;
    }
    return strtotime($date) >= strtotime('today');
}

/**
 * Check that a value is a positive integer.
 */
function validate_positive_int(mixed $value): bool
{
    return filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) !== false;
}

/**
 * Check that a value is within an allowed set.
 */
function validate_in_list(mixed $value, array $allowed): bool
{
    return in_array($value, $allowed, strict: true);
}

/**
 * Collect and return validation errors.
 * Returns an empty array if all validations pass.
 *
 * Usage:
 *   $errors = validate_form([
 *       'name'  => [validate_required($name),  'Name is required.'],
 *       'email' => [validate_email($email),    'Invalid email address.'],
 *   ]);
 *
 * @param  array<string, array{0: bool, 1: string}> $rules
 * @return array<string, string>
 */
function validate_form(array $rules): array
{
    $errors = [];
    foreach ($rules as $field => [$passes, $message]) {
        if (!$passes) {
            $errors[$field] = $message;
        }
    }
    return $errors;
}
