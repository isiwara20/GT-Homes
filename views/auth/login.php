<?php
/**
 * GT HOMES — Admin Login View
 * File: views/auth/login.php
 *
 * This page is not linked from the public website.
 * Admin access: http://localhost/GT-Homes/login
 */

set_security_headers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login — <?= e(APP_NAME) ?></title>
  <meta name="robots" content="noindex, nofollow">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= asset('css/variables.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/components.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/auth.css') ?>">
</head>
<body>

<main class="auth-page" id="main-content">
  <div class="auth-card" role="main">

    <!-- Logo -->
    <div class="auth-card__logo">
      <img src="<?= asset('images/branding/logo.png') ?>"
           alt="GT HOMES Logo"
           onerror="this.style.display='none'">
      <h1 class="auth-card__title">GT HOMES</h1>
      <p class="auth-card__subtitle">Resort Administration Portal</p>
    </div>

    <!-- Flash Message -->
    <?= flash() ?>

    <!-- Login Form -->
    <form method="POST"
          action="<?= url('login/submit') ?>"
          id="admin-login-form"
          novalidate>
      <?= csrf_field() ?>

      <div class="form-group">
        <label for="email" class="form-label">Email Address</label>
        <input type="email"
               id="email"
               name="email"
               class="form-control"
               placeholder="admin@gthomes.lk"
               required
               autocomplete="email"
               autofocus>
      </div>

      <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               id="password"
               name="password"
               class="form-control"
               placeholder="••••••••"
               required
               autocomplete="current-password">
      </div>

      <button type="submit" class="btn btn--primary" id="login-submit-btn">
        <i class="fa-solid fa-right-to-bracket" aria-hidden="true"></i>
        Sign In
      </button>

    </form>

    <p style="text-align:center; font-size:var(--text-xs); color:rgba(255,255,255,0.3); margin-top:2rem;">
      Authorised personnel only. This portal is not publicly accessible.
    </p>

  </div><!-- /.auth-card -->
</main>

</body>
</html>
