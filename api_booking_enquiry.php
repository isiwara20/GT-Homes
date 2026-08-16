<?php

declare(strict_types=1);

/**
 * GT HOMES — API: Booking Enquiry
 * File: api_booking_enquiry.php
 *
 * Returns JSON. Only accepts POST requests.
 * Full implementation in Step 2+.
 */

require_once __DIR__ . '/config/init.php';

header('Content-Type: application/json; charset=UTF-8');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_error('Method not allowed.', [], 405);
}

// Validate CSRF
$submittedToken = sanitise_string($_POST['_csrf_token'] ?? '');
if (!CsrfService::validateToken($submittedToken)) {
    json_error('Invalid security token.', [], 403);
}

// Collect and sanitise inputs
$data = [
    'full_name'       => sanitise_string($_POST['full_name']       ?? ''),
    'email'           => sanitise_email($_POST['email']             ?? ''),
    'phone'           => sanitise_string($_POST['phone']            ?? ''),
    'check_in_date'   => sanitise_string($_POST['check_in_date']    ?? ''),
    'check_out_date'  => sanitise_string($_POST['check_out_date']   ?? ''),
    'guests'          => sanitise_int($_POST['guests']              ?? 1) ?? 1,
    'room_id'         => sanitise_int($_POST['room_id']             ?? null),
    'package_id'      => sanitise_int($_POST['package_id']          ?? null),
    'special_request' => sanitise_string($_POST['special_request']  ?? ''),
    'contact_method'  => sanitise_string($_POST['contact_method']   ?? 'email'),
];

// Delegate validation and saving to BLL
$bookingBll = new BookingBLL();
$result     = $bookingBll->submitEnquiry($data);

if (!$result['success']) {
    json_error($result['message'], $result['errors'], 422);
}

// Build WhatsApp URL
$whatsAppUrl = WhatsAppService::buildBookingUrl($data);

json_response(true, 'Booking enquiry received. We will contact you shortly.', [
    'whatsapp_url' => $whatsAppUrl,
]);
