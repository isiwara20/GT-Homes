<?php

declare(strict_types=1);

/** GT HOMES — Contact Business Logic Layer */
class ContactBLL extends BaseBLL
{
    public function getInquiriesList(): array
    {
        if (!isset($_SESSION['contact_inquiries_data'])) {
            $_SESSION['contact_inquiries_data'] = [
                [
                    'id' => 1,
                    'name' => 'Saman Jayasinghe',
                    'email' => 'saman.j@example.com',
                    'phone' => '0773456789',
                    'subject' => 'Mini Cinema Private Event Inquiry',
                    'message' => 'Hello GT HOMES team, we would like to book the mini cinema for a private family movie night during our upcoming stay on Saturday. Please send pricing details.',
                    'is_read' => false,
                    'created_at' => '2026-08-18 16:45:00',
                ],
                [
                    'id' => 2,
                    'name' => 'Nirosha Wickramasinghe',
                    'email' => 'nirosha.w@example.com',
                    'phone' => '0719876543',
                    'subject' => 'Birthday Party Special Setup',
                    'message' => 'Hi! Do you offer surprise birthday cake and poolside balloon decoration for 6 people? Please let us know the options.',
                    'is_read' => true,
                    'created_at' => '2026-08-17 10:20:00',
                ],
            ];
        }
        return $_SESSION['contact_inquiries_data'];
    }

    public function toggleReadStatus(int $id): bool
    {
        if (isset($_SESSION['contact_inquiries_data'])) {
            foreach ($_SESSION['contact_inquiries_data'] as &$item) {
                if ($item['id'] === $id) {
                    $item['is_read'] = !$item['is_read'];
                    return true;
                }
            }
        }
        return false;
    }

    public function submitEnquiry(array $data): array
    {
        $errors = validate_form([
            'name' => [
                validate_required($data['name']) && validate_length($data['name'], 2, 100),
                'Name is required (2–100 characters).',
            ],
            'email' => [
                validate_required($data['email']) && validate_email($data['email']),
                'A valid email address is required.',
            ],
            'message' => [
                validate_required($data['message']) && validate_length($data['message'], 5, 2000),
                'Message is required (5–2000 characters).',
            ],
        ]);

        if (!empty($errors)) {
            return $this->failure($errors, 'Please correct the errors below.');
        }

        return $this->success([], 'Enquiry submitted successfully.');
    }
}
