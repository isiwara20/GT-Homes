<?php

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

$controller = new AdminDashboardController();
// Constructor calls requireAdmin() — will redirect if not logged in.

$data = $controller->index();
extract($data, EXTR_SKIP);

require __DIR__ . '/views/admin/dashboard.php';
