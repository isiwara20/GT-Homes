<?php
/**
 * GT HOMES Holiday Resort — Admin Dining & Menus Management
 * File: admin_dining.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$diningBll = new DiningBLL();

// Handle POST actions (add/edit/delete menu item & dish photo uploads)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    // ──────────────────────────────────────────
    // 1. SAVE MENU ITEM & DISH PHOTO UPLOAD
    // ──────────────────────────────────────────
    if ($action === 'save_item') {
        $itemId   = (int)($_POST['item_id'] ?? 0);
        $catSlug  = sanitize($_POST['category_slug'] ?? 'breakfast');
        $itemName = sanitize($_POST['name'] ?? '');
        $itemDesc = sanitize($_POST['description'] ?? '');
        $price    = !empty($_POST['price']) ? (float)$_POST['price'] : null;
        $isPop    = !empty($_POST['is_popular']);

        $itemData = [
            'id'          => $itemId,
            'name'        => $itemName,
            'description' => $itemDesc,
            'price'       => $price,
            'is_popular'  => $isPop,
        ];

        // Process Dish Photo Upload if present
        if (!empty($_FILES['dish_image']['name']) && $_FILES['dish_image']['error'] === UPLOAD_ERR_OK) {
            $ext = strtolower(pathinfo($_FILES['dish_image']['name'], PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp', 'gif'])) {
                $uploadDir = __DIR__ . "/assets/images/dining";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }
                $filename = "{$catSlug}_item_" . time() . ".jpg";
                $targetPath = "{$uploadDir}/{$filename}";
                if (move_uploaded_file($_FILES['dish_image']['tmp_name'], $targetPath)) {
                    $itemData['image'] = "images/dining/{$filename}";
                }
            }
        }

        $diningBll->saveMenuItem($catSlug, $itemData);
        set_flash('success', "Menu item '{$itemName}' saved successfully.");
        redirect(url('admin/dining'));
    }

    // ──────────────────────────────────────────
    // 2. DELETE DISH PHOTO
    // ──────────────────────────────────────────
    if ($action === 'delete_photo') {
        $catSlug = sanitize($_POST['category_slug'] ?? '');
        $itemId  = (int)($_POST['item_id'] ?? 0);
        if (!empty($catSlug) && $itemId > 0) {
            $diningBll->deleteMenuPhoto($catSlug, $itemId);
            set_flash('success', 'Dish photo deleted successfully.');
            redirect(url('admin/dining'));
        }
    }

    // ──────────────────────────────────────────
    // 3. DELETE MENU ITEM
    // ──────────────────────────────────────────
    if ($action === 'delete_item') {
        $catSlug = sanitize($_POST['category_slug'] ?? '');
        $itemId  = (int)($_POST['item_id'] ?? 0);
        if (!empty($catSlug) && $itemId > 0) {
            $diningBll->deleteMenuItem($catSlug, $itemId);
            set_flash('success', 'Menu item removed successfully.');
            redirect(url('admin/dining'));
        }
    }
}

$categories = $diningBll->getMenuCategories();
$pageTitle  = 'Dining & Menu Management | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'categories'), EXTR_SKIP);

require __DIR__ . '/views/admin/dining/index.php';
