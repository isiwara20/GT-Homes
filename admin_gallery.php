<?php
/**
 * GT HOMES Holiday Resort — Admin Gallery & Memories Management
 * File: admin_gallery.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$galleryBll = new GalleryBLL();

$categoryMap = [
    'rooms'        => 'Rooms & Accommodation',
    'dining'       => 'Dining & Flavours',
    'pool'         => 'Swimming Pool',
    'cinema'       => 'Mini Cinema',
    'celebrations' => 'Special Moments',
];

// Handle POST actions (ADD, EDIT, DELETE Gallery & Memories Photos)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // ──────────────────────────────────────────
    // 1. ADD NEW GALLERY / MEMORY PHOTO
    // ──────────────────────────────────────────
    if ($action === 'add_photo') {
        $title       = sanitize($_POST['title'] ?? 'Resort Memory');
        $catSlug     = sanitize($_POST['category_slug'] ?? 'celebrations');
        $description = sanitize($_POST['description'] ?? '');
        $photoSize   = sanitize($_POST['photo_size'] ?? '4/3');
        $isFeatured  = !empty($_POST['is_featured']);
        $catName     = $categoryMap[$catSlug] ?? 'Special Moments';

        $imagePath = 'images/memories/photo_1.jpg'; // default fallback

        if (!empty($_FILES['gallery_file']['name']) && $_FILES['gallery_file']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['gallery_file']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $uploadDir = __DIR__ . "/assets/images/gallery";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $filename = "memory_" . time() . ".jpg";
                $targetFile = "{$uploadDir}/{$filename}";
                if (move_uploaded_file($_FILES['gallery_file']['tmp_name'], $targetFile)) {
                    $imagePath = "images/gallery/{$filename}";
                }
            }
        }

        $photoData = [
            'id'            => time(),
            'category_slug' => $catSlug,
            'category_name' => $catName,
            'title'         => $title,
            'description'   => $description,
            'image'         => $imagePath,
            'photo_size'    => $photoSize,
            'is_featured'   => $isFeatured,
        ];

        $galleryBll->addPhotoItem($photoData);
        set_flash('success', "New gallery photo '{$title}' added successfully.");
        redirect(url('admin/gallery'));
    }

    // ──────────────────────────────────────────
    // 2. EDIT GALLERY / MEMORY PHOTO DETAILS
    // ──────────────────────────────────────────
    if ($action === 'save_photo') {
        $photoId     = (int)($_POST['photo_id'] ?? 0);
        $title       = sanitize($_POST['title'] ?? '');
        $catSlug     = sanitize($_POST['category_slug'] ?? 'rooms');
        $description = sanitize($_POST['description'] ?? '');
        $photoSize   = sanitize($_POST['photo_size'] ?? '4/3');
        $isFeatured  = !empty($_POST['is_featured']);
        $catName     = $categoryMap[$catSlug] ?? 'General';

        $data = [
            'title'         => $title,
            'category_slug' => $catSlug,
            'category_name' => $catName,
            'description'   => $description,
            'photo_size'    => $photoSize,
            'is_featured'   => $isFeatured,
        ];

        if (!empty($_FILES['gallery_file']['name']) && $_FILES['gallery_file']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['gallery_file']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $uploadDir = __DIR__ . "/assets/images/gallery";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $filename = "memory_{$photoId}_" . time() . ".jpg";
                $targetFile = "{$uploadDir}/{$filename}";
                if (move_uploaded_file($_FILES['gallery_file']['tmp_name'], $targetFile)) {
                    $data['image'] = "images/gallery/{$filename}";
                }
            }
        }

        $galleryBll->updatePhotoItem($photoId, $data);
        set_flash('success', "Gallery photo '{$title}' updated successfully.");
        redirect(url('admin/gallery'));
    }

    // ──────────────────────────────────────────
    // 3. DELETE GALLERY / MEMORY PHOTO
    // ──────────────────────────────────────────
    if ($action === 'delete_photo') {
        $photoId = (int)($_POST['photo_id'] ?? 0);
        if ($photoId > 0) {
            $galleryBll->deletePhotoItem($photoId);
            set_flash('success', 'Gallery photo deleted successfully.');
            redirect(url('admin/gallery'));
        }
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
