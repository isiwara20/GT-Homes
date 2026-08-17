<?php
/**
 * GT HOMES Holiday Resort — Rooms & Accommodation View
 * File: views/public/rooms.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $rooms           (array<int, array<string, mixed>>)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Rooms & Accommodation | GT HOMES Holiday Resort',
    'metaDescription' => $metaDescription ?? 'Explore our 5 distinctive rooms at GT HOMES Holiday Resort — Orchid, Dahiliya, Lotus, Daffodil, and Rose. Find your perfect space for rest, privacy, and comfort in Sri Lanka.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER — ROOMS & ACCOMMODATION
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= asset('images/home/hero.jpg') ?>"
         alt="GT HOMES Rooms &amp; Accommodation"
         class="page-header__bg-img"
         loading="eager">
    <div class="page-header__overlay"></div>

    <div class="container page-header__container">
      <span class="eyebrow eyebrow--light">ROOMS &amp; ACCOMMODATION</span>
      <h1 class="page-header__title page-header__title--light">Find Your Perfect Space to Stay</h1>
      <p class="page-header__desc page-header__desc--light">
        From peaceful couple stays to comfortable family getaways, discover thoughtfully prepared rooms designed for rest, privacy and memorable moments at GT HOMES.
      </p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — FLOATING AVAILABILITY PANEL
  ════════════════════════════════════════════════════════════ -->
  <div class="booking-panel-wrapper" id="rooms-availability-search">
    <div class="container">
      <div class="booking-panel">
        <div class="booking-panel__header">
          <h3><i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i> Check Room Availability</h3>
          <p>Select your preferred dates and room to check availability directly with GT HOMES.</p>
        </div>
        <form id="rooms-booking-form" class="booking-form" action="<?= url('booking') ?>" method="GET">
          <div class="booking-form__group">
            <label for="check_in"><i class="fa-solid fa-calendar-days" aria-hidden="true"></i> Check In</label>
            <input type="date" id="check_in" name="check_in" class="form-control" required>
          </div>

          <div class="booking-form__group">
            <label for="check_out"><i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Check Out</label>
            <input type="date" id="check_out" name="check_out" class="form-control" required>
          </div>

          <div class="booking-form__group">
            <label for="guests"><i class="fa-solid fa-users" aria-hidden="true"></i> Guests</label>
            <select id="guests" name="guests" class="form-control">
              <option value="1">1 Guest</option>
              <option value="2" selected>2 Guests</option>
              <option value="3">3 Guests</option>
              <option value="4">4 Guests</option>
              <option value="5+">5+ Guests (Family)</option>
            </select>
          </div>

          <div class="booking-form__group">
            <label for="room"><i class="fa-solid fa-bed" aria-hidden="true"></i> Preferred Room</label>
            <select id="room" name="room" class="form-control">
              <option value="any" selected>Any Available Room</option>
              <option value="orchid">ORCHID — Couple Escape</option>
              <option value="dahiliya">DAHILIYA — Family Suite</option>
              <option value="lotus">LOTUS — Poolside Room</option>
              <option value="daffodil">DAFFODIL — Cozy Retreat</option>
              <option value="rose">ROSE — Executive Suite</option>
            </select>
          </div>

          <div class="booking-form__submit">
            <button type="submit" class="btn btn--primary btn--lg" style="width: 100%;">
              <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Check Availability
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 04 — ACCOMMODATION INTRODUCTION
  ════════════════════════════════════════════════════════════ -->
  <section class="section rooms-intro" aria-label="Stay Your Way Introduction">
    <div class="container">
      <div class="rooms-intro__grid">
        <div class="rooms-intro__content">
          <span class="eyebrow">STAY YOUR WAY</span>
          <h2 class="section-title">Five Rooms. Five Different Ways to Unwind.</h2>
          <p class="section-subtitle section-subtitle--left">
            Every stay is different. Whether you're planning a quiet couple's escape, a family holiday or a relaxing weekend with friends, GT HOMES offers a room designed to make your time away feel comfortable.
          </p>
          <div class="rooms-intro__benefits">
            <div class="rooms-intro__benefit-card">
              <div class="rooms-intro__benefit-icon"><i class="fa-solid fa-wand-magic-sparkles" aria-hidden="true"></i></div>
              <div>
                <h4>Thoughtfully Prepared</h4>
                <p>Clean, fresh linens and comforting touches ready for your arrival.</p>
              </div>
            </div>
            <div class="rooms-intro__benefit-card">
              <div class="rooms-intro__benefit-icon"><i class="fa-solid fa-bed" aria-hidden="true"></i></div>
              <div>
                <h4>Comfortable Bedding</h4>
                <p>High quality mattresses and quiet surroundings for restful sleep.</p>
              </div>
            </div>
            <div class="rooms-intro__benefit-card">
              <div class="rooms-intro__benefit-icon"><i class="fa-solid fa-tree" aria-hidden="true"></i></div>
              <div>
                <h4>Peaceful Atmosphere</h4>
                <p>A tranquil environment created to help you switch off and relax.</p>
              </div>
            </div>
            <div class="rooms-intro__benefit-card">
              <div class="rooms-intro__benefit-icon"><i class="fa-solid fa-water-ladder" aria-hidden="true"></i></div>
              <div>
                <h4>Resort Facilities Included</h4>
                <p>Poolside access, private mini cinema and special dining experiences.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="rooms-intro__media">
          <div class="rooms-intro__img-wrapper">
            <img src="<?= asset('images/home/welcome.jpg') ?>"
                 alt="GT HOMES Resort Veranda &amp; Serene Atmosphere"
                 class="rooms-intro__img-main"
                 loading="lazy">
            <div class="rooms-intro__badge">
              <span class="rooms-intro__badge-num">5</span>
              <span class="rooms-intro__badge-text">Unique Room Spaces</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 05 — ROOM FILTER / QUICK NAVIGATION
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface room-filter-section" id="main-rooms-collection" aria-label="Room Selection Filter">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">OUR ACCOMMODATION</span>
        <h2 class="section-title">Explore All Rooms</h2>
        <p class="section-subtitle">
          Select a room category below to filter or explore our five distinctive accommodations.
        </p>
      </div>

      <!-- Filter Buttons Nav -->
      <div class="room-filter" role="tablist" aria-label="Filter rooms by option">
        <button class="room-filter__btn room-filter__btn--active" data-filter="all" role="tab" aria-selected="true">
          All Rooms (5)
        </button>
        <button class="room-filter__btn" data-filter="orchid" role="tab" aria-selected="false">
          ORCHID
        </button>
        <button class="room-filter__btn" data-filter="dahiliya" role="tab" aria-selected="false">
          DAHILIYA
        </button>
        <button class="room-filter__btn" data-filter="lotus" role="tab" aria-selected="false">
          LOTUS
        </button>
        <button class="room-filter__btn" data-filter="daffodil" role="tab" aria-selected="false">
          DAFFODIL
        </button>
        <button class="room-filter__btn" data-filter="rose" role="tab" aria-selected="false">
          ROSE
        </button>
      </div>

      <!-- ════════════════════════════════════════════════════════════
           SECTION 06 — MAIN ROOM COLLECTION (EDITORIAL SHOWCASES)
      ════════════════════════════════════════════════════════════ -->
      <div class="rooms-collection" id="rooms-grid">
        <?php foreach ($rooms as $index => $room): ?>
          <?php
            $isEven = ($index % 2 === 1);
            $slug   = e($room['slug']);
            $name   = e($room['name']);
            $num    = e($room['number'] ?? sprintf('ROOM %02d', $index + 1));
            $tagline= e($room['tagline'] ?? 'Comfortable stay at GT HOMES');
            $desc   = e($room['description'] ?? '');
            $capacity = e($room['capacity'] ?? 'To be confirmed');
            $bedType  = e($room['bed_type'] ?? 'To be confirmed');
            $view     = e($room['view'] ?? 'Resort View');
            $image    = asset($room['image']);
            $features = $room['features'] ?? ['Air Conditioning', 'Ensuite Bathroom', 'Wi-Fi'];
            $waMsg    = urlencode("Hello GT HOMES! I am interested in booking room: {$name}. Please check availability for my dates.");
            $waUrl    = "https://wa.me/94777872280?text={$waMsg}";
          ?>

          <article class="room-showcase <?= $isEven ? 'room-showcase--reverse' : '' ?>"
                   data-room-item="<?= $slug ?>"
                   aria-labelledby="room-title-<?= $slug ?>">
            
            <div class="room-showcase__media">
              <div class="room-showcase__img-box">
                <img src="<?= $image ?>"
                     alt="GT HOMES <?= $name ?> Room Photo"
                     class="room-showcase__img"
                     loading="lazy">
                <div class="room-showcase__num-tag"><?= $num ?></div>
                <div class="room-showcase__view-tag"><i class="fa-solid fa-mountain-sun"></i> <?= $view ?></div>
              </div>
            </div>

            <div class="room-showcase__content">
              <div class="room-showcase__header">
                <span class="room-showcase__badge"><?= $num ?></span>
                <h3 class="room-showcase__title" id="room-title-<?= $slug ?>"><?= $name ?></h3>
                <p class="room-showcase__tagline"><?= $tagline ?></p>
              </div>

              <p class="room-showcase__desc"><?= $desc ?></p>

              <!-- Meta Specs Grid -->
              <div class="room-showcase__meta-grid">
                <div class="room-showcase__meta-item">
                  <i class="fa-solid fa-users" aria-hidden="true"></i>
                  <div>
                    <span class="room-showcase__meta-label">Capacity</span>
                    <span class="room-showcase__meta-val"><?= $capacity ?></span>
                  </div>
                </div>

                <div class="room-showcase__meta-item">
                  <i class="fa-solid fa-bed" aria-hidden="true"></i>
                  <div>
                    <span class="room-showcase__meta-label">Bed Type</span>
                    <span class="room-showcase__meta-val"><?= $bedType ?></span>
                  </div>
                </div>

                <div class="room-showcase__meta-item">
                  <i class="fa-solid fa-mountain-sun" aria-hidden="true"></i>
                  <div>
                    <span class="room-showcase__meta-label">Setting</span>
                    <span class="room-showcase__meta-val"><?= $view ?></span>
                  </div>
                </div>
              </div>

              <!-- Feature Badges -->
              <div class="room-showcase__features">
                <?php foreach ($features as $feat): ?>
                  <span class="room-showcase__feat-chip">
                    <i class="fa-solid fa-check" aria-hidden="true"></i> <?= e($feat) ?>
                  </span>
                <?php endforeach; ?>
              </div>

              <!-- Rate Notice Area -->
              <div class="room-showcase__rate-box">
                <?php if (!empty($room['price_per_night'])): ?>
                  <div class="room-showcase__price">
                    <span class="room-showcase__price-amount">LKR <?= number_format((float)$room['price_per_night']) ?></span>
                    <span class="room-showcase__price-unit">/ night</span>
                  </div>
                <?php else: ?>
                  <div class="room-showcase__rate-notice">
                    <i class="fa-solid fa-tags" aria-hidden="true"></i>
                    <span>Rate available on enquiry</span>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Action Buttons -->
              <div class="room-showcase__actions">
                <a href="<?= $waUrl ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn btn--primary btn--md">
                  <i class="fab fa-whatsapp" aria-hidden="true"></i>
                  Book <?= $name ?>
                </a>
                <a href="<?= url('contact?room=' . $slug) ?>"
                   class="btn btn--secondary btn--md">
                  <i class="fa-solid fa-circle-info" aria-hidden="true"></i>
                  Enquire Details
                </a>
              </div>

            </div>
          </article>
        <?php endforeach; ?>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 07 — COMPARE YOUR STAY
  ════════════════════════════════════════════════════════════ -->
  <section class="section room-compare-section" aria-label="Compare Rooms">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">FIND YOUR FIT</span>
        <h2 class="section-title">Not Sure Which Room to Choose?</h2>
        <p class="section-subtitle">
          Every GT HOMES room offers a comfortable place to unwind. Compare key features below or chat directly with our team to pick the ideal space.
        </p>
      </div>

      <div class="compare-table-wrapper">
        <table class="compare-table" role="grid" aria-label="Room comparison table">
          <thead>
            <tr>
              <th scope="col">Room</th>
              <th scope="col">Capacity</th>
              <th scope="col">Bed Type</th>
              <th scope="col">Setting / View</th>
              <th scope="col">Best For</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($rooms as $room): ?>
              <?php
                $slug = e($room['slug']);
                $name = e($room['name']);
                $num  = e($room['number'] ?? '');
                $capacity = e($room['capacity'] ?? '2 Guests');
                $bedType  = e($room['bed_type'] ?? 'Standard Bed');
                $view     = e($room['view'] ?? 'Resort View');
                $tagline  = e($room['tagline'] ?? 'Peaceful stay');
                $waMsg    = urlencode("Hello GT HOMES! I'm comparing rooms and would like to ask about {$name}.");
              ?>
              <tr>
                <td>
                  <div class="compare-table__room-cell">
                    <span class="compare-table__room-num"><?= $num ?></span>
                    <strong><?= $name ?></strong>
                  </div>
                </td>
                <td><i class="fa-solid fa-users" aria-hidden="true"></i> <?= $capacity ?></td>
                <td><i class="fa-solid fa-bed" aria-hidden="true"></i> <?= $bedType ?></td>
                <td><i class="fa-solid fa-mountain-sun" aria-hidden="true"></i> <?= $view ?></td>
                <td><span class="compare-table__tag"><?= $tagline ?></span></td>
                <td>
                  <a href="https://wa.me/94777872280?text=<?= $waMsg ?>"
                     target="_blank"
                     rel="noopener noreferrer"
                     class="btn btn--whatsapp btn--sm">
                    <i class="fab fa-whatsapp"></i> Ask About <?= $name ?>
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <div class="compare-cta-box">
        <div>
          <h4>Need help selecting the best room?</h4>
          <p>Our team is available on WhatsApp to answer questions and recommend the right option for your stay.</p>
        </div>
        <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! Can you help me choose the right room for my stay?') ?>"
           target="_blank"
           rel="noopener noreferrer"
           class="btn btn--whatsapp btn--lg">
          <i class="fab fa-whatsapp" aria-hidden="true"></i>
          Chat With GT HOMES
        </a>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 08 — WHAT YOUR STAY INCLUDES
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface resort-amenities-section" aria-label="Resort Amenities Included">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">RESORT EXPERIENCE</span>
        <h2 class="section-title">Comfort Beyond Your Room</h2>
        <p class="section-subtitle">
          Booking a room at GT HOMES gives you access to a peaceful resort environment designed for relaxation and enjoyment.
        </p>
      </div>

      <div class="amenities-grid">

        <div class="amenity-card">
          <div class="amenity-card__icon">
            <i class="fa-solid fa-water-ladder" aria-hidden="true"></i>
          </div>
          <h3 class="amenity-card__title">Swimming Pool</h3>
          <p class="amenity-card__desc">Relax and refresh during your stay in our clean, serene resort pool.</p>
        </div>

        <div class="amenity-card">
          <div class="amenity-card__icon">
            <i class="fa-solid fa-film" aria-hidden="true"></i>
          </div>
          <h3 class="amenity-card__title">Mini Cinema</h3>
          <p class="amenity-card__desc">Enjoy private entertainment and movie nights with family or friends.</p>
        </div>

        <div class="amenity-card">
          <div class="amenity-card__icon">
            <i class="fa-solid fa-utensils" aria-hidden="true"></i>
          </div>
          <h3 class="amenity-card__title">Special Dining</h3>
          <p class="amenity-card__desc">Add delicious, freshly prepared food experiences to your getaway.</p>
        </div>

        <div class="amenity-card">
          <div class="amenity-card__icon">
            <i class="fa-solid fa-heart" aria-hidden="true"></i>
          </div>
          <h3 class="amenity-card__title">Warm Hospitality</h3>
          <p class="amenity-card__desc">Friendly and attentive Sri Lankan service throughout your stay.</p>
        </div>

        <div class="amenity-card">
          <div class="amenity-card__icon">
            <i class="fa-solid fa-sparkles" aria-hidden="true"></i>
          </div>
          <h3 class="amenity-card__title">Memorable Spaces</h3>
          <p class="amenity-card__desc">Enjoy the quiet verandas, garden spots and relaxing resort vibe.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 09 — SIMPLE BOOKING PROCESS
  ════════════════════════════════════════════════════════════ -->
  <section class="section booking-process-section" aria-label="Simple Booking Process">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">SIMPLE BOOKING</span>
        <h2 class="section-title">Your Stay Is Only a Conversation Away</h2>
        <p class="section-subtitle">
          We keep our booking process straightforward and personal. No automated payment gateways or complex checkouts.
        </p>
      </div>

      <div class="process-steps">

        <div class="process-step">
          <div class="process-step__number">01</div>
          <h3 class="process-step__title">Choose Your Room</h3>
          <p class="process-step__desc">Explore our 5 room options and select the space that feels right for your getaway.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">02</div>
          <h3 class="process-step__title">Send Your Enquiry</h3>
          <p class="process-step__desc">Share your dates, guest count and preferred room via WhatsApp or contact form.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">03</div>
          <h3 class="process-step__title">Confirm With GT HOMES</h3>
          <p class="process-step__desc">Our team will communicate directly with you to confirm availability and booking details.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 10 — WHATSAPP BOOKING CTA
  ════════════════════════════════════════════════════════════ -->
  <section class="final-cta-section" aria-label="WhatsApp Direct Booking Call to Action">
    <div class="container">
      <div class="final-cta__content">
        <div class="hero__badge" style="margin-inline:auto;">
          <i class="fab fa-whatsapp" aria-hidden="true"></i> DIRECT RESERVATIONS
        </div>
        <h2 class="final-cta__title">Found the Room for Your Stay?</h2>
        <p class="final-cta__text">
          Send us your preferred room, dates and number of guests. Our team will help you with availability and booking details right away.
        </p>
        <div class="final-cta__actions">
          <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to check room availability and book a stay.') ?>"
             target="_blank"
             rel="noopener noreferrer"
             class="btn btn--whatsapp btn--xl">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> Book via WhatsApp
          </a>
          <a href="<?= url('contact') ?>" class="btn btn--glass btn--xl">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i> Send an Enquiry
          </a>
        </div>
        <div style="margin-top: 1.5rem; font-size: 0.95rem; color: rgba(255,255,255,0.75);">
          <i class="fa-solid fa-phone" aria-hidden="true"></i> Direct Phone &amp; Hotline: <strong>0777 872 280</strong>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 11 — EXPLORE MORE (RESORT CROSS-SELL)
  ════════════════════════════════════════════════════════════ -->
  <section class="section cross-sell-section" aria-label="Explore Resort Experiences">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">MORE TO ENJOY</span>
        <h2 class="section-title">Make More of Your Stay</h2>
        <p class="section-subtitle">Combine your room stay with our special resort activities and dining options.</p>
      </div>

      <div class="cross-sell-grid">

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="GT HOMES Swimming Pool" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Swimming Pool</h3>
            <p>Relax by the refreshing water during your holiday getaway.</p>
            <a href="<?= url('experiences') ?>#pool" class="btn btn--secondary btn--sm">
              Explore Pool <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/cinema.jpg') ?>" alt="GT HOMES Private Mini Cinema" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Private Mini Cinema</h3>
            <p>Enjoy private movie screenings with your loved ones.</p>
            <a href="<?= url('experiences') ?>#cinema" class="btn btn--secondary btn--sm">
              Explore Cinema <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/dining.jpg') ?>" alt="GT HOMES Dining Experience" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Special Dining</h3>
            <p>Discover our delicious food menu and special dining setups.</p>
            <a href="<?= url('dining') ?>" class="btn btn--secondary btn--sm">
              View Dining <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>

<?php partial('partials/public_footer'); ?>
