<?php
/**
 * GT HOMES Holiday Resort — Admin Rooms Management
 * File: admin_rooms.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$roomBll = new RoomBLL();

// Handle Room Update via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $slug   = sanitize($_POST['slug'] ?? '');

    if ($action === 'save_room' && !empty($slug)) {
        $data = [
            'name'            => sanitize($_POST['name'] ?? ''),
            'tagline'         => sanitize($_POST['tagline'] ?? ''),
            'description'     => sanitize($_POST['description'] ?? ''),
            'capacity'        => sanitize($_POST['capacity'] ?? ''),
            'bed_type'        => sanitize($_POST['bed_type'] ?? ''),
            'view'            => sanitize($_POST['view'] ?? ''),
            'price_per_night' => !empty($_POST['price_per_night']) ? (float)$_POST['price_per_night'] : null,
            'features'        => array_filter(array_map('trim', explode(',', $_POST['features_str'] ?? ''))),
        ];

        $roomBll->updateRoomData($slug, $data);
        set_flash('success', "Room '{$data['name']}' updated successfully.");
        redirect(url('admin/rooms'));
    }
}

$rooms     = $roomBll->getActiveRooms();
$pageTitle  = 'Rooms & Suites Management | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'rooms'), EXTR_SKIP);

require __DIR__ . '/views/admin/rooms/index.php';
