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
         class="admin-nav__item <?= str_ends_with($currentPath, '/admin') || str_ends_with($currentPath, '/admin_dashboard.php') ? 'admin-nav__item--active' : '' ?>"
         id="sidebar-dashboard">
        <i class="fa-solid fa-gauge-high" aria-hidden="true"></i>
        Dashboard
      </a>
    </div>

    <!-- Accommodation -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Accommodation</p>
      <a href="<?= url('admin/rooms') ?>" class="admin-nav__item" id="sidebar-rooms">
        <i class="fa-solid fa-bed" aria-hidden="true"></i>
        Rooms
      </a>
      <a href="<?= url('admin/availability') ?>" class="admin-nav__item" id="sidebar-availability">
        <i class="fa-solid fa-calendar-days" aria-hidden="true"></i>
        Availability
      </a>
    </div>

    <!-- Packages -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Packages</p>
      <a href="<?= url('admin/packages') ?>" class="admin-nav__item" id="sidebar-packages">
        <i class="fa-solid fa-box" aria-hidden="true"></i>
        Packages
      </a>
    </div>

    <!-- Dining -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Dining</p>
      <a href="<?= url('admin/dining/categories') ?>" class="admin-nav__item" id="sidebar-dining-cats">
        <i class="fa-solid fa-utensils" aria-hidden="true"></i>
        Categories
      </a>
      <a href="<?= url('admin/dining/items') ?>" class="admin-nav__item" id="sidebar-dining-items">
        <i class="fa-solid fa-burger" aria-hidden="true"></i>
        Menu Items
      </a>
    </div>

    <!-- Experiences -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Experiences</p>
      <a href="<?= url('admin/experiences') ?>" class="admin-nav__item" id="sidebar-experiences">
        <i class="fa-solid fa-star" aria-hidden="true"></i>
        Experiences
      </a>
    </div>

    <!-- Gallery -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Gallery</p>
      <a href="<?= url('admin/gallery/memories') ?>" class="admin-nav__item" id="sidebar-memories">
        <i class="fa-solid fa-images" aria-hidden="true"></i>
        Memories
      </a>
      <a href="<?= url('admin/gallery/special') ?>" class="admin-nav__item" id="sidebar-special">
        <i class="fa-solid fa-heart" aria-hidden="true"></i>
        Special Memories
      </a>
    </div>

    <!-- Enquiries -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">Enquiries</p>
      <a href="<?= url('admin/bookings') ?>" class="admin-nav__item" id="sidebar-bookings">
        <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
        Booking Enquiries
      </a>
      <a href="<?= url('admin/contacts') ?>" class="admin-nav__item" id="sidebar-contacts">
        <i class="fa-solid fa-envelope" aria-hidden="true"></i>
        Contact Enquiries
      </a>
    </div>

    <!-- Settings -->
    <div class="admin-nav__group">
      <p class="admin-nav__group-label">System</p>
      <a href="<?= url('admin/settings') ?>" class="admin-nav__item" id="sidebar-settings">
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
