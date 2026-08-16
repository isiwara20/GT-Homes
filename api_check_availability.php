<?php

declare(strict_types=1);

/**
 * GT HOMES — API: Check Room Availability
 * File: api_check_availability.php
 *
 * Returns JSON. Only accepts GET requests.
 * Full implementation in Step 2+.
 */

require_once __DIR__ . '/config/init.php';

header('Content-Type: application/json; charset=UTF-8');
header('X-Content-Type-Options: nosniff');

// Only allow GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    json_error('Method not allowed.', [], 405);
}

$roomId    = sanitise_int($_GET['room_id']    ?? null);
$checkIn   = sanitise_string($_GET['check_in']  ?? '');
$checkOut  = sanitise_string($_GET['check_out'] ?? '');

// Basic input validation
$errors = validate_form([
    'room_id' => [
        $roomId !== null && $roomId > 0,
        'A valid room_id is required.',
    ],
    'check_in' => [
        validate_required($checkIn) && validate_date($checkIn),
        'check_in must be a valid date (Y-m-d).',
    ],
    'check_out' => [
        validate_required($checkOut) && validate_date_range($checkIn, $checkOut),
        'check_out must be a valid date after check_in.',
    ],
]);

if (!empty($errors)) {
    json_error('Invalid request parameters.', $errors, 422);
}

// TODO (Step 2+): Query BookingDAL / RoomDAL for real availability.
json_response(true, 'Availability endpoint is under construction.', [
    'room_id'   => $roomId,
    'check_in'  => $checkIn,
    'check_out' => $checkOut,
    'available' => null,   // null = not yet implemented
]);
