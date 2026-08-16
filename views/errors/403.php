<?php
/**
 * GT HOMES — 403 Forbidden Error View
 * File: views/errors/403.php
 */
$pageTitle = '403 Forbidden — ' . APP_NAME;
if (!headers_sent()) {
    http_response_code(403);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="<?= asset('css/variables.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
  <style>
    body { display:flex; align-items:center; justify-content:center; min-height:100vh; background:var(--color-ivory); text-align:center; }
    .error-code { font-size:6rem; font-family:var(--font-heading); color:var(--color-brand-lovi); font-weight:900; line-height:1; }
    .error-msg  { font-size:1.5rem; margin:1rem 0; color:var(--color-charcoal); }
    .error-sub  { color:var(--color-muted); margin-bottom:2rem; }
  </style>
</head>
<body>
  <div>
    <div class="error-code">403</div>
    <h1 class="error-msg">Access Forbidden</h1>
    <p class="error-sub">You do not have permission to access this resource.</p>
    <a href="<?= url() ?>" style="display:inline-block; padding:12px 28px; background:var(--color-brand-lovi); color:#fff; border-radius:8px; text-decoration:none; font-weight:600;">
      Return to Homepage
    </a>
  </div>
</body>
</html>
