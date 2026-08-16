<?php

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

$controller = new HomeController();
$data       = $controller->index();

extract($data, EXTR_SKIP);

require __DIR__ . '/views/public/home.php';
