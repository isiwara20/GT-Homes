<?php
/**
 * GT HOMES Holiday Resort — Room Details View
 * File: views/public/room_details.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $room            (array<string, mixed>)
 *   $allRooms        (array<int, array<string, mixed>>)
 */

$rName     = e($room['name'] ?? 'Room Suite');
$rNum      = e($room['number'] ?? 'ROOM');
$rTagline  = e($room['tagline'] ?? 'Comfortable stay at GT HOMES');
$rDesc     = e($room['description'] ?? '');
$rCapacity = e($room['capacity'] ?? '2 Guests');
$rBed      = e($room['bed_type'] ?? 'King Size Bed');
$rView     = e($room['view'] ?? 'Resort View');
$rFeatures = $room['features'] ?? ['Air Conditioning', 'Ensuite Bathroom', 'High-Speed Wi-Fi'];
$rImage    = asset($room['image'] ?? 'images/home/welcome.jpg');
$rGallery  = $room['gallery'] ?? [$room['image'] ?? 'images/home/welcome.jpg'];
$rSlug     = e($room['slug'] ?? 'orchid');

$waMsg     = urlencode("Hello GT HOMES! I am interested in booking {$rName} ({$rNum}). Please let me know availability for my dates.");
$waUrl     = "https://wa.me/94777872280?text={$waMsg}";

partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? "{$rName} Suite | GT HOMES Holiday Resort",
    'metaDescription' => $metaDescription ?? "Explore {$rName} at GT HOMES Holiday Resort. {$rTagline}.",
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER & BREADCRUMB
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= $rImage ?>" alt="GT HOMES <?= $rName ?> Header Photo" class="page-header__bg-img" loading="eager">
    <div class="page-header__overlay"></div>
    <div class="container page-header__container">
      <div style="margin-bottom: 0.5rem;">
        <a href="<?= url('rooms') ?>" style="color: var(--brand-yellow); text-decoration: none; font-size: 0.85rem; font-weight: 600;">
          <i class="fa-solid fa-arrow-left"></i> All Accommodations
        </a>
      </div>
      <span class="eyebrow eyebrow--light"><?= $rNum ?></span>
      <h1 class="page-header__title page-header__title--light"><?= $rName ?></h1>
      <p class="page-header__desc page-header__desc--light"><?= $rTagline ?></p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       ROOM DETAILS MAIN SHOWCASE
  ════════════════════════════════════════════════════════════ -->
  <section class="section room-details-section" aria-label="<?= $rName ?> Room Overview">
    <div class="container">
      
      <div style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 3rem; align-items: start;">
        
        <!-- Main Media & Hero Photo -->
        <div>
          <div style="position: relative; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-xl); border: 1px solid var(--border);">
            <img src="<?= $rImage ?>" alt="GT HOMES <?= $rName ?> Main Suite Photo" id="main-detail-img" style="width: 100%; aspect-ratio: 16/10; object-fit: cover;">
            <div style="position: absolute; top: 1rem; left: 1rem; background: var(--brand-lovi); color: var(--white); padding: 0.4rem 0.85rem; border-radius: var(--radius-full); font-size: 0.8rem; font-weight: 700;">
              <?= $rNum ?>
            </div>
            <div style="position: absolute; top: 1rem; right: 1rem; background: rgba(23,23,23,0.75); backdrop-filter: blur(4px); color: var(--white); padding: 0.4rem 0.85rem; border-radius: var(--radius-full); font-size: 0.8rem; font-weight: 600;">
              <i class="fa-solid fa-mountain-sun"></i> <?= $rView ?>
            </div>
          </div>

          <!-- Real Room Photos Grid -->
          <div style="margin-top: 2rem;">
            <h3 style="font-family: var(--font-heading); font-size: 1.35rem; color: var(--charcoal); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
              <i class="fa-solid fa-camera" style="color: var(--brand-lovi);"></i> Real Room Photos (<?= count($rGallery) ?>)
            </h3>
            
            <div class="detail-gallery-grid">
              <?php foreach ($rGallery as $gIdx => $gPath): ?>
                <div class="detail-gallery-thumb" 
                     data-full-img="<?= asset($gPath) ?>" 
                     data-page="<?= $gIdx + 1 ?>"
                     style="position: relative; aspect-ratio: 4/3; border-radius: var(--radius-md); overflow: hidden; cursor: pointer; border: 2px solid var(--border); transition: all var(--transition-fast);">
                  <img src="<?= asset($gPath) ?>" alt="<?= $rName ?> Photo <?= $gIdx + 1 ?>" style="width: 100%; height: 100%; object-fit: cover;">
                  <div class="thumb-hover-overlay" style="position: absolute; inset: 0; background: rgba(122,24,56,0.6); display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity var(--transition-fast);">
                    <i class="fa-solid fa-magnifying-glass-plus" style="color: white; font-size: 1rem;"></i>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>

        <!-- Room Specs & Booking Card -->
        <div style="background: var(--white); border-radius: var(--radius-xl); padding: 2.5rem; border: 1px solid var(--border); box-shadow: var(--shadow-lg); position: sticky; top: 100px;">
          <span style="font-size: 0.8rem; font-weight: 800; letter-spacing: 0.15em; color: var(--brand-lovi); text-transform: uppercase;">Resort Accommodations</span>
          <h2 style="font-family: var(--font-heading); font-size: 2rem; color: var(--charcoal); margin-block: 0.25rem 0.5rem;"><?= $rName ?></h2>
          <p style="color: var(--muted); font-size: 0.95rem; line-height: 1.6; margin-bottom: 1.5rem;"><?= $rDesc ?></p>

          <!-- Specifications List -->
          <div style="display: flex; flex-direction: column; gap: 1rem; padding-block: 1.25rem; border-block: 1px solid var(--cream); margin-bottom: 1.5rem;">
            <div style="display: flex; align-items: center; gap: 1rem;">
              <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--brand-yellow-light); color: var(--brand-lovi); display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-users"></i></div>
              <div><strong style="display: block; font-size: 0.85rem; color: var(--charcoal);">Capacity</strong><span style="font-size: 0.9rem; color: var(--muted);"><?= $rCapacity ?></span></div>
            </div>

            <div style="display: flex; align-items: center; gap: 1rem;">
              <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--brand-yellow-light); color: var(--brand-lovi); display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-bed"></i></div>
              <div><strong style="display: block; font-size: 0.85rem; color: var(--charcoal);">Bed Type</strong><span style="font-size: 0.9rem; color: var(--muted);"><?= $rBed ?></span></div>
            </div>

            <div style="display: flex; align-items: center; gap: 1rem;">
              <div style="width: 40px; height: 40px; border-radius: 50%; background: var(--brand-yellow-light); color: var(--brand-lovi); display: flex; align-items: center; justify-content: center;"><i class="fa-solid fa-mountain-sun"></i></div>
              <div><strong style="display: block; font-size: 0.85rem; color: var(--charcoal);">View &amp; Atmosphere</strong><span style="font-size: 0.9rem; color: var(--muted);"><?= $rView ?></span></div>
            </div>
          </div>

          <!-- Included Features -->
          <div style="margin-bottom: 2rem;">
            <h4 style="font-size: 0.9rem; font-weight: 700; color: var(--charcoal); margin-bottom: 0.75rem;">Room Amenities Included:</h4>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem;">
              <?php foreach ($rFeatures as $f): ?>
                <span style="font-size: 0.8rem; font-weight: 600; color: var(--charcoal); background: var(--ivory); border: 1px solid var(--border); padding: 0.35rem 0.75rem; border-radius: var(--radius-full); display: flex; align-items: center; gap: 0.4rem;">
                  <i class="fa-solid fa-check" style="color: var(--brand-lovi);"></i> <?= e($f) ?>
                </span>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Actions -->
          <div style="display: flex; flex-direction: column; gap: 0.75rem;">
            <a href="<?= $waUrl ?>" target="_blank" rel="noopener noreferrer" class="btn btn--whatsapp btn--lg" style="width: 100%;">
              <i class="fab fa-whatsapp"></i> Book <?= $rName ?> via WhatsApp
            </a>
            <a href="<?= url('booking?room=' . $rSlug) ?>" class="btn btn--primary btn--lg" style="width: 100%;">
              <i class="fa-solid fa-calendar-check"></i> Check Dates &amp; Reserve
            </a>
          </div>

        </div>

      </div>

    </div>
  </section>

  <!-- Lightbox Modal for Room Photos -->
  <div class="menu-lightbox" id="room-detail-lightbox" role="dialog" aria-modal="true" aria-label="<?= $rName ?> Photo Viewer">
    <div class="menu-lightbox__content">
      <button class="menu-lightbox__close" id="room-lightbox-close" aria-label="Close viewer">&times;</button>
      <button class="menu-lightbox__nav menu-lightbox__prev" id="room-lightbox-prev" aria-label="Previous photo">&lt;</button>
      <button class="menu-lightbox__nav menu-lightbox__next" id="room-lightbox-next" aria-label="Next photo">&gt;</button>
      <img src="" alt="<?= $rName ?> Photo" class="menu-lightbox__img" id="room-lightbox-img">
      <div class="menu-lightbox__caption">
        <span id="room-lightbox-caption"><?= $rName ?> Photo 1</span>
        <span id="room-lightbox-counter">(1 of <?= count($rGallery) ?>)</span>
      </div>
    </div>
  </div>

