<?php partial('partials/public_header', ['pageTitle' => 'Gallery — ' . APP_NAME, 'metaDescription' => 'Browse memories and special moments at GT HOMES Holiday Resort.']); ?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Gallery</p>
      <h1 class="section-title">Memories</h1>
      <div class="divider--lovi"></div>
      <p style="color:var(--color-muted);">Our photo gallery and special memories will be available here. Full gallery coming soon.</p>
      <div style="margin-top:2rem;">
        <a href="<?= url('booking') ?>" class="btn btn--primary"><i class="fa-solid fa-calendar-check"></i> Create Your Memories</a>
      </div>
    </div>
  </section>
</main>
<?php partial('partials/public_footer'); ?>
