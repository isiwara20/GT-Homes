<?php

declare(strict_types=1);

/** GT HOMES — Contact Business Logic Layer */
class ContactBLL extends BaseBLL
{
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

        // Future: save to contact_enquiries table
        // Future: EmailService::sendContactEnquiry($data);

        return $this->success([], 'Enquiry submitted successfully.');
    }
}
