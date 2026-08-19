<?php
/**
 * GT HOMES — Admin Topbar Partial
 * File: views/partials/admin_topbar.php
 *
 * Expected variables:
 *   $title  (string)  Title of the current admin view
 */
$title = $title ?? 'Admin Dashboard';
?>
<header class="admin-topbar">
  <div style="display: flex; align-items: center; gap: 0.85rem;">
    <button id="admin-sidebar-toggle"
            aria-label="Toggle navigation sidebar"
            type="button"
            class="admin-topbar__hamburger">
      <i class="fa-solid fa-bars"></i>
    </button>
    <h1 class="admin-topbar__title"><?= e($title) ?></h1>
  </div>
  <div style="display: flex; align-items: center; gap: 1rem;">
    <a href="<?= url() ?>" target="_blank" class="admin-topbar__link-btn" title="View Public Website">
      <i class="fa-solid fa-globe"></i> <span class="admin-topbar__link-text">View Site</span>
    </a>
    <span class="admin-topbar__date" style="font-size: var(--text-sm); color: rgba(255,255,255,0.6);">
      <?= date('l, d F Y') ?>
    </span>
  </div>
</header>
