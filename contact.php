<?php

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

$controller = new ContactController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $controller->submit();
} else {
    $data = $controller->index();
}

extract($data, EXTR_SKIP);
require __DIR__ . '/views/public/contact.php';
