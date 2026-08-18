<?php
/**
 * GT HOMES Holiday Resort — Admin Contact Inquiries
 * File: admin_contacts.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$contactBll = new ContactBLL();

// Handle POST actions (mark read/unread)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action    = $_POST['action'] ?? '';
    $inquiryId = (int)($_POST['inquiry_id'] ?? 0);

    if ($action === 'toggle_read' && $inquiryId > 0) {
        $contactBll->toggleReadStatus($inquiryId);
        set_flash('success', "Inquiry #{$inquiryId} status updated.");
        redirect(url('admin/contacts'));
    }
}

$inquiries  = $contactBll->getInquiriesList();
$pageTitle  = 'Contact Inbox | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'inquiries'), EXTR_SKIP);

require __DIR__ . '/views/admin/contacts/index.php';
