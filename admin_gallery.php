<?php
/**
 * GT HOMES Holiday Resort — Admin Gallery & Memories Management
 * File: admin_gallery.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$galleryBll = new GalleryBLL();

// Handle POST actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'save_photo') {
        $photoId    = (int)($_POST['photo_id'] ?? 0);
        $title      = sanitize($_POST['title'] ?? '');
        $catSlug    = sanitize($_POST['category_slug'] ?? 'rooms');
        $description= sanitize($_POST['description'] ?? '');
        $isFeatured = !empty($_POST['is_featured']);

        $galleryBll->updatePhotoItem($photoId, [
            'title'         => $title,
            'category_slug' => $catSlug,
            'description'   => $description,
            'is_featured'   => $isFeatured,
        ]);

        set_flash('success', "Gallery photo '{$title}' updated successfully.");
        redirect(url('admin/gallery'));
    }
}

$galleryData = $galleryBll->getGalleryData();
$categories  = $galleryData['categories'] ?? [];
$images      = $galleryData['images'] ?? [];

$pageTitle  = 'Gallery & Memories Management | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'categories', 'images'), EXTR_SKIP);

require __DIR__ . '/views/admin/gallery/index.php';
