<?php

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

$controller = new BookingController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $controller->submit();
} else {
    $data = $controller->index();
}

extract($data, EXTR_SKIP);
require __DIR__ . '/views/public/booking.php';