</main>

<style>
.detail-gallery-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 0.75rem;
}
.detail-gallery-thumb:hover {
  border-color: var(--brand-lovi) !important;
  transform: scale(1.03);
}
.detail-gallery-thumb:hover .thumb-hover-overlay {
  opacity: 1 !important;
}
@media (max-width: 992px) {
  .room-details-section .container > div {
    grid-template-columns: 1fr !important;
    gap: 2rem !important;
  }
}
@media (max-width: 576px) {
  .detail-gallery-grid {
    grid-template-columns: repeat(3, 1fr) !important;
    gap: 0.5rem !important;
  }
  #main-detail-img {
    aspect-ratio: 16/11 !important;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const lightbox = document.getElementById('room-detail-lightbox');
  const lightboxImg = document.getElementById('room-lightbox-img');
  const captionText = document.getElementById('room-lightbox-caption');
  const counterText = document.getElementById('room-lightbox-counter');
  const closeBtn = document.getElementById('room-lightbox-close');
  const prevBtn = document.getElementById('room-lightbox-prev');
  const nextBtn = document.getElementById('room-lightbox-next');
  const thumbs = document.querySelectorAll('.detail-gallery-thumb');

  if (!lightbox || !thumbs.length) return;

  const total = thumbs.length;
  let currentIndex = 0;

  function openLightbox(index) {
    currentIndex = index;
    const thumb = thumbs[currentIndex];
    const fullImg = thumb.getAttribute('data-full-img');
    const pageNum = thumb.getAttribute('data-page');

    lightboxImg.src = fullImg;
    captionText.textContent = '<?= $rName ?> Photo ' + pageNum;
    counterText.textContent = '(' + (currentIndex + 1) + ' of ' + total + ')';

    lightbox.classList.add('is-open');
    document.body.style.overflow = 'hidden';
  }

  function closeLightbox() {
    lightbox.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  function showNext() {
    currentIndex = (currentIndex + 1) % total;
    openLightbox(currentIndex);
  }

  function showPrev() {
    currentIndex = (currentIndex - 1 + total) % total;
    openLightbox(currentIndex);
  }

  thumbs.forEach(function (thumb, idx) {
    thumb.addEventListener('click', function () {
      openLightbox(idx);
    });
  });

  if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
  if (nextBtn) nextBtn.addEventListener('click', showNext);
  if (prevBtn) prevBtn.addEventListener('click', showPrev);

  lightbox.addEventListener('click', function (e) {
    if (e.target === lightbox) closeLightbox();
  });

  document.addEventListener('keydown', function (e) {
    if (!lightbox.classList.contains('is-open')) return;
    if (e.key === 'Escape') closeLightbox();
    if (e.key === 'ArrowRight') showNext();
    if (e.key === 'ArrowLeft') showPrev();
  });
});
</script>

<?php partial('partials/public_footer'); ?>
