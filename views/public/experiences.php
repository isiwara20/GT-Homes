<?php partial('partials/public_header', ['pageTitle' => 'Experiences — ' . APP_NAME, 'metaDescription' => 'Explore pool, cinema, and activities at GT HOMES.']); ?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Resort</p>
      <h1 class="section-title">Experiences</h1>
      <div class="divider--lovi"></div>
      <p style="color:var(--color-muted);">
        Swimming pool, mini cinema, activities and more await you.
        Full details coming soon.
      </p>
      <div style="margin-top:2rem;">
        <a href="<?= url('booking') ?>" class="btn btn--primary"><i class="fa-solid fa-calendar-check"></i> Book Your Stay</a>
      </div>
    </div>
  </section>
</main>
<?php partial('partials/public_footer'); ?>
