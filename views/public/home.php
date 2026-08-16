<?php
/**
 * GT HOMES — Homepage View
 * File: views/public/home.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? APP_NAME . ' — ' . APP_TAGLINE,
    'metaDescription' => $metaDescription ?? 'GT HOMES Holiday Resort — Your perfect escape.',
]);
?>

<main id="main-content" role="main">

  <!-- ══════════════════════════════
       HERO SECTION (placeholder)
  ══════════════════════════════ -->
  <section class="hero" aria-label="Welcome to GT HOMES">
    <!-- bg image placeholder — will be replaced with real resort photography -->
    <div class="hero__overlay"></div>
    <div class="hero__content">
      <p class="hero__eyebrow">Welcome to GT HOMES Holiday Resort</p>
      <h1 class="hero__title">Your Perfect Escape Awaits</h1>
      <p class="hero__subtitle">
        Premium rooms, exquisite dining, and unforgettable experiences —
        nestled in the heart of Sri Lanka.
      </p>
      <div class="hero__actions">
        <a href="<?= url('rooms') ?>" class="btn btn--accent btn--xl">
          <i class="fa-solid fa-bed" aria-hidden="true"></i>
          Explore Rooms
        </a>
        <a href="<?= url('booking') ?>" class="btn btn--secondary btn--xl" style="border-color:rgba(255,255,255,0.5); color:#fff;">
          <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
          Book Your Stay
        </a>
      </div>
    </div>
  </section>

  <!-- ══════════════════════════════
       PLACEHOLDER SECTIONS
       (Full implementation in Step 2+)
  ══════════════════════════════ -->
  <section class="section" aria-label="Featured Rooms">
    <div class="container text-center">
      <p class="section-label">Accommodation</p>
      <h2 class="section-title">Our Rooms &amp; Suites</h2>
      <p class="section-subtitle" style="margin-inline:auto;">
        Discover our premium collection of rooms designed for your ultimate comfort.
      </p>
      <div style="margin-top: 2rem;">
        <a href="<?= url('rooms') ?>" class="btn btn--primary btn--lg">View All Rooms</a>
      </div>
    </div>
  </section>

  <section class="section" style="background: var(--color-light-bg);" aria-label="Dining">
    <div class="container text-center">
      <p class="section-label">Culinary</p>
      <h2 class="section-title">Exceptional Dining</h2>
      <p class="section-subtitle" style="margin-inline:auto;">
        Savour authentic Sri Lankan flavours and international cuisine at our resort.
      </p>
      <div style="margin-top: 2rem;">
        <a href="<?= url('dining') ?>" class="btn btn--secondary btn--lg">View Menu</a>
      </div>
    </div>
  </section>

  <section class="section" aria-label="Book via WhatsApp">
    <div class="container text-center">
      <p class="section-label">Reservations</p>
      <h2 class="section-title">Ready to Book?</h2>
      <p class="section-subtitle" style="margin-inline:auto;">
        Contact our team on WhatsApp for instant assistance with your reservation.
      </p>
      <div style="margin-top: 2rem; display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
        <a href="<?= e(WhatsAppService::buildContactUrl()) ?>"
           target="_blank"
           rel="noopener noreferrer"
           class="btn btn--whatsapp btn--lg">
          <i class="fab fa-whatsapp" aria-hidden="true"></i>
          Chat on WhatsApp
        </a>
        <a href="<?= url('booking') ?>" class="btn btn--primary btn--lg">
          <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
          Booking Enquiry
        </a>
      </div>
    </div>
  </section>

</main>

<?php partial('partials/public_footer'); ?>
