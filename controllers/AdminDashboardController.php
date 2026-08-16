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
        // Future: load summary counts (rooms, bookings, enquiries)
        return [
            'pageTitle'    => 'Dashboard — ' . APP_NAME . ' Admin',
            'adminName'    => getAdminName(),
            'adminEmail'   => getAdminEmail(),
            'stats'        => [
                'rooms'       => 0,
                'enquiries'   => 0,
                'contacts'    => 0,
            ],
        ];
    }
}
