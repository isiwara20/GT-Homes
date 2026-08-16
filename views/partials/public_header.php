<?php
/**
 * GT HOMES — Public Header Partial
 * File: views/partials/public_header.php
 *
 * Variables available (set by calling view):
 *   $pageTitle       (string) — HTML <title> content
 *   $metaDescription (string) — meta description
 *   $bodyClass       (string, optional) — extra class(es) on <body>
 */
$pageTitle       = $pageTitle       ?? APP_NAME;
$metaDescription = $metaDescription ?? 'GT HOMES Holiday Resort — Your Perfect Escape.';
$bodyClass       = $bodyClass       ?? '';

set_security_headers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- Primary Meta -->
  <title><?= e($pageTitle) ?></title>
  <meta name="description" content="<?= e($metaDescription) ?>">
  <meta name="robots" content="index, follow">

  <!-- Open Graph -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($metaDescription) ?>">
  <meta property="og:site_name"   content="<?= e(APP_NAME) ?>">

  <!-- Favicons (place files in assets/images/branding/) -->
  <link rel="icon" type="image/png" href="<?= asset('images/branding/favicon.png') ?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome 6.4.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= asset('css/variables.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/components.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/public.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/responsive.css') ?>">
</head>
<body class="<?= e($bodyClass) ?>">

<!-- Public Navigation
     NOTE: Admin login is intentionally NOT linked here. -->
<nav id="public-nav" class="public-nav public-nav--transparent" role="navigation" aria-label="Main navigation">
  <div class="public-nav__inner">

    <!-- Logo -->
    <a href="<?= url() ?>" class="public-nav__logo" aria-label="GT HOMES Holiday Resort — Home">
      <!-- Place your official logo file at: assets/images/branding/logo.png -->
      <!-- The logo has a yellow background — preserve it. Do NOT make it transparent. -->
      <img src="<?= asset('images/branding/logo.png') ?>"
           alt="GT HOMES Holiday Resort Logo"
           class="public-nav__logo-img"
           onerror="this.style.display='none'">
      <div class="public-nav__logo-text">
        <span class="public-nav__logo-name">GT HOMES</span>
        <span class="public-nav__logo-tagline">Holiday Resort</span>
      </div>
    </a>

    <!-- Desktop Navigation Links
         IMPORTANT: Admin login is NOT included here. -->
    <ul class="public-nav__links" role="list">
      <li><a href="<?= url() ?>"           class="public-nav__link <?= is_active('') && current_path() === '/GT-Homes/' ? 'public-nav__link--active' : '' ?>">Home</a></li>
      <li><a href="<?= url('rooms') ?>"        class="public-nav__link <?= is_active('rooms') ? 'public-nav__link--active' : '' ?>">Rooms</a></li>
      <li><a href="<?= url('dining') ?>"       class="public-nav__link <?= is_active('dining') ? 'public-nav__link--active' : '' ?>">Dining</a></li>
      <li><a href="<?= url('experiences') ?>"  class="public-nav__link <?= is_active('experiences') ? 'public-nav__link--active' : '' ?>">Experiences</a></li>
      <li><a href="<?= url('gallery') ?>"      class="public-nav__link <?= is_active('gallery') ? 'public-nav__link--active' : '' ?>">Gallery</a></li>
      <li><a href="<?= url('about') ?>"        class="public-nav__link <?= is_active('about') ? 'public-nav__link--active' : '' ?>">About</a></li>
      <li><a href="<?= url('contact') ?>"      class="public-nav__link <?= is_active('contact') ? 'public-nav__link--active' : '' ?>">Contact</a></li>
    </ul>

    <!-- CTA -->
    <div class="public-nav__cta">
      <a href="<?= url('booking') ?>" class="btn btn--primary" id="nav-book-btn">
        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
        Book Your Stay
      </a>
    </div>

    <!-- Mobile Hamburger -->
    <button class="public-nav__hamburger"
            id="nav-hamburger"
            aria-label="Open navigation menu"
            aria-expanded="false"
            aria-controls="nav-mobile-menu">
      <span></span>
      <span></span>
      <span></span>
    </button>

  </div><!-- /.public-nav__inner -->
</nav>

<!-- Mobile Menu -->
<div id="nav-mobile-menu" class="public-nav__mobile" role="dialog" aria-label="Mobile navigation">
  <a href="<?= url() ?>"           class="public-nav__link">Home</a>
  <a href="<?= url('rooms') ?>"        class="public-nav__link">Rooms</a>
  <a href="<?= url('dining') ?>"       class="public-nav__link">Dining</a>
  <a href="<?= url('experiences') ?>"  class="public-nav__link">Experiences</a>
  <a href="<?= url('gallery') ?>"      class="public-nav__link">Gallery</a>
  <a href="<?= url('about') ?>"        class="public-nav__link">About</a>
  <a href="<?= url('contact') ?>"      class="public-nav__link">Contact</a>
  <hr style="margin-block: 0.5rem;">
  <a href="<?= url('booking') ?>" class="btn btn--primary" style="width: 100%; justify-content: center;">
    <i class="fa-solid fa-calendar-check"></i> Book Your Stay
  </a>
  <!-- NOTE: No Admin Login link appears here or anywhere on the public site. -->
</div>

<div class="page-content">
