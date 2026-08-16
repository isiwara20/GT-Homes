<?php
/**
 * GT HOMES — Room Detail View (placeholder)
 * File: views/public/room_details.php
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Room Details — ' . APP_NAME,
    'metaDescription' => $metaDescription ?? 'View this room at GT HOMES Holiday Resort.',
]);
?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Accommodation</p>
      <h1 class="section-title"><?= e($room['name'] ?? 'Room Details') ?></h1>
      <div class="divider--lovi"></div>
      <p style="color:var(--color-muted);">
        Detailed room information will be available here in the next development step.
      </p>
      <div style="margin-top:2rem; display:flex; gap:1rem; flex-wrap:wrap;">
        <a href="<?= url('rooms') ?>" class="btn btn--secondary">
          <i class="fa-solid fa-arrow-left"></i> Back to Rooms
        </a>
        <a href="<?= url('booking') ?>" class="btn btn--primary">
          <i class="fa-solid fa-calendar-check"></i> Book This Room
        </a>
      </div>
    </div>
  </section>
</main>
<?php partial('partials/public_footer'); ?>
