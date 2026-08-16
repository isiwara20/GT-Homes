<?php

declare(strict_types=1);

require_once __DIR__ . '/config/init.php';

$controller = new AuthController();
$controller->logout();
// logout() always redirects — execution stops here.
