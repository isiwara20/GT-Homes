<?php

declare(strict_types=1);

/**
 * GT HOMES — Admin Dashboard Controller
 *
 * All methods require admin authentication.
 */
class AdminDashboardController extends BaseController
{
    public function __construct()
    {
        requireAdmin();   // ← protects ALL methods of this controller
    }

    /**
     * Display the admin dashboard.
     */
    public function index(): array
    {
        $roomBll    = new RoomBLL();
        $bookingBll = new BookingBLL();
        $contactBll = new ContactBLL();

        $rooms     = $roomBll->getActiveRooms();
        $enquiries = $bookingBll->getEnquiriesList();
        $contacts  = $contactBll->getInquiriesList();

        $pendingEnquiries = count(array_filter($enquiries, fn($i) => ($i['status'] ?? '') === 'PENDING'));

        return [
            'pageTitle'        => 'Dashboard — ' . APP_NAME . ' Admin',
            'adminName'        => getAdminName(),
            'adminEmail'       => getAdminEmail(),
            'stats'            => [
                'rooms'             => count($rooms),
                'enquiries'         => count($enquiries),
                'pending_enquiries' => $pendingEnquiries,
                'contacts'          => count($contacts),
            ],
            'recentEnquiries'  => array_slice($enquiries, 0, 5),
        ];
    }
}
