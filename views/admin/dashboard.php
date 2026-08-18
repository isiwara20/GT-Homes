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
    <div class="grid grid--4" style="margin-bottom:2rem;">
      <div class="admin-stat" id="stat-rooms">
        <div class="admin-stat__value"><?= e((string)($stats['rooms'] ?? 5)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-bed" style="margin-right:4px;"></i>Active Suites &amp; Rooms
        </div>
      </div>
      <div class="admin-stat" id="stat-enquiries" style="border-left:4px solid #f59e0b;">
        <div class="admin-stat__value" style="color:#f59e0b;"><?= e((string)($stats['pending_enquiries'] ?? 0)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-clock" style="margin-right:4px;"></i>Pending Bookings
        </div>
      </div>
      <div class="admin-stat" id="stat-total-enquiries">
        <div class="admin-stat__value"><?= e((string)($stats['enquiries'] ?? 0)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-calendar-check" style="margin-right:4px;"></i>Total Enquiries
        </div>
      </div>
      <div class="admin-stat" id="stat-contacts">
        <div class="admin-stat__value"><?= e((string)($stats['contacts'] ?? 0)) ?></div>
        <div class="admin-stat__label">
          <i class="fa-solid fa-envelope" style="margin-right:4px;"></i>Contact Inbox
        </div>
      </div>
    </div>

    <!-- Management Shortcuts & Recent Enquiries Grid -->
    <div style="display:grid; grid-template-columns: 1fr 340px; gap:1.5rem; margin-bottom:2rem;">
      
      <!-- Recent Booking Enquiries Table -->
      <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); padding:1.5rem;">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:1rem; border-bottom:1px solid rgba(255,255,255,0.08); padding-bottom:0.75rem;">
          <h3 style="color:var(--color-brand-yellow); font-family:var(--font-heading); font-size:1.15rem;">
            <i class="fa-solid fa-clock-rotate-left"></i> Recent Booking Requests
          </h3>
          <a href="<?= url('admin/bookings') ?>" style="color:white; font-size:0.8rem; text-decoration:none; font-weight:600;">
            View All <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

        <?php if (empty($recentEnquiries)): ?>
          <p style="color:rgba(255,255,255,0.5); font-size:0.88rem; padding:1.5rem 0; text-align:center;">No recent booking requests.</p>
        <?php else: ?>
          <div style="overflow-x:auto;">
            <table style="width:100%; border-collapse:collapse; text-align:left; font-size:0.85rem;">
              <thead>
                <tr style="color:rgba(255,255,255,0.5); border-bottom:1px solid rgba(255,255,255,0.06);">
                  <th style="padding:0.6rem 0.4rem;">Guest</th>
                  <th style="padding:0.6rem 0.4rem;">Room</th>
                  <th style="padding:0.6rem 0.4rem;">Check In</th>
                  <th style="padding:0.6rem 0.4rem;">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recentEnquiries as $rEnq): ?>
                  <tr style="border-bottom:1px solid rgba(255,255,255,0.04);">
                    <td style="padding:0.75rem 0.4rem; color:white; font-weight:600;"><?= e($rEnq['full_name']) ?></td>
                    <td style="padding:0.75rem 0.4rem; color:var(--color-brand-yellow);"><?= e($rEnq['room_name'] ?? 'Suite') ?></td>
                    <td style="padding:0.75rem 0.4rem; color:rgba(255,255,255,0.7);"><?= date('d M Y', strtotime($rEnq['check_in_date'])) ?></td>
                    <td style="padding:0.75rem 0.4rem;">
                      <span style="padding:0.2rem 0.5rem; border-radius:var(--radius-full); font-size:0.7rem; font-weight:700; background:rgba(255,255,255,0.08); color:white;">
                        <?= e($rEnq['status']) ?>
                      </span>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>

      <!-- Quick Action Controls -->
      <div style="display:flex; flex-direction:column; gap:1rem;">
        
        <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); padding:1.5rem;">
          <h3 style="color:var(--color-white); font-size:1rem; font-family:var(--font-heading); margin-bottom:1rem; border-bottom:1px solid rgba(255,255,255,0.08); padding-bottom:0.5rem;">
            Control Modules
          </h3>
          
          <div style="display:flex; flex-direction:column; gap:0.65rem;">
            <a href="<?= url('admin/bookings') ?>" class="btn btn--secondary btn--sm" style="text-align:left; justify-content:flex-start;">
              <i class="fa-solid fa-calendar-check" style="width:20px;"></i> Manage Bookings
            </a>
            <a href="<?= url('admin/rooms') ?>" class="btn btn--secondary btn--sm" style="text-align:left; justify-content:flex-start;">
              <i class="fa-solid fa-bed" style="width:20px;"></i> Rooms &amp; Rates
            </a>
            <a href="<?= url('admin/dining') ?>" class="btn btn--secondary btn--sm" style="text-align:left; justify-content:flex-start;">
              <i class="fa-solid fa-utensils" style="width:20px;"></i> Dining &amp; Menu
            </a>
            <a href="<?= url('admin/gallery') ?>" class="btn btn--secondary btn--sm" style="text-align:left; justify-content:flex-start;">
              <i class="fa-solid fa-images" style="width:20px;"></i> Resort Memories
            </a>
            <a href="<?= url('admin/contacts') ?>" class="btn btn--secondary btn--sm" style="text-align:left; justify-content:flex-start;">
              <i class="fa-solid fa-envelope" style="width:20px;"></i> Contact Inbox
            </a>
            <a href="<?= url('admin/settings') ?>" class="btn btn--secondary btn--sm" style="text-align:left; justify-content:flex-start;">
              <i class="fa-solid fa-gear" style="width:20px;"></i> Website Settings
            </a>
          </div>
        </div>

        <div style="background:linear-gradient(135deg, rgba(122,24,56,0.4), rgba(30,15,41,0.8)); border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:1.25rem; text-align:center;">
          <i class="fa-solid fa-globe" style="font-size:1.5rem; color:var(--color-brand-yellow); margin-bottom:0.5rem; display:block;"></i>
          <span style="font-size:0.85rem; color:white; font-weight:600; display:block; margin-bottom:0.75rem;">Public Website Live</span>
          <a href="<?= url() ?>" target="_blank" class="btn btn--primary btn--sm" style="width:100%;">
            Open GT HOMES Website <i class="fa-solid fa-arrow-up-right-from-square"></i>
          </a>
        </div>

      </div>

    </div>

  </main><!-- /.admin-body -->

</div><!-- /.admin-main -->

<?php partial('partials/admin_footer'); ?>
