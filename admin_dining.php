<?php
/**
 * GT HOMES Holiday Resort — Admin Dining & Menus Management
 * File: admin_dining.php
 */

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

requireAdmin();

$diningBll = new DiningBLL();

// Handle POST actions (add/edit menu item)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

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

        $diningBll->saveMenuItem($catSlug, $itemData);
        set_flash('success', "Menu item '{$itemName}' saved successfully.");
        redirect(url('admin/dining'));
    }
}

$categories = $diningBll->getMenuCategories();
$pageTitle  = 'Dining & Menu Management | GT HOMES Admin';
$adminName  = getAdminName();
$adminEmail = getAdminEmail();

extract(compact('pageTitle', 'adminName', 'adminEmail', 'categories'), EXTR_SKIP);

require __DIR__ . '/views/admin/dining/index.php';
