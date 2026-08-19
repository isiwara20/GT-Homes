<?php
/**
 * GT HOMES Holiday Resort — Public Header Partial
 * File: views/partials/public_header.php
 *
 * Variables available (set by calling view):
 *   $pageTitle       (string) — HTML <title> content
 *   $metaDescription (string) — meta description
 *   $bodyClass       (string, optional) — extra class(es) on <body>
 */
$pageTitle       = $pageTitle       ?? 'GT HOMES Holiday Resort | Comfortable Stays & Memorable Experiences';
$metaDescription = $metaDescription ?? 'Experience GT HOMES Holiday Resort — comfortable rooms, swimming pool, private mini cinema, special dining and memorable holiday experiences.';
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

  <!-- Open Graph / Social -->
  <meta property="og:type"        content="website">
  <meta property="og:title"       content="<?= e($pageTitle) ?>">
  <meta property="og:description" content="<?= e($metaDescription) ?>">
  <meta property="og:site_name"   content="<?= e(APP_NAME) ?>">
  <meta property="og:image"       content="<?= asset('images/home/hero.jpg') ?>">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="<?= asset('images/branding/Logo.png') ?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Font Awesome 6.4.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= asset('css/variables.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/components.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/public.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/responsive.css') ?>">
</head>
<body class="<?= e($bodyClass) ?>">

<!-- Public Navigation — Admin login intentionally excluded -->
<nav id="public-nav" class="public-nav public-nav--transparent" role="navigation" aria-label="Main navigation">
  <div class="public-nav__inner">

    <!-- Official Logo with preserved Yellow Background -->
    <a href="<?= url() ?>" class="public-nav__logo-wrapper" aria-label="GT HOMES Holiday Resort — Home">
      <img src="<?= asset('images/branding/Logo.png') ?>"
           alt="GT HOMES Holiday Resort Logo"
           class="public-nav__logo-img">
    </a>

    <!-- Desktop Navigation Links -->
    <ul class="public-nav__links" role="list">
      <li><a href="<?= url() ?>"           class="public-nav__link <?= is_active('') ? 'public-nav__link--active' : '' ?>">Home</a></li>
      <li><a href="<?= url('rooms') ?>"        class="public-nav__link <?= is_active('rooms') ? 'public-nav__link--active' : '' ?>">Rooms</a></li>
      <li><a href="<?= url('dining') ?>"       class="public-nav__link <?= is_active('dining') ? 'public-nav__link--active' : '' ?>">Dining</a></li>
      <li><a href="<?= url('experiences') ?>"  class="public-nav__link <?= is_active('experiences') ? 'public-nav__link--active' : '' ?>">Experiences</a></li>
      <li><a href="<?= url('gallery') ?>"      class="public-nav__link <?= is_active('gallery') ? 'public-nav__link--active' : '' ?>">Gallery</a></li>
      <li><a href="<?= url('about') ?>"        class="public-nav__link <?= is_active('about') ? 'public-nav__link--active' : '' ?>">About</a></li>
      <li><a href="<?= url('contact') ?>"      class="public-nav__link <?= is_active('contact') ? 'public-nav__link--active' : '' ?>">Contact</a></li>
    </ul>

    <!-- Primary CTA -->
    <div class="public-nav__cta">
      <a href="<?= url('booking') ?>" class="btn btn--primary" id="nav-book-btn">
        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
        Book Your Stay
      </a>
    </div>

    <!-- Mobile Navigation Actions -->
    <div class="public-nav__mobile-actions">
      <a href="<?= url('booking') ?>" class="btn btn--primary btn--sm public-nav__mobile-cta" id="nav-book-btn-mobile">
        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Book
      </a>
      <button class="public-nav__hamburger"
              id="nav-hamburger"
              aria-label="Open navigation menu"
              aria-expanded="false"
              aria-controls="nav-mobile-drawer">
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>

  </div>
</nav>

<!-- Mobile Navigation Drawer -->
<div id="nav-mobile-drawer" class="public-nav__mobile-drawer" role="dialog" aria-label="Mobile navigation">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <a href="<?= url() ?>" class="public-nav__logo-wrapper">
      <img src="<?= asset('images/branding/Logo.png') ?>" alt="GT HOMES Logo" class="public-nav__logo-img">
    </a>
    <button id="nav-drawer-close" aria-label="Close menu" style="background:none; border:none; font-size:1.5rem; color:var(--charcoal); cursor:pointer;">
      <i class="fa-solid fa-xmark"></i>
    </button>
  </div>
  
  <div style="display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 2rem;">
    <a href="<?= url() ?>"           class="public-nav__link <?= is_active('') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">Home</a>
    <a href="<?= url('rooms') ?>"        class="public-nav__link <?= is_active('rooms') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">Rooms</a>
    <a href="<?= url('dining') ?>"       class="public-nav__link <?= is_active('dining') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">Dining</a>
    <a href="<?= url('experiences') ?>"  class="public-nav__link <?= is_active('experiences') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">Experiences</a>
    <a href="<?= url('gallery') ?>"      class="public-nav__link <?= is_active('gallery') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">Gallery</a>
    <a href="<?= url('about') ?>"        class="public-nav__link <?= is_active('about') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">About</a>
    <a href="<?= url('contact') ?>"      class="public-nav__link <?= is_active('contact') ? 'public-nav__link--active' : '' ?>" style="font-size: 1.1rem;">Contact</a>
  </div>

  <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--border);">
    <a href="<?= url('booking') ?>" class="btn btn--primary" style="width: 100%; justify-content: center; margin-bottom: 0.75rem;">
      <i class="fa-solid fa-calendar-check"></i> Book Your Stay
    </a>
    <a href="tel:+94777872280" class="btn btn--secondary" style="width: 100%; justify-content: center; margin-bottom: 0.5rem;">
      <i class="fa-solid fa-phone"></i> Hotline: 0777 872 280
    </a>
    <a href="tel:+94817872280" class="btn btn--secondary" style="width: 100%; justify-content: center;">
      <i class="fa-solid fa-building"></i> Office: 0817 872 280
    </a>
  </div>
</div>
<div id="nav-mobile-backdrop" class="public-nav__mobile-backdrop"></div>

<div class="page-content">
