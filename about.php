<?php declare(strict_types=1);
require_once __DIR__ . '/config/init.php';
extract(['pageTitle' => 'About Us — ' . APP_NAME, 'metaDescription' => 'About GT HOMES Holiday Resort.'], EXTR_SKIP);
require __DIR__ . '/views/public/about.php';
