<?php

declare(strict_types=1);

/**
 * GT HOMES — Format Helper
 *
 * Data formatting utilities used in views and BLL.
 */

/**
 * Format a monetary amount as LKR currency string.
 * Example: 12500 → "LKR 12,500.00"
 */
function format_currency(float|int $amount): string
{
    return 'LKR ' . number_format((float) $amount, 2);
}

/**
 * Format a date string or timestamp as a human-readable date.
 * Example: '2026-08-20' → 'Thursday, 20 August 2026'
 */
function format_date(string|int $date, string $format = 'l, d F Y'): string
{
    if (is_int($date)) {
        return date($format, $date);
    }
    $ts = strtotime($date);
    return $ts !== false ? date($format, $ts) : e($date);
}

/**
 * Format a date range as a human-readable string.
 * Example: '2026-08-20' to '2026-08-22' → '20–22 August 2026'
 */
function format_date_range(string $checkIn, string $checkOut): string
{
    $inTs  = strtotime($checkIn);
    $outTs = strtotime($checkOut);

    if ($inTs === false || $outTs === false) {
        return e($checkIn) . ' — ' . e($checkOut);
    }

    $inDay    = date('d', $inTs);
    $outDay   = date('d', $outTs);
    $inMonth  = date('F', $inTs);
    $outMonth = date('F', $outTs);
    $inYear   = date('Y', $inTs);
    $outYear  = date('Y', $outTs);

    if ($inYear === $outYear && $inMonth === $outMonth) {
        return "{$inDay}–{$outDay} {$inMonth} {$inYear}";
    }

    if ($inYear === $outYear) {
        return "{$inDay} {$inMonth} – {$outDay} {$outMonth} {$inYear}";
    }

    return "{$inDay} {$inMonth} {$inYear} – {$outDay} {$outMonth} {$outYear}";
}

/**
 * Calculate the number of nights between two dates.
 */
function count_nights(string $checkIn, string $checkOut): int
{
    $in  = strtotime($checkIn);
    $out = strtotime($checkOut);

    if ($in === false || $out === false || $out <= $in) {
        return 0;
    }

    return (int) round(($out - $in) / 86400);
}

/**
 * Truncate a string to a maximum length, appending an ellipsis.
 */
function truncate(string $text, int $max = 120, string $suffix = '…'): string
{
    $text = strip_tags($text);
    if (mb_strlen($text, 'UTF-8') <= $max) {
        return $text;
    }
    return rtrim(mb_substr($text, 0, $max, 'UTF-8')) . $suffix;
}

/**
 * Format a phone number for display.
 * Example: '0777872280' → '077 787 2280'
 */
function format_phone(string $phone): string
{
    $digits = preg_replace('/[^0-9]/', '', $phone);

    // Sri Lankan mobile: 07X XXXXXXX
    if (strlen($digits) === 10 && str_starts_with($digits, '0')) {
        return substr($digits, 0, 3) . ' ' . substr($digits, 3, 3) . ' ' . substr($digits, 6);
    }

    return $phone;
}

/**
 * Convert a booking status code to a human-readable badge label.
 */
function format_booking_status(string $status): string
{
    return match (strtoupper($status)) {
        'PENDING'   => 'Pending',
        'CONTACTED' => 'Contacted',
        'CONFIRMED' => 'Confirmed',
        'CANCELLED' => 'Cancelled',
        'COMPLETED' => 'Completed',
        default     => ucfirst(strtolower($status)),
    };
}
