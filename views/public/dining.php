<?php partial('partials/public_header', ['pageTitle' => 'Dining — ' . APP_NAME, 'metaDescription' => 'Dining and menu at GT HOMES Holiday Resort.']); ?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Culinary</p>
      <h1 class="section-title">Dining &amp; Menu</h1>
      <div class="divider--lovi"></div>
      <p style="color:var(--color-muted);">Explore our dining offerings. Full menu details coming soon.</p>
      <div style="margin-top:2rem;">
        <a href="<?= url('booking') ?>" class="btn btn--primary"><i class="fa-solid fa-calendar-check"></i> Book Your Stay</a>
      </div>
    </div>
  </section>
</main>
<?php partial('partials/public_footer'); ?>
