<?php
/**
 * GT HOMES Holiday Resort — Admin Website Settings
 * File: admin_settings.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

// Handle POST Settings Save
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $settings = [
        'site_name'       => sanitize($_POST['site_name'] ?? 'GT HOMES Holiday Resort'),
        'site_tagline'    => sanitize($_POST['site_tagline'] ?? 'Your Perfect Escape'),
        'phone'           => sanitize($_POST['phone'] ?? '0777 872 280'),
        'office_phone'    => sanitize($_POST['office_phone'] ?? '0817 872 280'),
        'whatsapp_number' => sanitize($_POST['whatsapp_number'] ?? '94777872280'),
        'email'           => sanitize($_POST['email'] ?? 'gthomes99ck@gmail.com'),
        'address'         => sanitize($_POST['address'] ?? 'No 99/C/3, Pragathi Road, Peradeniya, Sri Lanka'),
        'maps_url'        => sanitize($_POST['maps_url'] ?? MAPS_URL),
        'facebook_url'    => sanitize($_POST['facebook_url'] ?? ''),
        'instagram_url'   => sanitize($_POST['instagram_url'] ?? ''),
    ];

    // Save to session / settings store
    $_SESSION['site_settings_custom'] = $settings;

    set_flash('success', 'Website Settings updated successfully.');
    redirect(url('admin/settings'));
}

$currentSettings = $_SESSION['site_settings_custom'] ?? [
    'site_name'       => 'GT HOMES Holiday Resort',
    'site_tagline'    => 'Your Private Escape for Rest, Comfort & Beautiful Memories',
    'phone'           => '0777 872 280',
    'office_phone'    => '0817 872 280',
    'whatsapp_number' => '94777872280',
    'email'           => 'gthomes99ck@gmail.com',
    'address'         => 'No 99/C/3, Pragathi Road, Peradeniya, Sri Lanka',
    'maps_url'        => MAPS_URL,
    'facebook_url'    => 'https://facebook.com/gthomesresort',
    'instagram_url'   => 'https://instagram.com/gthomesresort',
];

$pageTitle  = 'Website Settings | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'currentSettings'), EXTR_SKIP);

require __DIR__ . '/views/admin/settings/index.php';
