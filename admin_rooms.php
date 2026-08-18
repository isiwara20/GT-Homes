<?php
/**
 * GT HOMES Holiday Resort — Admin Rooms Management
 * File: admin_rooms.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$roomBll = new RoomBLL();

// Handle POST Requests (Add / Edit / Delete Room & Upload Photos)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // ──────────────────────────────────────────
    // 1. ADD NEW ROOM CARD WITH PHOTO UPLOADS
    // ──────────────────────────────────────────
    if ($action === 'add_room') {
        $name    = sanitize($_POST['name'] ?? '');
        $number  = sanitize($_POST['number'] ?? 'ROOM');
        $slug    = slugify($name);
        if (empty($slug)) $slug = 'room-' . time();

        $tagline     = sanitize($_POST['tagline'] ?? '');
        $description = sanitize($_POST['description'] ?? '');
        $capacity    = sanitize($_POST['capacity'] ?? '2 Guests');
        $bedType     = sanitize($_POST['bed_type'] ?? 'King Size Bed');
        $view        = sanitize($_POST['view'] ?? 'Resort View');
        $price       = !empty($_POST['price_per_night']) ? (float)$_POST['price_per_night'] : null;
        $features    = array_filter(array_map('trim', explode(',', $_POST['features_str'] ?? '')));

        // Ensure room target folder exists
        $uploadDir = __DIR__ . "/assets/images/rooms/{$slug}";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $mainImagePath = 'images/home/welcome.jpg'; // default fallback
        $galleryPaths  = [];

        // Main cover image upload
        if (!empty($_FILES['room_image']['name']) && $_FILES['room_image']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['room_image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $targetFile = "{$uploadDir}/main.jpg";
                move_uploaded_file($_FILES['room_image']['tmp_name'], $targetFile);
                $mainImagePath = "images/rooms/{$slug}/main.jpg";
                $galleryPaths[] = $mainImagePath;
            }
        }

        // Additional gallery photos upload
        if (!empty($_FILES['gallery_photos']['name'][0])) {
            $count = count($_FILES['gallery_photos']['name']);
            for ($i = 0; $i < $count; $i++) {
                if ($_FILES['gallery_photos']['error'][$i] === UPLOAD_ERR_OK) {
                    $ext = strtolower(pathinfo($_FILES['gallery_photos']['name'][$i], PATHINFO_EXTENSION));
                    if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                        $idx = count($galleryPaths) + 1;
                        $gTarget = "{$uploadDir}/photo_{$idx}.jpg";
                        move_uploaded_file($_FILES['gallery_photos']['tmp_name'][$i], $gTarget);
                        $galleryPaths[] = "images/rooms/{$slug}/photo_{$idx}.jpg";
                    }
                }
            }
        }

        if (empty($galleryPaths)) {
            $galleryPaths[] = $mainImagePath;
        }

        $roomData = [
            'id'              => time(),
            'name'            => $name,
            'number'          => $number,
            'slug'            => $slug,
            'tagline'         => $tagline,
            'description'     => $description,
            'capacity'        => $capacity,
            'bed_type'        => $bedType,
            'view'            => $view,
            'price_per_night' => $price,
            'features'        => $features,
            'image'           => $mainImagePath,
            'gallery'         => $galleryPaths,
        ];

        $roomBll->addRoom($roomData);
        set_flash('success', "New room '{$name}' created successfully with photo assets.");
        redirect(url('admin/rooms'));
    }

    // ──────────────────────────────────────────
    // 2. EDIT EXISTING ROOM CARD & PHOTO UPLOADS
    // ──────────────────────────────────────────
    if ($action === 'save_room') {
        $slug = sanitize($_POST['slug'] ?? '');
        if (!empty($slug)) {
            $existingRoom = $roomBll->getRoomBySlug($slug);
            $galleryPaths = $existingRoom['gallery'] ?? [];

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

            $uploadDir = __DIR__ . "/assets/images/rooms/{$slug}";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Main cover photo re-upload
            if (!empty($_FILES['room_image']['name']) && $_FILES['room_image']['error'] === UPLOAD_ERR_OK) {
                $ext = strtolower(pathinfo($_FILES['room_image']['name'], PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                    $targetFile = "{$uploadDir}/main.jpg";
                    move_uploaded_file($_FILES['room_image']['tmp_name'], $targetFile);
                    $data['image'] = "images/rooms/{$slug}/main.jpg";
                }
            }

            // Additional photo gallery uploads
            if (!empty($_FILES['gallery_photos']['name'][0])) {
                $count = count($_FILES['gallery_photos']['name']);
                for ($i = 0; $i < $count; $i++) {
                    if ($_FILES['gallery_photos']['error'][$i] === UPLOAD_ERR_OK) {
                        $ext = strtolower(pathinfo($_FILES['gallery_photos']['name'][$i], PATHINFO_EXTENSION));
                        if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                            $idx = count($galleryPaths) + 1;
                            $gTarget = "{$uploadDir}/photo_{$idx}.jpg";
                            move_uploaded_file($_FILES['gallery_photos']['tmp_name'][$i], $gTarget);
                            $galleryPaths[] = "images/rooms/{$slug}/photo_{$idx}.jpg";
                        }
                    }
                }
                $data['gallery'] = array_values(array_unique($galleryPaths));
            }

            $roomBll->updateRoomData($slug, $data);
            set_flash('success', "Room '{$data['name']}' updated successfully.");
            redirect(url('admin/rooms'));
        }
    }

    // ──────────────────────────────────────────
    // 3. DELETE ROOM CARD
    // ──────────────────────────────────────────
    if ($action === 'delete_room') {
        $slug = sanitize($_POST['slug'] ?? '');
        if (!empty($slug)) {
            $roomBll->deleteRoom($slug);
            set_flash('success', "Room card removed successfully.");
            redirect(url('admin/rooms'));
        }
    }

    // ──────────────────────────────────────────
    // 4. DELETE SPECIFIC ROOM GALLERY PHOTO
    // ──────────────────────────────────────────
    if ($action === 'delete_photo') {
        $slug      = sanitize($_POST['slug'] ?? '');
        $photoPath = sanitize($_POST['photo_path'] ?? '');

        if (!empty($slug) && !empty($photoPath)) {
            $roomBll->deleteRoomPhoto($slug, $photoPath);
            set_flash('success', 'Photo removed from room gallery successfully.');
            redirect(url('admin/rooms'));
        }
    }
}

$rooms      = $roomBll->getActiveRooms();
$pageTitle  = 'Rooms & Suites Management | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'rooms'), EXTR_SKIP);

require __DIR__ . '/views/admin/rooms/index.php';
