<?php
/**
 * GT HOMES — Admin Sidebar Partial
 * File: views/partials/admin_sidebar.php
 *
 * Variables expected:
 *   $adminName   (string)
 *   $adminEmail  (string)
 */
$adminName  = $adminName  ?? getAdminName();
$adminEmail = $adminEmail ?? getAdminEmail();

$currentPath = current_path();
?>
<aside id="admin-sidebar" class="admin-sidebar" role="navigation" aria-label="Admin navigation">

  <!-- Sidebar Header -->
  <div class="admin-sidebar__header">
    <div class="admin-sidebar__logo">
      <img src="<?= asset('images/branding/Logo.png') ?>"
           alt="GT HOMES Logo"
           class="admin-sidebar__logo-img"
           onerror="this.style.display='none'">
      <span class="admin-sidebar__logo-text">GT HOMES</span>
    </div>
    <p class="admin-sidebar__subtitle">Resort Admin Panel</p>
  </div>

  <!-- Navigation -->
  <nav class="admin-nav" aria-label="Admin menu">

    <!-- Dashboard -->
    <div class="admin-nav__group">
      <a href="<?= url('admin') ?>"
         class="admin-nav__item <?= str_contains($currentPath, 'admin_dashboard') || str_ends_with(rtrim($currentPath, '/'), '/admin') ? 'admin-nav__item--active' : '' ?>"
         id="sidebar-dashboard">
        <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
        Dashboard
      </a>
    </div>

    <!-- Accommodation -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Resort Management</p>
      <a href="<?= url('admin/rooms') ?>" class="admin-nav__item <?= str_contains($currentPath, 'admin_rooms') || str_contains($currentPath, 'admin/rooms') ? 'admin-nav__item--active' : '' ?>" id="sidebar-rooms">
        <i class="fa-solid fa-bed" aria-hidden="true"></i>
        Rooms &amp; Suites
      </a>
      <a href="<?= url('admin/dining') ?>" class="admin-nav__item <?= str_contains($currentPath, 'admin_dining') || str_contains($currentPath, 'admin/dining') ? 'admin-nav__item--active' : '' ?>" id="sidebar-dining">
        <i class="fa-solid fa-utensils" aria-hidden="true"></i>
        Dining &amp; Menus
      </a>
      <a href="<?= url('admin/gallery') ?>" class="admin-nav__item <?= str_contains($currentPath, 'admin_gallery') || str_contains($currentPath, 'admin/gallery') ? 'admin-nav__item--active' : '' ?>" id="sidebar-gallery">
        <i class="fa-solid fa-images" aria-hidden="true"></i>
        Gallery &amp; Memories
      </a>
    </div>

    <!-- Enquiries -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Guest Communications</p>
      <a href="<?= url('admin/bookings') ?>" class="admin-nav__item <?= str_contains($currentPath, 'admin_bookings') || str_contains($currentPath, 'admin/bookings') ? 'admin-nav__item--active' : '' ?>" id="sidebar-bookings">
        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
        Booking Enquiries
      </a>
      <a href="<?= url('admin/contacts') ?>" class="admin-nav__item <?= str_contains($currentPath, 'admin_contacts') || str_contains($currentPath, 'admin/contacts') ? 'admin-nav__item--active' : '' ?>" id="sidebar-contacts">
        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        Contact Inbox
      </a>
    </div>

    <!-- Settings -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">System</p>
      <a href="<?= url('admin/settings') ?>" class="admin-nav__item <?= str_contains($currentPath, 'admin_settings') || str_contains($currentPath, 'admin/settings') ? 'admin-nav__item--active' : '' ?>" id="sidebar-settings">
        <i class="fa-solid fa-gear" aria-hidden="true"></i>
        Website Settings
      </a>
    </div>

  </nav>

  <!-- Sidebar Footer -->
  <div class="admin-sidebar__footer">
    <div class="admin-sidebar__user">
      <img src="https://ui-avatars.com/api/?name=<?= urlencode($adminName) ?>&background=741B38&color=F7DF67&size=64"
           alt="Admin Avatar"
           class="admin-sidebar__avatar">
      <div class="admin-sidebar__user-info">
        <div class="admin-sidebar__user-name"><?= e($adminName) ?></div>
        <div class="admin-sidebar__user-role">Administrator</div>
      </div>
    </div>
    <a href="<?= url('logout') ?>"
       class="admin-nav__item"
       id="sidebar-logout"
       style="border-radius:8px;"
       data-confirm="Are you sure you want to log out?">
      <i class="fa-solid fa-right-from-bracket" aria-hidden="true"></i>
      Logout
    </a>
  </div>

</aside>
