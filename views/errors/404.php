<?php
if (!headers_sent()) http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found — <?= e(APP_NAME) ?></title>
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="<?= asset('css/variables.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
  <style>
    body { display:flex; align-items:center; justify-content:center; min-height:100vh; background:var(--color-ivory); text-align:center; }
    .error-code { font-size:6rem; font-family:var(--font-heading); color:var(--color-brand-lovi); font-weight:900; line-height:1; }
  </style>
</head>
<body>
  <div>
    <div class="error-code">404</div>
    <h1 style="font-size:1.5rem; margin:1rem 0;">Page Not Found</h1>
    <p style="color:var(--color-muted); margin-bottom:2rem;">The page you are looking for does not exist or has been moved.</p>
    <a href="<?= url() ?>" style="display:inline-block; padding:12px 28px; background:var(--color-brand-lovi); color:#fff; border-radius:8px; text-decoration:none; font-weight:600;">
      Return to Homepage
    </a>
  </div>
</body>
</html>
