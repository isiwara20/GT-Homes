<?php

declare(strict_types=1);

/**
 * GT HOMES — Email Service
 *
 * Foundation for sending HTML emails via PHP's native mail() function.
 * All email configuration (sender, recipients) comes from config/mail.php.
 *
 * Responsibilities:
 *  - Build HTML email headers
 *  - Send booking enquiry notifications
 *  - Send contact enquiry notifications
 *  - Log failures to storage/logs/mail.log
 *
 * Step 1: Base skeleton. Full template rendering is implemented later.
 */
final class EmailService
{
    /**
     * Send a booking enquiry notification email to the admin.
     *
     * @param array<string, mixed> $enquiry  Validated booking enquiry data
     * @return bool  True if mail() accepted the message, false otherwise
     */
    public static function sendBookingEnquiry(array $enquiry): bool
    {
        $subject = 'New Booking Enquiry — ' . APP_NAME;
        $body    = self::buildBookingEnquiryBody($enquiry);

        return self::sendHtml(MAIL_BOOKING_ADDRESS, $subject, $body);
    }

    /**
     * Send a contact enquiry notification email to the admin.
     *
     * @param array<string, mixed> $enquiry  Validated contact form data
     * @return bool
     */
    public static function sendContactEnquiry(array $enquiry): bool
    {
        $subject = 'New Contact Enquiry — ' . APP_NAME;
        $body    = self::buildContactEnquiryBody($enquiry);

        return self::sendHtml(MAIL_ADMIN_ADDRESS, $subject, $body);
    }

    /**
     * Core HTML email sender.
     *
     * @param string $to       Recipient email address
     * @param string $subject  Email subject
     * @param string $htmlBody HTML email body
     * @param string $replyTo  Optional reply-to address
     * @return bool
     */
    public static function sendHtml(
        string $to,
        string $subject,
        string $htmlBody,
        string $replyTo = MAIL_REPLY_TO
    ): bool {
        $headers = self::buildHeaders($replyTo);

        $result = @mail($to, $subject, $htmlBody, $headers);

        if ($result) {
            LoggerService::mail('Email sent successfully', [
                'to'      => $to,
                'subject' => $subject,
            ]);
        } else {
            LoggerService::mailError('mail() failed', [
                'to'      => $to,
                'subject' => $subject,
                'error'   => error_get_last()['message'] ?? 'unknown',
            ]);
        }

        return $result;
    }

    // ─────────────────────────────────────────────
    // Private helpers
    // ─────────────────────────────────────────────

    private static function buildHeaders(string $replyTo): string
    {
        $from = MAIL_FROM_NAME . ' <' . MAIL_FROM_ADDRESS . '>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=' . MAIL_CHARSET . "\r\n";
        $headers .= 'From: ' . $from . "\r\n";
        $headers .= 'Reply-To: ' . $replyTo . "\r\n";
        $headers .= 'X-Mailer: PHP/' . PHP_VERSION . "\r\n";

        return $headers;
    }

    /**
     * Build an HTML body for a booking enquiry.
     * Full template will be developed in a later step.
     */
    private static function buildBookingEnquiryBody(array $enquiry): string
    {
        $name     = e($enquiry['full_name']     ?? '');
        $email    = e($enquiry['email']          ?? '');
        $phone    = e($enquiry['phone']          ?? '');
        $room     = e($enquiry['room']           ?? 'Not specified');
        $package  = e($enquiry['package']        ?? 'Not specified');
        $checkIn  = e($enquiry['check_in_date']  ?? '');
        $checkOut = e($enquiry['check_out_date'] ?? '');
        $guests   = e((string) ($enquiry['guests'] ?? ''));
        $request  = e($enquiry['special_request'] ?? '');

        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head><meta charset="UTF-8"><title>Booking Enquiry</title></head>
        <body style="font-family: Arial, sans-serif; color: #333;">
            <h2 style="color:#741B38;">New Booking Enquiry — GT HOMES Holiday Resort</h2>
            <table>
                <tr><th align="left">Name</th><td>{$name}</td></tr>
                <tr><th align="left">Email</th><td>{$email}</td></tr>
                <tr><th align="left">Phone</th><td>{$phone}</td></tr>
                <tr><th align="left">Room</th><td>{$room}</td></tr>
                <tr><th align="left">Package</th><td>{$package}</td></tr>
                <tr><th align="left">Check-In</th><td>{$checkIn}</td></tr>
                <tr><th align="left">Check-Out</th><td>{$checkOut}</td></tr>
                <tr><th align="left">Guests</th><td>{$guests}</td></tr>
                <tr><th align="left">Special Request</th><td>{$request}</td></tr>
            </table>
        </body>
        </html>
        HTML;
    }

    /**
     * Build an HTML body for a contact enquiry.
     */
    private static function buildContactEnquiryBody(array $enquiry): string
    {
        $name    = e($enquiry['name']    ?? '');
        $email   = e($enquiry['email']   ?? '');
        $phone   = e($enquiry['phone']   ?? '');
        $message = e($enquiry['message'] ?? '');

        return <<<HTML
        <!DOCTYPE html>
        <html lang="en">
        <head><meta charset="UTF-8"><title>Contact Enquiry</title></head>
        <body style="font-family: Arial, sans-serif; color: #333;">
            <h2 style="color:#741B38;">New Contact Enquiry — GT HOMES Holiday Resort</h2>
            <table>
                <tr><th align="left">Name</th><td>{$name}</td></tr>
                <tr><th align="left">Email</th><td>{$email}</td></tr>
                <tr><th align="left">Phone</th><td>{$phone}</td></tr>
                <tr><th align="left">Message</th><td>{$message}</td></tr>
            </table>
        </body>
        </html>
        HTML;
    }
}
