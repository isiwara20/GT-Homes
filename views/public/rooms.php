<?php
/**
 * GT HOMES — Rooms Listing View (placeholder)
 * File: views/public/rooms.php
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Rooms &amp; Suites — ' . APP_NAME,
    'metaDescription' => $metaDescription ?? 'Browse premium rooms at GT HOMES Holiday Resort.',
]);
?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Accommodation</p>
      <h1 class="section-title">Rooms &amp; Suites</h1>
      <div class="divider--lovi"></div>
      <p style="color:var(--color-muted); max-width:600px;">
        Our collection of thoughtfully designed rooms and suites offer the perfect blend of comfort,
        style, and Sri Lankan hospitality. Full room listings will be available here shortly.
      </p>
      <div style="margin-top:2rem;">
        <a href="<?= url('booking') ?>" class="btn btn--primary">
          <i class="fa-solid fa-calendar-check"></i> Book Your Stay
        </a>
      </div>
    </div>
  </section>
</main>
<?php partial('partials/public_footer'); ?>
