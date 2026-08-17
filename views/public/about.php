<?php
/**
 * GT HOMES Holiday Resort — About Us View
 * File: views/public/about.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $aboutData       (array<string, mixed>)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'About Us | GT HOMES Holiday Resort',
    'metaDescription' => $metaDescription ?? 'Discover GT HOMES Holiday Resort (Pvt) Ltd — our story, values, hospitality philosophy, and resort experiences.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER — ABOUT US
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= asset('images/home/welcome.jpg') ?>"
         alt="GT HOMES Resort Grounds &amp; Ambiance"
         class="page-header__bg-img"
         loading="eager">
    <div class="page-header__overlay"></div>

    <div class="container page-header__container">
      <span class="eyebrow eyebrow--light">ABOUT GT HOMES</span>
      <h1 class="page-header__title page-header__title--light">Where Hospitality Meets Comfort</h1>
      <p class="page-header__desc page-header__desc--light">
        Discover the story, values, and resort philosophy behind GT HOMES Holiday Resort (Pvt) Ltd.
      </p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 01 — OUR STORY
  ════════════════════════════════════════════════════════════ -->
  <section class="section about-story-section" aria-label="Our Story">
    <div class="container">
      <div class="about-story-grid">
        <div class="about-story-content">
          <span class="eyebrow">OUR STORY</span>
          <h2 class="section-title">A Sanctuary Built for Unwinding &amp; Connecting</h2>
          <p class="section-subtitle section-subtitle--left">
            GT HOMES Holiday Resort (Pvt) Ltd was created with a singular vision: to offer a serene sanctuary where families, couples, and friends can escape the rush of daily life and immerse themselves in comfort, relaxation, and authentic Sri Lankan warmth.
          </p>
          <p style="color: var(--muted); font-size: 0.95rem; line-height: 1.7; margin-bottom: 2rem;">
            Nestled in a peaceful setting, our resort thoughtfully blends modern boutique accommodations with genuine hospitality. Whether you are seeking a quiet couple getaway in our Orchid Suite, a fun-filled family staycation in Dahiliya, or private entertainment in our mini cinema, we ensure every detail of your stay feels welcoming and effortless.
          </p>

          <div class="about-story-features">
            <div class="about-story-feat-item">
              <i class="fa-solid fa-hotel"></i>
              <div>
                <strong>Boutique Accommodations</strong>
                <p>5 unique rooms crafted for privacy and restful sleep.</p>
              </div>
            </div>
            <div class="about-story-feat-item">
              <i class="fa-solid fa-water-ladder"></i>
              <div>
                <strong>Resort Facilities</strong>
                <p>Private swimming pool, mini cinema, and Sri Lankan dining.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="about-story-media">
          <div class="about-story-img-wrapper">
            <img src="<?= asset('images/home/welcome.jpg') ?>" alt="GT HOMES Holiday Resort Grounds" class="about-story-img" loading="lazy">
            <div class="about-story-badge">
              <span class="about-story-badge-title">GT HOMES</span>
              <span class="about-story-badge-sub">Holiday Resort (Pvt) Ltd</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 02 — RESORT STATS COUNTER BAR
  ════════════════════════════════════════════════════════════ -->
  <section class="about-stats-bar" aria-label="Resort Highlights">
    <div class="container">
      <div class="about-stats-grid">
        <?php foreach ($aboutData['stats'] ?? [] as $stat): ?>
          <div class="about-stat-item">
            <span class="about-stat-number"><?= e($stat['number']) ?></span>
            <span class="about-stat-label"><?= e($stat['label']) ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — OUR CORE VALUES
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface about-values-section" aria-label="Our Core Values">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">OUR VALUES</span>
        <h2 class="section-title">What Makes Your Stay Special</h2>
        <p class="section-subtitle">
          The core principles that guide our hospitality and service every day.
        </p>
      </div>

      <div class="about-values-grid">
        <?php foreach ($aboutData['values'] ?? [] as $val): ?>
          <div class="about-value-card">
            <div class="about-value-card__icon">
              <i class="<?= e($val['icon']) ?>"></i>
            </div>
            <h3 class="about-value-card__title"><?= e($val['title']) ?></h3>
            <p class="about-value-card__desc"><?= e($val['desc']) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 04 — HOSPITALITY PROMISE (DEEP LOVI SECTION)
  ════════════════════════════════════════════════════════════ -->
  <section class="special-moments-section" aria-label="Our Hospitality Promise">
    <div class="container">
      <div class="special-moments-box">
        <div class="hero__badge" style="margin-inline:auto;">
          <i class="fa-solid fa-heart" aria-hidden="true"></i> OUR PROMISE
        </div>
        <h2 class="special-moments-box__title">Personalized Care for Every Guest</h2>
        <p class="special-moments-box__text">
          At GT HOMES, we believe that true hospitality lies in thoughtfulness. From tailored Sri Lankan dining requests and private movie screening setups to personal assistance throughout your stay, we ensure your holiday is completely stress-free.
        </p>

        <div class="special-moments-box__actions">
          <a href="<?= url('booking') ?>" class="btn btn--primary btn--xl">
            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Book Your Stay
          </a>
          <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to inquire about staying at your resort.') ?>"
             target="_blank"
             rel="noopener noreferrer"
             class="btn btn--whatsapp btn--xl">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> Chat on WhatsApp
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 05 — CROSS SELL CARDS
  ════════════════════════════════════════════════════════════ -->
  <section class="section cross-sell-section" aria-label="Explore GT HOMES">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">DISCOVER GT HOMES</span>
        <h2 class="section-title">Explore Our Offerings</h2>
      </div>

      <div class="cross-sell-grid">

        <div class="cross-sell-card">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="GT HOMES Rooms" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Rooms &amp; Suites</h3>
            <p>Discover our 5 distinctive rooms tailored for rest and privacy.</p>
            <a href="<?= url('rooms') ?>" class="btn btn--secondary btn--sm">
              Explore Rooms <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/dining.jpg') ?>" alt="GT HOMES Dining" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Dining &amp; Menu</h3>
            <p>Enjoy comforting Sri Lankan dishes, breakfast, and beverages.</p>
            <a href="<?= url('dining') ?>" class="btn btn--secondary btn--sm">
              Explore Dining <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="GT HOMES Experiences" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Resort Experiences</h3>
            <p>Unwind by the swimming pool, enjoy our mini cinema, and relax.</p>
            <a href="<?= url('experiences') ?>" class="btn btn--secondary btn--sm">
              Discover Experiences <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 06 — FINAL CINEMATIC CTA
  ════════════════════════════════════════════════════════════ -->
  <section class="final-cta-section" aria-label="Final About Call to Action">
    <div class="container">
      <div class="final-cta__content">
        <h2 class="final-cta__title">Your GT HOMES Getaway Awaits</h2>
        <p class="final-cta__text">
          Experience authentic Sri Lankan warmth, comfortable rooms, poolside relaxation, and memorable moments.
        </p>
        <div class="final-cta__actions">
          <a href="<?= url('booking') ?>" class="btn btn--primary btn--xl">
            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Book Your Stay
          </a>
          <a href="<?= url('contact') ?>" class="btn btn--glass btn--xl">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i> Contact Us
          </a>
        </div>
      </div>
    </div>
  </section>

</main>

<?php partial('partials/public_footer'); ?>
