<?php
/**
 * GT HOMES Holiday Resort — Admin Booking Enquiries
 * File: admin_bookings.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$bookingBll = new BookingBLL();

// Handle Status Updates or Notes via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action    = $_POST['action'] ?? '';
    $enquiryId = (int)($_POST['enquiry_id'] ?? 0);
    $status    = sanitize($_POST['status'] ?? 'PENDING');
    $notes     = sanitize($_POST['admin_notes'] ?? '');

    if ($action === 'update_status' && $enquiryId > 0) {
        $bookingBll->updateStatus($enquiryId, $status, $notes);
        set_flash('success', "Booking enquiry #{$enquiryId} updated successfully.");
        redirect(url('admin/bookings'));
    }
}

$statusFilter = sanitize($_GET['status'] ?? 'ALL');
$searchQuery  = sanitize($_GET['search'] ?? '');

$enquiries = $bookingBll->getEnquiriesList($statusFilter, $searchQuery);
$stats     = $bookingBll->getEnquiryStats();

$pageTitle  = 'Booking Enquiries | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'enquiries', 'stats', 'statusFilter', 'searchQuery'), EXTR_SKIP);

require __DIR__ . '/views/admin/bookings/index.php';
