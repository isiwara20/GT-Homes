<?php
/**
 * GT HOMES Holiday Resort — Memories Gallery View
 * File: views/public/gallery.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $categories      (array<int, array<string, mixed>>)
 *   $images          (array<int, array<string, mixed>>)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Memories Gallery | GT HOMES Holiday Resort',
    'metaDescription' => $metaDescription ?? 'Explore the photo gallery of GT HOMES Holiday Resort including rooms, swimming pool, mini cinema, dining, and special moments.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER — MEMORIES GALLERY
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= asset('images/gallery/gallery_1.jpg') ?>"
         alt="GT HOMES Resort Ambiance &amp; Photo Gallery"
         class="page-header__bg-img"
         loading="eager">
    <div class="page-header__overlay"></div>

    <div class="container page-header__container">
      <span class="eyebrow eyebrow--light">GALLERY &amp; MEMORIES</span>
      <h1 class="page-header__title page-header__title--light">Capturing Moments at GT HOMES</h1>
      <p class="page-header__desc page-header__desc--light">
        A visual journey through our 5 distinctive rooms, refreshing pool, private mini cinema, authentic Sri Lankan dining, and special holiday celebrations.
      </p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 01 — GALLERY FILTER TABS
  ════════════════════════════════════════════════════════════ -->
  <section class="section gallery-main-section" aria-label="Resort Photo Gallery">
    <div class="container">

      <div class="gallery-filter-nav" role="tablist" aria-label="Gallery category filter">
        <?php foreach ($categories as $index => $cat): ?>
          <button class="gallery-filter-btn <?= $index === 0 ? 'gallery-filter-btn--active' : '' ?>"
                  data-gallery-filter="<?= e($cat['slug']) ?>"
                  role="tab"
                  aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
            <?= e($cat['name']) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- ════════════════════════════════════════════════════════════
           SECTION 02 — GALLERY PHOTO GRID
      ════════════════════════════════════════════════════════════ -->
      <div class="gallery-masonry-grid" id="gallery-grid">
        <?php foreach ($images as $img): ?>
          <?php
            $catSlug  = e($img['category_slug']);
            $catName  = e($img['category_name']);
            $title    = e($img['title']);
            $desc     = e($img['description']);
            $imgPath  = asset($img['image']);
            $featured = !empty($img['is_featured']);
          ?>
          <div class="gallery-card <?= $featured ? 'gallery-card--featured' : '' ?>" data-gallery-item="<?= $catSlug ?>">
            <div class="gallery-card__img-box">
              <img src="<?= $imgPath ?>" alt="<?= $title ?>" class="gallery-card__img" loading="lazy">
              <div class="gallery-card__overlay">
                <span class="gallery-card__badge"><?= $catName ?></span>
                <h3 class="gallery-card__title"><?= $title ?></h3>
                <p class="gallery-card__desc"><?= $desc ?></p>
                <button type="button"
                        class="gallery-card__zoom-btn"
                        data-lightbox-trigger
                        data-img-src="<?= $imgPath ?>"
                        data-img-title="<?= $title ?>"
                        data-img-desc="<?= $desc ?>"
                        aria-label="View large photo of <?= $title ?>">
                  <i class="fa-solid fa-expand" aria-hidden="true"></i>
                </button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — CELEBRATIONS SPOTLIGHT
  ════════════════════════════════════════════════════════════ -->
  <section class="special-moments-section" aria-label="Plan Your Special Celebration">
    <div class="container">
      <div class="special-moments-box">
        <div class="hero__badge" style="margin-inline:auto;">
          <i class="fa-solid fa-camera-retro" aria-hidden="true"></i> YOUR MEMORIES
        </div>
        <h2 class="special-moments-box__title">Ready to Capture Your Own Memories?</h2>
        <p class="special-moments-box__text">
          Whether you are planning a quiet couple getaway, a fun family holiday, or a special birthday celebration, make GT HOMES your backdrop for unforgettable moments.
        </p>

        <div class="special-moments-box__actions">
          <a href="<?= url('booking') ?>" class="btn btn--primary btn--xl">
            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Book Your Stay
          </a>
          <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to inquire about booking a stay for our upcoming holiday/celebration.') ?>"
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
       SECTION 04 — CROSS SELL CARDS
  ════════════════════════════════════════════════════════════ -->
  <section class="section cross-sell-section" aria-label="Explore GT HOMES">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">EXPLORE RESORT</span>
        <h2 class="section-title">Discover More of GT HOMES</h2>
      </div>

      <div class="cross-sell-grid">

        <div class="cross-sell-card">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="GT HOMES Rooms" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Rooms &amp; Suites</h3>
            <p>Explore our 5 unique rooms designed for comfort and privacy.</p>
            <a href="<?= url('rooms') ?>" class="btn btn--secondary btn--sm">
              Explore Rooms <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/dining.jpg') ?>" alt="GT HOMES Dining" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Dining &amp; Menu</h3>
            <p>Taste fresh Sri Lankan breakfasts, curries, and refreshments.</p>
            <a href="<?= url('dining') ?>" class="btn btn--secondary btn--sm">
              Explore Dining <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="GT HOMES Experiences" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Resort Experiences</h3>
            <p>Enjoy our swimming pool, private mini cinema, and relaxing spaces.</p>
            <a href="<?= url('experiences') ?>" class="btn btn--secondary btn--sm">
              Discover Experiences <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 05 — FINAL CINEMATIC CTA
  ════════════════════════════════════════════════════════════ -->
  <section class="final-cta-section" aria-label="Final Gallery Call to Action">
    <div class="container">
      <div class="final-cta__content">
        <h2 class="final-cta__title">Create Your Own GT HOMES Memories</h2>
        <p class="final-cta__text">
          From peaceful morning poolside moments to evening movie screenings and family meals, your resort experience is waiting.
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

  <!-- ════════════════════════════════════════════════════════════
       VANILLA JS LIGHTBOX MODAL
  ════════════════════════════════════════════════════════════ -->
  <div class="gallery-lightbox" id="gallery-lightbox" aria-hidden="true" role="dialog" aria-label="Photo Preview Modal">
    <div class="gallery-lightbox__backdrop" id="lightbox-backdrop"></div>
    <div class="gallery-lightbox__container">
      <button type="button" class="gallery-lightbox__close" id="lightbox-close" aria-label="Close photo preview">
        <i class="fa-solid fa-xmark"></i>
      </button>
      <img src="" alt="" id="lightbox-img" class="gallery-lightbox__img">
      <div class="gallery-lightbox__info">
        <h3 id="lightbox-title" class="gallery-lightbox__title"></h3>
        <p id="lightbox-desc" class="gallery-lightbox__desc"></p>
      </div>
    </div>
  </div>

</main>

<?php partial('partials/public_footer'); ?>
