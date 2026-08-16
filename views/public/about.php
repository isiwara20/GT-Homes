<?php partial('partials/public_header', ['pageTitle' => 'About Us — ' . APP_NAME, 'metaDescription' => 'Learn about GT HOMES Holiday Resort (Pvt) Ltd.']); ?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Our Story</p>
      <h1 class="section-title">About GT HOMES</h1>
      <div class="divider--lovi"></div>
      <p style="color:var(--color-muted); max-width:700px; line-height:1.8;">
        GT HOMES Holiday Resort (Pvt) Ltd is a premium holiday destination dedicated to
        providing an exceptional experience for every guest. Our resort blends modern
        luxury with authentic Sri Lankan warmth and hospitality.
      </p>
      <div style="margin-top:2rem;">
        <a href="<?= url('contact') ?>" class="btn btn--primary">Get in Touch</a>
        <a href="<?= url('booking') ?>" class="btn btn--secondary" style="margin-left:1rem;">Book Your Stay</a>
      </div>
    </div>
  </section>
</main>
<?php partial('partials/public_footer'); ?>
