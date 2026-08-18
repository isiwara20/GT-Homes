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
     * Get list of booking enquiries (DB or session store fallback).
     *
     * @return array<int, array<string, mixed>>
     */
    public function getEnquiriesList(string $statusFilter = 'ALL', string $search = ''): array
    {
        try {
            $dbItems = $this->dal->findAll();
            if (!empty($dbItems)) {
                return $this->filterEnquiries($dbItems, $statusFilter, $search);
            }
        } catch (\Throwable $e) {
            // DB fallback
        }

        if (!isset($_SESSION['booking_enquiries_data'])) {
            $_SESSION['booking_enquiries_data'] = [
                [
                    'id' => 101,
                    'full_name' => 'Kasun Perera',
                    'email' => 'kasun.perera@example.com',
                    'phone' => '0771234567',
                    'check_in_date' => '2026-08-25',
                    'check_out_date' => '2026-08-27',
                    'guests' => 2,
                    'room_name' => 'ORCHID Suite',
                    'special_request' => 'Honeymoon stay setup with flower arrangement.',
                    'status' => 'PENDING',
                    'admin_notes' => 'Awaiting confirmation on balcony preferences.',
                    'created_at' => '2026-08-18 14:30:00',
                ],
                [
                    'id' => 102,
                    'full_name' => 'Dilini Fernando',
                    'email' => 'dilini.f@example.com',
                    'phone' => '0777890123',
                    'check_in_date' => '2026-09-01',
                    'check_out_date' => '2026-09-03',
                    'guests' => 4,
                    'room_name' => 'DAHILIYA Villa',
                    'special_request' => 'Need extra bed for child.',
                    'status' => 'CONTACTED',
                    'admin_notes' => 'Sent rate details via WhatsApp.',
                    'created_at' => '2026-08-17 11:15:00',
                ],
                [
                    'id' => 103,
                    'full_name' => 'Rohan Jayasinghe',
                    'email' => 'rohan.j@example.com',
                    'phone' => '0714567890',
                    'check_in_date' => '2026-08-28',
                    'check_out_date' => '2026-08-30',
                    'guests' => 2,
                    'room_name' => 'LOTUS Poolside',
                    'special_request' => 'Poolside evening BBQ arrangement.',
                    'status' => 'CONFIRMED',
                    'admin_notes' => 'Confirmed stay & deposit received.',
                    'created_at' => '2026-08-16 09:45:00',
                ],
            ];
        }

        return $this->filterEnquiries($_SESSION['booking_enquiries_data'], $statusFilter, $search);
    }

    private function filterEnquiries(array $items, string $statusFilter, string $search): array
    {
        return array_filter($items, function ($item) use ($statusFilter, $search) {
            if ($statusFilter !== 'ALL' && strcasecmp($item['status'] ?? '', $statusFilter) !== 0) {
                return false;
            }
            if ($search !== '') {
                $needle = strtolower($search);
                $haystack = strtolower(($item['full_name'] ?? '') . ' ' . ($item['email'] ?? '') . ' ' . ($item['phone'] ?? '') . ' ' . ($item['room_name'] ?? ''));
                if (!str_contains($haystack, $needle)) {
                    return false;
                }
            }
            return true;
        });
    }

    public function updateStatus(int $id, string $status, ?string $notes = null): bool
    {
        try {
            $this->dal->updateStatus($id, $status, $notes);
        } catch (\Throwable $e) {}

        if (isset($_SESSION['booking_enquiries_data'])) {
            foreach ($_SESSION['booking_enquiries_data'] as &$item) {
                if ($item['id'] === $id) {
                    $item['status'] = $status;
                    if ($notes !== null) {
                        $item['admin_notes'] = $notes;
                    }
                    return true;
                }
            }
        }
        return true;
    }

    public function getEnquiryStats(): array
    {
        $all = $this->getEnquiriesList();
        $pending = count(array_filter($all, fn($i) => ($i['status'] ?? '') === 'PENDING'));
        $confirmed = count(array_filter($all, fn($i) => ($i['status'] ?? '') === 'CONFIRMED'));
        $contacted = count(array_filter($all, fn($i) => ($i['status'] ?? '') === 'CONTACTED'));

        return [
            'total'     => count($all),
            'pending'   => $pending,
            'confirmed' => $confirmed,
            'contacted' => $contacted,
        ];
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
