<?php

declare(strict_types=1);

/** GT HOMES — Contact Controller */
class ContactController extends BaseController
{
    private ContactBLL $contactBll;

    public function __construct()
    {
        $this->contactBll = new ContactBLL();
    }

    public function index(): array
    {
        return [
            'pageTitle'       => 'Contact Us | ' . APP_NAME,
            'metaDescription' => 'Get in touch with GT HOMES Holiday Resort (Pvt) Ltd for room availability, mini cinema bookings, dining inquiries, and special celebrations.',
            'csrfToken'       => CsrfService::generateToken(),
        ];
    }

    public function submit(): array
    {
        if (!$this->isPost()) {
            $this->redirect(url('contact'));
        }

        CsrfService::validateOrFail();

        $data = [
            'name'    => sanitise_string($this->postParam('name')),
            'email'   => sanitise_email($this->postParam('email')),
            'phone'   => sanitise_string($this->postParam('phone')),
            'subject' => sanitise_string($this->postParam('subject')),
            'message' => sanitise_string($this->postParam('message')),
        ];

        $result = $this->contactBll->submitEnquiry($data);

        if (!$result['success']) {
            return array_merge($this->index(), [
                'errors'   => $result['errors'],
                'formData' => $data,
            ]);
        }

        set_flash('Thank you! Your message has been received. We will respond shortly.', 'success');
        $this->redirect(url('contact'));
    }
}
