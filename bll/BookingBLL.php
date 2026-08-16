<?php

declare(strict_types=1);

/** GT HOMES — Booking Business Logic Layer */
class BookingBLL extends BaseBLL
{
    private BookingDAL $dal;

    public function __construct()
    {
        $this->dal = new BookingDAL();
    }

    /**
     * Validate and submit a booking enquiry.
     *
     * @param  array<string, mixed> $data  Sanitised input from BookingController
     * @return array{success: bool, errors: array<string, string>, message: string, data: array}
     */
    public function submitEnquiry(array $data): array
    {
        $errors = $this->validateEnquiry($data);

        if (!empty($errors)) {
            return $this->failure($errors, 'Please correct the errors below.');
        }

        // Future: save enquiry to database via DAL
        // $enquiryId = $this->dal->insert($data);

        // Future: send email notification
        // EmailService::sendBookingEnquiry($data);

        return $this->success([], 'Booking enquiry submitted successfully.');
    }

    /**
     * Validate booking enquiry data.
     *
     * @param  array<string, mixed> $data
     * @return array<string, string>  Validation errors (empty = valid)
     */
    private function validateEnquiry(array $data): array
    {
        return validate_form([
            'full_name' => [
                validate_required($data['full_name']) && validate_length($data['full_name'], 2, 100),
                'Full name is required (2–100 characters).',
            ],
            'email' => [
                validate_required($data['email']) && validate_email($data['email']),
                'A valid email address is required.',
            ],
            'phone' => [
                validate_required($data['phone']) && validate_phone($data['phone']),
                'A valid Sri Lankan phone number is required.',
            ],
            'check_in_date' => [
                validate_required($data['check_in_date'])
                    && validate_date($data['check_in_date'])
                    && validate_future_date($data['check_in_date']),
                'Check-in date must be a valid future date.',
            ],
            'check_out_date' => [
                validate_required($data['check_out_date'])
                    && validate_date_range($data['check_in_date'], $data['check_out_date']),
                'Check-out date must be after the check-in date.',
            ],
            'guests' => [
                validate_positive_int($data['guests']),
                'Number of guests must be at least 1.',
            ],
        ]);
    }
}
