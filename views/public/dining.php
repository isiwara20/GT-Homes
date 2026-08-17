<?php
/**
 * GT HOMES Holiday Resort — Dining & Special Menu View
 * File: views/public/dining.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $categories      (array<int, array<string, mixed>>)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Dining & Special Menu | GT HOMES Holiday Resort',
    'metaDescription' => $metaDescription ?? 'Explore dining at GT HOMES Holiday Resort, including fresh breakfast, authentic Sri Lankan flavours, refreshing beverages, and special dining options for your stay.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER — DINING & SPECIAL MENU
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= asset('images/experiences/dining.jpg') ?>"
         alt="GT HOMES Dining &amp; Menu"
         class="page-header__bg-img"
         loading="eager">
    <div class="page-header__overlay"></div>

    <div class="container page-header__container">
      <span class="eyebrow eyebrow--light">DINING AT GT HOMES</span>
      <h1 class="page-header__title page-header__title--light">Flavours Made for Your Stay</h1>
      <p class="page-header__desc page-header__desc--light">
        Enjoy comforting favourites, authentic Sri Lankan flavours and specially prepared meals designed to make your GT HOMES experience even more memorable.
      </p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 02 — DINING INTRODUCTION
  ════════════════════════════════════════════════════════════ -->
  <section class="section dining-intro" aria-label="Dining Experience Introduction">
    <div class="container">
      <div class="dining-intro__grid">
        <div class="dining-intro__content">
          <span class="eyebrow">TASTE THE EXPERIENCE</span>
          <h2 class="section-title">Good Food Makes Every Getaway Better</h2>
          <p class="section-subtitle section-subtitle--left">
            Dining at GT HOMES is designed to complement your stay. Whether you're starting the morning with breakfast, enjoying a comforting meal with family or celebrating a special moment, our dining experience brings flavour and warmth to the table.
          </p>

          <div class="dining-intro__benefits">
            <div class="dining-intro__benefit-card">
              <div class="dining-intro__benefit-icon"><i class="fa-solid fa-carrot" aria-hidden="true"></i></div>
              <div>
                <h4>Freshly Prepared</h4>
                <p>Meals prepared with care using quality local ingredients.</p>
              </div>
            </div>
            <div class="dining-intro__benefit-card">
              <div class="dining-intro__benefit-icon"><i class="fa-solid fa-bowl-food" aria-hidden="true"></i></div>
              <div>
                <h4>Comforting Favourites</h4>
                <p>Hearty dishes created to satisfy everyone in your family.</p>
              </div>
            </div>
            <div class="dining-intro__benefit-card">
              <div class="dining-intro__benefit-icon"><i class="fa-solid fa-pepper-hot" aria-hidden="true"></i></div>
              <div>
                <h4>Sri Lankan Flavours</h4>
                <p>Authentic local rice &amp; curries rich in traditional island spices.</p>
              </div>
            </div>
            <div class="dining-intro__benefit-card">
              <div class="dining-intro__benefit-icon"><i class="fa-solid fa-wine-glass" aria-hidden="true"></i></div>
              <div>
                <h4>Made for Memorable Stays</h4>
                <p>Private dining setups and special meal requests for your occasion.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="dining-intro__media">
          <div class="dining-intro__img-wrapper">
            <img src="<?= asset('images/experiences/dining.jpg') ?>"
                 alt="GT HOMES Dining Experience and Table Setup"
                 class="dining-intro__img-main"
                 loading="lazy">
            <div class="dining-intro__badge">
              <span class="dining-intro__badge-title">Resort Dining</span>
              <span class="dining-intro__badge-sub">Fresh &amp; Made to Order</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — FEATURED EDITORIAL DINING STORY
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface dining-feature-section" aria-label="Made to Be Enjoyed Together">
    <div class="container">
      <div class="dining-feature-box">
        <div class="dining-feature-box__content">
          <span class="eyebrow">A TASTE OF GT HOMES</span>
          <h2 class="section-title">Made to Be Enjoyed Together</h2>
          <p class="section-subtitle section-subtitle--left">
            From relaxed family breakfasts to quiet evening dinners and celebration setups, food becomes an essential part of the memories you create during your stay at GT HOMES.
          </p>
          <div style="margin-top: 1.5rem;">
            <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to ask about dining options during my stay.') ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--md">
              <i class="fab fa-whatsapp" aria-hidden="true"></i>
              Ask About Special Dining
            </a>
          </div>
        </div>
        <div class="dining-feature-box__media">
          <img src="<?= asset('images/experiences/dining.jpg') ?>"
               alt="GT HOMES Plated Sri Lankan Feast"
               class="dining-feature-box__img"
               loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 04 — MAIN MENU & CATEGORY FILTERING
  ════════════════════════════════════════════════════════════ -->
  <section class="section menu-section" id="main-menu-section" aria-label="Explore Our Menus">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">OUR MENUS</span>
        <h2 class="section-title">Explore Our Menu</h2>
        <p class="section-subtitle">
          Discover the delicious food and refreshing beverages available during your stay at GT HOMES.
        </p>
      </div>

      <!-- Category Filter Tabs -->
      <div class="menu-category-nav" role="tablist" aria-label="Menu category selection">
        <button class="menu-category-btn menu-category-btn--active" data-menu-filter="all" role="tab" aria-selected="true">
          All Menus
        </button>
        <?php foreach ($categories as $cat): ?>
          <button class="menu-category-btn" data-menu-filter="<?= e($cat['slug']) ?>" role="tab" aria-selected="false">
            <?= e($cat['name']) ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Menu Category Blocks -->
      <div class="menu-blocks-container">
        <?php foreach ($categories as $cat): ?>
          <?php
            $cSlug = e($cat['slug']);
            $cName = e($cat['name']);
            $cTagline = e($cat['tagline'] ?? 'Delicious offerings for your stay');
            $cDesc    = e($cat['description'] ?? '');
            $items    = $cat['items'] ?? [];
          ?>

          <div class="menu-category-block" data-menu-block="<?= $cSlug ?>" id="menu-cat-<?= $cSlug ?>">
            
            <div class="menu-category-block__header">
              <div>
                <span class="menu-category-block__eyebrow"><?= strtoupper($cSlug) ?></span>
                <h3 class="menu-category-block__title"><?= $cName ?></h3>
                <p class="menu-category-block__desc"><?= $cTagline ?></p>
              </div>
            </div>

            <!-- Items Grid -->
            <div class="menu-items-grid">
              <?php foreach ($items as $item): ?>
                <?php
                  $iName = e($item['name']);
                  $iDesc = e($item['description'] ?? '');
                  $iPrice = $item['price'];
                  $dietary = $item['dietary'] ?? [];
                  $isPopular = !empty($item['is_popular']);
                ?>

                <article class="menu-item-card">
                  <div class="menu-item-card__header">
                    <div class="menu-item-card__title-row">
                      <h4 class="menu-item-card__title"><?= $iName ?></h4>
                      <?php if ($isPopular): ?>
                        <span class="menu-item-card__badge"><i class="fa-solid fa-star"></i> Popular</span>
                      <?php endif; ?>
                    </div>
                    <?php if ($iPrice !== null): ?>
                      <div class="menu-item-card__price">LKR <?= number_format((float)$iPrice) ?></div>
                    <?php else: ?>
                      <div class="menu-item-card__rate-notice">Rate on enquiry</div>
                    <?php endif; ?>
                  </div>

                  <p class="menu-item-card__desc"><?= $iDesc ?></p>

                  <?php if (!empty($dietary)): ?>
                    <div class="menu-item-card__tags">
                      <?php foreach ($dietary as $tag): ?>
                        <span class="menu-item-card__tag">
                          <i class="fa-solid fa-leaf"></i> <?= e($tag) ?>
                        </span>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                </article>
              <?php endforeach; ?>
            </div>

          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 05 — SRI LANKAN SPECIALS HIGHLIGHT
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface sri-lankan-specials-section" aria-label="Sri Lankan Authentic Flavours">
    <div class="container">
      <div class="sri-lankan-box">
        <div class="sri-lankan-box__media">
          <img src="<?= asset('images/experiences/dining.jpg') ?>"
               alt="Traditional Sri Lankan Claypot Rice and Curries"
               class="sri-lankan-box__img"
               loading="lazy">
          <div class="sri-lankan-box__badge">
            <i class="fa-solid fa-pepper-hot"></i> Island Spice &amp; Heritage
          </div>
        </div>

        <div class="sri-lankan-box__content">
          <span class="eyebrow">LOCAL FLAVOURS</span>
          <h2 class="section-title">A Taste of Sri Lanka</h2>
          <p class="section-subtitle section-subtitle--left">
            Discover comforting local dishes rich in island heritage. From aromatic claypot fish curry and pol sambol to fresh hoppers and slow-simmered jackfruit, bring authentic Sri Lankan character to your dining table.
          </p>

          <ul class="sri-lankan-highlights" role="list">
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <div>
                <strong>Claypot Rice &amp; Curries</strong>
                <p>Traditional slow-cooked curries using fresh coconut milk and roasted island spices.</p>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <div>
                <strong>Fresh Bowl Hoppers</strong>
                <p>Crispy-edged hoppers made fresh to order served with lunu miris and coconut milk.</p>
              </div>
            </li>
            <li>
              <i class="fa-solid fa-circle-check"></i>
              <div>
                <strong>Griddle Kottu Specials</strong>
                <p>Chopped flatbread tossed on a hot griddle with spices, egg, chicken, or vegetables.</p>
              </div>
            </li>
          </ul>

          <div style="margin-top: 2rem;">
            <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to inquire about traditional Sri Lankan meals for my stay.') ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--primary btn--lg">
              <i class="fab fa-whatsapp" aria-hidden="true"></i> Request Sri Lankan Special Menu
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 06 — SPECIAL MENUS & DINING PACKAGES
  ════════════════════════════════════════════════════════════ -->
  <section class="special-dining-section" id="special-dining-section" aria-label="Special Dining Packages and Celebrations">
    <div class="container">
      <div class="special-dining-box">
        <div class="hero__badge" style="margin-inline:auto;">
          <i class="fa-solid fa-cake-candles" aria-hidden="true"></i> SPECIAL OCCASIONS
        </div>
        <h2 class="special-dining-box__title">Make the Moment a Little More Special</h2>
        <p class="special-dining-box__text">
          Planning a birthday celebration, anniversary dinner, family gathering or a private poolside meal? Speak directly with the GT HOMES team to arrange custom dining setups for your occasion.
        </p>

        <div class="special-dining-tags">
          <div class="special-dining-tag"><i class="fa-solid fa-gift"></i> Birthday Celebrations</div>
          <div class="special-dining-tag"><i class="fa-solid fa-heart"></i> Anniversary Dinners</div>
          <div class="special-dining-tag"><i class="fa-solid fa-users"></i> Family Gatherings</div>
          <div class="special-dining-tag"><i class="fa-solid fa-water-ladder"></i> Poolside Evening Meals</div>
          <div class="special-dining-tag"><i class="fa-solid fa-user-gear"></i> Custom Dietary Requests</div>
        </div>

        <div class="special-dining-box__actions">
          <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to inquire about arranging a special dining setup/celebration for my stay.') ?>"
             target="_blank"
             rel="noopener noreferrer"
             class="btn btn--whatsapp btn--xl">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> Ask About Special Dining
          </a>
          <a href="<?= url('contact') ?>" class="btn btn--glass btn--xl">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i> Contact GT HOMES
          </a>
        </div>

        <div style="margin-top: 1.5rem; font-size: 0.95rem; color: rgba(255,255,255,0.8);">
          <i class="fa-solid fa-phone" aria-hidden="true"></i> Direct Dining Hotline: <strong>0777 872 280</strong>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 07 — SIMPLE DINING ENQUIRY FLOW
  ════════════════════════════════════════════════════════════ -->
  <section class="section dining-process-section" aria-label="Simple Dining Enquiry Process">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">PLAN YOUR DINING</span>
        <h2 class="section-title">Have Something Special in Mind?</h2>
        <p class="section-subtitle">
          We keep our dining arrangements flexible and personal. Simply let us know what you need.
        </p>
      </div>

      <div class="process-steps">

        <div class="process-step">
          <div class="process-step__number">01</div>
          <h3 class="process-step__title">Explore</h3>
          <p class="process-step__desc">Browse our available food categories, Sri Lankan specials, and refreshment options.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">02</div>
          <h3 class="process-step__title">Tell Us What You Need</h3>
          <p class="process-step__desc">Share your preferred meals, guest count, stay dates, or special setup requests via WhatsApp.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">03</div>
          <h3 class="process-step__title">Confirm With GT HOMES</h3>
          <p class="process-step__desc">Our team will communicate directly with you to confirm menu availability, timing, and arrangements.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 08 — RESORT CROSS-SELL
  ════════════════════════════════════════════════════════════ -->
  <section class="section cross-sell-section" aria-label="Complete Your GT HOMES Experience">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">COMPLETE YOUR STAY</span>
        <h2 class="section-title">Complete Your GT HOMES Experience</h2>
        <p class="section-subtitle">Combine your dining experience with comfortable rooms and resort activities.</p>
      </div>

      <div class="cross-sell-grid">

        <div class="cross-sell-card">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="GT HOMES Accommodations" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Rooms &amp; Suites</h3>
            <p>Find your perfect space to stay from our 5 unique rooms.</p>
            <a href="<?= url('rooms') ?>" class="btn btn--secondary btn--sm">
              Explore Rooms <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="GT HOMES Swimming Pool" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Swimming Pool</h3>
            <p>Relax and refresh by the pool during your holiday getaway.</p>
            <a href="<?= url('experiences') ?>#pool" class="btn btn--secondary btn--sm">
              Explore Pool <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/cinema.jpg') ?>" alt="GT HOMES Private Mini Cinema" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Private Mini Cinema</h3>
            <p>Enjoy movie screenings with delicious food and drinks.</p>
            <a href="<?= url('experiences') ?>#cinema" class="btn btn--secondary btn--sm">
              Discover Cinema <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 09 — FINAL CTA
  ════════════════════════════════════════════════════════════ -->
  <section class="final-cta-section" aria-label="Final Booking Call to Action">
    <div class="container">
      <div class="final-cta__content">
        <h2 class="final-cta__title">Stay. Dine. Relax. Make Memories.</h2>
        <p class="final-cta__text">
          From comfortable rooms and poolside moments to special food and private entertainment, your GT HOMES experience is waiting.
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
