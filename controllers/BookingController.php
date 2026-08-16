<?php

declare(strict_types=1);

/**
 * GT HOMES — Booking Controller
 *
 * Handles booking enquiry form display and submission.
 * All booking goes through WhatsApp or email — no payment.
 */
class BookingController extends BaseController
{
    private BookingBLL $bookingBll;

    public function __construct()
    {
        $this->bookingBll = new BookingBLL();
    }

    /**
     * Display the booking enquiry page (GET).
     */
    public function index(): array
    {
        return [
            'pageTitle'       => 'Book Your Stay — ' . APP_NAME,
            'metaDescription' => 'Submit a booking enquiry for GT HOMES Holiday Resort.',
            'rooms'           => [],    // populated in later steps
            'packages'        => [],
            'csrfToken'       => CsrfService::generateToken(),
        ];
    }

    /**
     * Handle booking enquiry form submission (POST).
     * Returns array of data (errors or success) for the view.
     */
    public function submit(): array
    {
        if (!$this->isPost()) {
            $this->redirect(url('booking'));
        }

        // Validate CSRF first.
        CsrfService::validateOrFail();

        // Collect and sanitise inputs.
        $data = [
            'full_name'       => sanitise_string($this->postParam('full_name')),
            'email'           => sanitise_email($this->postParam('email')),
            'phone'           => sanitise_string($this->postParam('phone')),
            'check_in_date'   => sanitise_string($this->postParam('check_in_date')),
            'check_out_date'  => sanitise_string($this->postParam('check_out_date')),
            'guests'          => sanitise_int($this->postParam('guests')) ?? 1,
            'room_id'         => sanitise_int($this->postParam('room_id')),
            'package_id'      => sanitise_int($this->postParam('package_id')),
            'special_request' => sanitise_string($this->postParam('special_request')),
            'contact_method'  => sanitise_string($this->postParam('contact_method')),
        ];

        // Delegate to BLL.
        $result = $this->bookingBll->submitEnquiry($data);

        if (!$result['success']) {
            return array_merge($this->index(), [
                'errors'    => $result['errors'],
                'formData'  => $data,
            ]);
        }

        // Generate WhatsApp URL for the "Book via WhatsApp" button.
        $whatsAppUrl = WhatsAppService::buildBookingUrl($data);

        set_flash('Your enquiry has been submitted. Our team will contact you shortly.', 'success');

        return [
            'pageTitle'    => 'Booking Enquiry Submitted — ' . APP_NAME,
            'submitted'    => true,
            'whatsAppUrl'  => $whatsAppUrl,
        ];
    }
}
