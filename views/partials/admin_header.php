<?php
/**
 * GT HOMES — Admin Header Partial
 * File: views/partials/admin_header.php
 *
 * Variables expected:
 *   $pageTitle  (string)
 */
$pageTitle = $pageTitle ?? 'Admin — ' . APP_NAME;

set_security_headers();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($pageTitle) ?></title>

  <!-- Block indexing of admin pages -->
  <meta name="robots" content="noindex, nofollow">

  <!-- Google Fonts (Admin) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Montserrat:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  <!-- Font Awesome 6.4.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= asset('css/variables.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/reset.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/global.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/components.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/admin.css') ?>">
  <link rel="stylesheet" href="<?= asset('css/responsive.css') ?>">
</head>
<body>
<div class="admin-shell">
