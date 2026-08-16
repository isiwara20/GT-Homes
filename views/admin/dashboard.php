<?php
/**
 * GT HOMES — Admin Dashboard View
 * File: views/admin/dashboard.php
 *
 * Data expected:
 *   $pageTitle   (string)
 *   $adminName   (string)
 *   $adminEmail  (string)
 *   $stats       (array)
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Dashboard']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<!-- Admin Main Content -->
<div class="admin-main">

  <!-- Topbar -->
  <header class="admin-topbar">
    <button id="admin-sidebar-toggle"
            aria-label="Toggle sidebar"
            style="background:none; border:none; color:rgba(255,255,255,0.6); font-size:1.25rem; cursor:pointer; display:none;">
      <i class="fa-solid fa-bars"></i>
    </button>
    <h1 class="admin-topbar__title">Dashboard</h1>
    <div style="display:flex; align-items:center; gap:1rem;">
      <span style="font-size:var(--text-sm); color:rgba(255,255,255,0.5);">
        <?= date('l, d F Y') ?>
      </span>
    </div>
  </header>

  <!-- Dashboard Body -->
  <main class="admin-body" id="dashboard-main">

    <?= flash() ?>

    <!-- Welcome Banner -->
    <div style="background: linear-gradient(135deg, var(--color-brand-lovi-dark), #1E0F29);
                border-radius: var(--radius-xl);
                padding: 2rem;
                margin-bottom: 2rem;
                border: 1px solid rgba(116,27,56,0.3);">
      <h2 style="font-family:var(--font-heading); font-size:var(--text-2xl); color:var(--color-brand-yellow);">
        Welcome back, <?= e($adminName ?? 'Admin') ?>
      </h2>
      <p style="color:rgba(255,255,255,0.6); margin-top:0.5rem;">
        <?= e(APP_NAME) ?> — Administration Portal
      </p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid--3" style="margin-bottom:2rem;">
      <div class="admin-stat" id="stat-rooms">
        <div class="admin-stat__value"><?= e((string)($stats['rooms'] ?? 0)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-bed" style="margin-right:4px;"></i>Rooms
        </div>
      </div>
      <div class="admin-stat" id="stat-enquiries">
        <div class="admin-stat__value"><?= e((string)($stats['enquiries'] ?? 0)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-calendar-check" style="margin-right:4px;"></i>Booking Enquiries
        </div>
      </div>
      <div class="admin-stat" id="stat-contacts">
        <div class="admin-stat__value"><?= e((string)($stats['contacts'] ?? 0)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-envelope" style="margin-right:4px;"></i>Contact Enquiries
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.2); border-radius:var(--radius-xl); padding:1.5rem;">
      <h3 style="color:var(--color-white); font-size:var(--text-base); margin-bottom:1rem;">Quick Actions</h3>
      <div style="display:flex; gap:1rem; flex-wrap:wrap;">
        <a href="<?= url('admin/rooms') ?>" class="btn btn--primary btn--sm" id="dash-add-room">
          <i class="fa-solid fa-plus"></i> Add Room
        </a>
        <a href="<?= url('admin/bookings') ?>" class="btn btn--secondary btn--sm" id="dash-view-bookings">
          <i class="fa-solid fa-calendar-check"></i> View Enquiries
        </a>
        <a href="<?= url() ?>" target="_blank" class="btn btn--secondary btn--sm" id="dash-view-site">
          <i class="fa-solid fa-globe"></i> View Public Site
        </a>
      </div>
    </div>

  </main><!-- /.admin-body -->

</div><!-- /.admin-main -->

<?php partial('partials/admin_footer'); ?>
