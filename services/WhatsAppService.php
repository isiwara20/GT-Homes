<?php

declare(strict_types=1);

/**
 * GT HOMES — WhatsApp Service
 *
 * Generates click-to-chat WhatsApp URLs pre-filled with booking details.
 * This is the ONLY place WhatsApp links are constructed in the application.
 *
 * The WhatsApp destination number is sourced from the APP constant WHATSAPP_NUMBER
 * (defined in config/app.php as the international format without the + sign).
 *
 * Official WhatsApp click-to-chat format:
 *   https://wa.me/<number>?text=<url-encoded-message>
 *
 * Usage:
 *   $url = WhatsAppService::buildBookingUrl($enquiryData);
 *   // Then render a link: <a href="<?= e($url) ?>">Book via WhatsApp</a>
 *
 * NOTE: This uses standard WhatsApp click-to-chat only.
 *       No unofficial API is used.
 *
 * Step 1: Full skeleton. Complete message formatting implemented in a later step.
 */
final class WhatsAppService
{
    private const BASE_URL = 'https://wa.me/';

    /**
     * Build a WhatsApp booking enquiry URL.
     *
     * @param array<string, mixed> $data  Booking enquiry data
     * @return string  WhatsApp click-to-chat URL
     */
    public static function buildBookingUrl(array $data): string
    {
        $message = self::formatBookingMessage($data);
        return self::BASE_URL . WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
    }

    /**
     * Build a generic WhatsApp contact URL (no booking context).
     *
     * @param string $message  Optional pre-filled message
     * @return string
     */
    public static function buildContactUrl(string $message = ''): string
    {
        if ($message === '') {
            $message = 'Hello GT HOMES Holiday Resort, I would like to make an enquiry.';
        }
        return self::BASE_URL . WHATSAPP_NUMBER . '?text=' . rawurlencode($message);
    }

    /**
     * Format a booking enquiry message for WhatsApp.
     *
     * Future implementation will use the full data from the booking form.
     * The message is kept plain-text and readable.
     */
    private static function formatBookingMessage(array $data): string
    {
        $name     = $data['full_name']     ?? 'Guest';
        $phone    = $data['phone']         ?? '';
        $room     = $data['room']          ?? 'Not specified';
        $package  = $data['package']       ?? 'Not specified';
        $checkIn  = $data['check_in_date'] ?? '';
        $checkOut = $data['check_out_date'] ?? '';
        $guests   = $data['guests']        ?? '';
        $request  = $data['special_request'] ?? '';

        // Format dates if valid
        if ($checkIn !== '') {
            $checkIn = format_date($checkIn, 'd F Y');
        }
        if ($checkOut !== '') {
            $checkOut = format_date($checkOut, 'd F Y');
        }

        $lines = [
            'Hello GT HOMES Holiday Resort,',
            '',
            'I would like to make a booking enquiry.',
            '',
            'Room: ' . $room,
        ];

        if ($package !== 'Not specified') {
            $lines[] = 'Package: ' . $package;
        }

        if ($checkIn !== '') {
            $lines[] = 'Check-In: ' . $checkIn;
        }

        if ($checkOut !== '') {
            $lines[] = 'Check-Out: ' . $checkOut;
        }

        if ($guests !== '') {
            $lines[] = 'Guests: ' . $guests;
        }

        $lines[] = 'Name: ' . $name;

        if ($phone !== '') {
            $lines[] = 'Phone: ' . $phone;
        }

        if ($request !== '') {
            $lines[] = '';
            $lines[] = 'Special Request: ' . $request;
        }

        $lines[] = '';
        $lines[] = 'Please let me know the availability.';
        $lines[] = '';
        $lines[] = 'Thank you.';

        return implode("\n", $lines);
    }
}
