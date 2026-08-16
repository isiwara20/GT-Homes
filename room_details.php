<?php declare(strict_types=1);
require_once __DIR__ . '/config/init.php';
$controller = new RoomController();
$slug = sanitise_string($_GET['slug'] ?? '');
$data = $controller->show($slug);
extract($data, EXTR_SKIP);
require __DIR__ . '/views/public/room_details.php';
