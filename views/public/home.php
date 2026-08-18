<?php
/**
 * GT HOMES Holiday Resort — Homepage View
 * File: views/public/home.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'GT HOMES Holiday Resort | Comfortable Stays & Memorable Experiences',
    'metaDescription' => $metaDescription ?? 'Experience GT HOMES Holiday Resort — comfortable rooms, swimming pool, private mini cinema, special dining and memorable holiday experiences.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       SECTION 02 — CINEMATIC HERO
  ════════════════════════════════════════════════════════════ -->
  <section class="hero" aria-label="Welcome to GT HOMES Holiday Resort">
    <img src="<?= asset('images/home/hero.jpg') ?>"
         alt="GT HOMES Holiday Resort Twilight View and Infinity Pool"
         class="hero__bg-img"
         loading="eager">
    <div class="hero__overlay"></div>

    <div class="hero__container">
      <div class="hero__content">
        <div class="hero__badge">
          <i class="fa-solid fa-gem"></i> Welcome to GT HOMES
        </div>
        <h1 class="hero__title">
          Your Private Escape for Rest, Comfort &amp; <span>Beautiful Memories</span>
        </h1>
        <p class="hero__subtitle">
          Experience comfortable rooms, refreshing poolside moments, private entertainment,
          delicious dining and warm Sri Lankan hospitality — all in one peaceful holiday escape.
        </p>
        <div class="hero__actions">
          <a href="<?= url('rooms') ?>" class="btn btn--accent btn--lg">
            <i class="fa-solid fa-bed" aria-hidden="true"></i>
            Explore Our Rooms
          </a>
          <a href="<?= url('booking') ?>" class="btn btn--primary btn--lg">
            <i class="fa-solid fa-calendar-check" aria-hidden="true"></i>
            Book Your Stay
          </a>
        </div>
      </div>
    </div>

    <div class="hero__vertical-tag">
      <div class="hero__vertical-line"></div>
      <span>Boutique Holiday Resort — Sri Lanka</span>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — FLOATING BOOKING PANEL
  ════════════════════════════════════════════════════════════ -->
  <div class="booking-panel-wrapper" aria-label="Quick Booking Inquiry">
    <div class="booking-panel">
      <form id="hero-booking-form" class="booking-form" action="<?= url('booking') ?>" method="GET">
        
        <div class="booking-field">
          <label for="booking-checkin" class="booking-label">
            <i class="fa-regular fa-calendar"></i> Check In
          </label>
          <input type="date" id="booking-checkin" name="check_in" class="booking-input" required>
        </div>

        <div class="booking-field">
          <label for="booking-checkout" class="booking-label">
            <i class="fa-regular fa-calendar-check"></i> Check Out
          </label>
          <input type="date" id="booking-checkout" name="check_out" class="booking-input" required>
        </div>

        <div class="booking-field">
          <label for="booking-guests" class="booking-label">
            <i class="fa-solid fa-user-group"></i> Guests
          </label>
          <select id="booking-guests" name="guests" class="booking-input">
            <option value="1">1 Guest</option>
            <option value="2" selected>2 Guests</option>
            <option value="3">3 Guests</option>
            <option value="4">4 Guests</option>
            <option value="5+">5+ Guests (Group Stay)</option>
          </select>
        </div>

        <div class="booking-field">
          <label for="booking-room" class="booking-label">
            <i class="fa-solid fa-door-closed"></i> Room Type
          </label>
          <select id="booking-room" name="room" class="booking-input">
            <option value="any" selected>Select Preferred Space</option>
            <option value="orchid">Orchid Suite</option>
            <option value="dahiliya">Dahiliya Villa</option>
            <option value="lotus">Lotus Poolside</option>
            <option value="daffodil">Daffodil Room</option>
            <option value="rose">Rose Executive Suite</option>
          </select>
        </div>

        <div>
          <button type="submit" class="btn btn--primary btn--lg" style="width: 100%;">
            <i class="fa-solid fa-magnifying-glass"></i> Check Availability
          </button>
        </div>

      </form>
    </div>
  </div>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 04 — RESORT FEATURE STRIP
  ════════════════════════════════════════════════════════════ -->
  <section class="feature-strip-section" aria-label="Resort Features Overview">
    <div class="container">
      <div class="feature-strip">

        <div class="feature-strip__item">
          <div class="feature-strip__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 4v16"/><path d="M2 8h18a2 2 0 0 1 2 2v10"/><path d="M2 17h20"/><path d="M6 8v9"/></svg>
          </div>
          <span class="feature-strip__title">Comfortable Rooms</span>
        </div>

        <div class="feature-strip__item">
          <div class="feature-strip__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 6c.6 0 1.2.2 1.8.6l.4.3c1.2.8 2.8.8 4 0l.4-.3c1.2-.8 2.8-.8 4 0l.4.3c1.2.8 2.8.8 4 0l.4-.3c.6-.4 1.2-.6 1.8-.6"/><path d="M2 12c.6 0 1.2.2 1.8.6l.4.3c1.2.8 2.8.8 4 0l.4-.3c1.2-.8 2.8-.8 4 0l.4.3c1.2.8 2.8.8 4 0l.4-.3c.6-.4 1.2-.6 1.8-.6"/><path d="M2 18c.6 0 1.2.2 1.8.6l.4.3c1.2.8 2.8.8 4 0l.4-.3c1.2-.8 2.8-.8 4 0l.4.3c1.2.8 2.8.8 4 0l.4-.3c.6-.4 1.2-.6 1.8-.6"/></svg>
          </div>
          <span class="feature-strip__title">Swimming Pool</span>
        </div>

        <div class="feature-strip__item">
          <div class="feature-strip__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="2.18" ry="2.18"/><line x1="7" x2="7" y1="2" y2="22"/><line x1="17" x2="17" y1="2" y2="22"/><line x1="2" x2="22" y1="12" y2="12"/><line x1="2" x2="7" y1="7" y2="7"/><line x1="2" x2="7" y1="17" y2="17"/><line x1="17" x2="22" y1="17" y2="17"/><line x1="17" x2="22" y1="7" y2="7"/></svg>
          </div>
          <span class="feature-strip__title">Mini Cinema</span>
        </div>

        <div class="feature-strip__item">
          <div class="feature-strip__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg>
          </div>
          <span class="feature-strip__title">Special Dining</span>
        </div>

        <div class="feature-strip__item">
          <div class="feature-strip__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 22h8"/><path d="M12 11v11"/><path d="m19 3-7 8-7-8Z"/><path d="M5 3h14"/></svg>
          </div>
          <span class="feature-strip__title">Private Experiences</span>
        </div>

        <div class="feature-strip__item">
          <div class="feature-strip__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/></svg>
          </div>
          <span class="feature-strip__title">Memorable Moments</span>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 05 — WELCOME TO GT HOMES (ASYMMETRIC EDITORIAL)
  ════════════════════════════════════════════════════════════ -->
  <section class="welcome-section" aria-label="Welcome to GT HOMES">
    <div class="container">
      <div class="welcome-grid">

        <div class="welcome-media">
          <div class="welcome-media__img-box">
            <img src="<?= asset('images/home/welcome.jpg') ?>"
                 alt="GT HOMES Holiday Resort Courtyard and Garden Pavilion"
                 class="welcome-media__img"
                 loading="lazy">
          </div>
          <div class="welcome-media__badge">
            <div class="welcome-media__badge-icon">
              <i class="fa-solid fa-star"></i>
            </div>
            <div class="welcome-media__badge-text">
              <h4>Boutique Escape</h4>
              <p>Designed for Quality Time</p>
            </div>
          </div>
        </div>

        <div class="welcome-content">
          <span class="eyebrow">Your Home Away From Home</span>
          <h2 class="section-title">Where Every Stay Becomes a Memory</h2>
          <p class="section-subtitle" style="text-align: left; margin: 0 0 1.25rem 0;">
            At GT HOMES Holiday Resort, every detail is designed to make your stay comfortable,
            relaxing and memorable. From peaceful rooms and refreshing poolside moments to private
            entertainment and specially prepared food, everything comes together for a beautiful getaway.
          </p>

          <div class="welcome-features">
            <div class="welcome-feature-item">
              <i class="fa-solid fa-bed"></i>
              <span>Comfortable Rooms</span>
            </div>
            <div class="welcome-feature-item">
              <i class="fa-solid fa-water-ladder"></i>
              <span>Swimming Pool</span>
            </div>
            <div class="welcome-feature-item">
              <i class="fa-solid fa-film"></i>
              <span>Mini Cinema</span>
            </div>
            <div class="welcome-feature-item">
              <i class="fa-solid fa-utensils"></i>
              <span>Special Dining</span>
            </div>
            <div class="welcome-feature-item">
              <i class="fa-solid fa-champagne-glasses"></i>
              <span>Private Experiences</span>
            </div>
            <div class="welcome-feature-item">
              <i class="fa-solid fa-heart"></i>
              <span>Memorable Moments</span>
            </div>
          </div>

          <a href="<?= url('about') ?>" class="btn btn--primary btn--lg" style="margin-top: 0.5rem;">
            Discover GT HOMES <i class="fa-solid fa-arrow-right"></i>
          </a>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 06 — FEATURED ROOMS
  ════════════════════════════════════════════════════════════ -->
  <section class="rooms-section" aria-label="Featured Accommodation">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Stay Your Way</span>
        <h2 class="section-title">Choose Your Perfect Room</h2>
        <p class="section-subtitle">
          Five distinctive spaces designed for comfort, relaxation and memorable stays.
        </p>
      </div>

      <!-- Top 3 Rooms -->
      <div class="rooms-grid">

        <!-- ORCHID -->
        <article class="room-card">
          <div class="room-card__media">
            <img src="<?= asset('images/rooms/orchid/main.jpg') ?>" alt="ORCHID Room Suite" class="room-card__img" loading="lazy">
            <span class="room-card__badge">Romantic &amp; Peaceful</span>
          </div>
          <div class="room-card__body">
            <h3 class="room-card__title">ORCHID</h3>
            <p class="room-card__desc">
              Elegant comfort with a peaceful, romantic atmosphere, featuring refined wooden finishes and a private garden balcony.
            </p>
            <div class="room-card__specs">
              <div class="room-card__spec-item"><i class="fa-solid fa-user"></i> 2 Guests</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-bed"></i> King Bed</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-wind"></i> AC &amp; Wi-Fi</div>
            </div>
            <div class="room-card__footer">
              <div class="room-card__price">
                <span class="room-card__price-label">Starting From</span>
                <span class="room-card__price-amount">LKR 25,000</span>
              </div>
              <a href="<?= url('room_details.php?slug=orchid') ?>" class="btn btn--secondary btn--sm">
                View Room <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- DAHILIYA -->
        <article class="room-card">
          <div class="room-card__media">
            <img src="<?= asset('images/rooms/dahiliya/main.jpg') ?>" alt="DAHILIYA Villa Suite" class="room-card__img" loading="lazy">
            <span class="room-card__badge">Spacious &amp; Warm</span>
          </div>
          <div class="room-card__body">
            <h3 class="room-card__title">DAHILIYA</h3>
            <p class="room-card__desc">
              Spacious deluxe villa offering natural warmth, high wooden ceilings, and relaxing garden views for deep rest.
            </p>
            <div class="room-card__specs">
              <div class="room-card__spec-item"><i class="fa-solid fa-user"></i> 2–3 Guests</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-bed"></i> Queen Bed</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-tree"></i> Garden View</div>
            </div>
            <div class="room-card__footer">
              <div class="room-card__price">
                <span class="room-card__price-label">Starting From</span>
                <span class="room-card__price-amount">LKR 28,000</span>
              </div>
              <a href="<?= url('room_details.php?slug=dahiliya') ?>" class="btn btn--secondary btn--sm">
                View Room <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- LOTUS -->
        <article class="room-card">
          <div class="room-card__media">
            <img src="<?= asset('images/rooms/lotus/main.jpg') ?>" alt="LOTUS Poolside Suite" class="room-card__img" loading="lazy">
            <span class="room-card__badge">Pool Terrace Access</span>
          </div>
          <div class="room-card__body">
            <h3 class="room-card__title">LOTUS</h3>
            <p class="room-card__desc">
              Poolside luxury with direct outdoor terrace access, floor-to-ceiling glass doors, and effortless morning poolside access.
            </p>
            <div class="room-card__specs">
              <div class="room-card__spec-item"><i class="fa-solid fa-user"></i> 2 Guests</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-bed"></i> King Bed</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-water-ladder"></i> Pool Terrace</div>
            </div>
            <div class="room-card__footer">
              <div class="room-card__price">
                <span class="room-card__price-label">Starting From</span>
                <span class="room-card__price-amount">LKR 32,000</span>
              </div>
              <a href="<?= url('room_details.php?slug=lotus') ?>" class="btn btn--secondary btn--sm">
                View Room <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

      </div>

      <!-- Bottom 2 Rooms -->
      <div class="rooms-grid rooms-grid--secondary">

        <!-- DAFFODIL -->
        <article class="room-card">
          <div class="room-card__media">
            <img src="<?= asset('images/rooms/daffodil/main.jpg') ?>" alt="DAFFODIL Room Suite" class="room-card__img" loading="lazy">
            <span class="room-card__badge">Cozy &amp; Serene</span>
          </div>
          <div class="room-card__body">
            <h3 class="room-card__title">DAFFODIL</h3>
            <p class="room-card__desc">
              Cozy, serene boutique space designed for quiet holidays, warm ambient lighting, and serene privacy.
            </p>
            <div class="room-card__specs">
              <div class="room-card__spec-item"><i class="fa-solid fa-user"></i> 2 Guests</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-bed"></i> Double Bed</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-mug-hot"></i> Private Patio</div>
            </div>
            <div class="room-card__footer">
              <div class="room-card__price">
                <span class="room-card__price-label">Starting From</span>
                <span class="room-card__price-amount">LKR 22,000</span>
              </div>
              <a href="<?= url('room_details.php?slug=daffodil') ?>" class="btn btn--secondary btn--sm">
                View Room <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

        <!-- ROSE -->
        <article class="room-card">
          <div class="room-card__media">
            <img src="<?= asset('images/rooms/rose/main.jpg') ?>" alt="ROSE Executive Suite" class="room-card__img" loading="lazy">
            <span class="room-card__badge">Executive Luxury</span>
          </div>
          <div class="room-card__body">
            <h3 class="room-card__title">ROSE</h3>
            <p class="room-card__desc">
              Executive luxury suite crafted for special celebrations, featuring rich maroon and gold accents and plush lounge seating.
            </p>
            <div class="room-card__specs">
              <div class="room-card__spec-item"><i class="fa-solid fa-user"></i> 2–4 Guests</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-bed"></i> Master King Bed</div>
              <div class="room-card__spec-item"><i class="fa-solid fa-couch"></i> Lounge Corner</div>
            </div>
            <div class="room-card__footer">
              <div class="room-card__price">
                <span class="room-card__price-label">Starting From</span>
                <span class="room-card__price-amount">LKR 38,000</span>
              </div>
              <a href="<?= url('room_details.php?slug=rose') ?>" class="btn btn--secondary btn--sm">
                View Room <i class="fa-solid fa-arrow-right"></i>
              </a>
            </div>
          </div>
        </article>

      </div>

      <div class="text-center" style="margin-top: 3.5rem;">
        <a href="<?= url('rooms') ?>" class="btn btn--primary btn--lg">
          Explore All Rooms &amp; Rates <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 07 — EXPERIENCES
  ════════════════════════════════════════════════════════════ -->
  <section class="experiences-section" aria-label="Resort Experiences">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Experiences</span>
        <h2 class="section-title">More Than Just a Stay</h2>
        <p class="section-subtitle">
          Unwind by the pool, enjoy private movie nights, and savor freshly prepared meals.
        </p>
      </div>

      <div class="experiences-grid">

        <!-- Swimming Pool -->
        <div class="exp-card">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="GT HOMES Resort Swimming Pool" class="exp-card__bg" loading="lazy">
          <div class="exp-card__overlay"></div>
          <div class="exp-card__content">
            <div class="exp-card__icon"><i class="fa-solid fa-water-ladder"></i></div>
            <h3 class="exp-card__title">Swimming Pool</h3>
            <p class="exp-card__desc">Refresh, relax and enjoy peaceful poolside moments surrounded by lush coconut palms.</p>
            <a href="<?= url('experiences') ?>#pool" class="btn btn--accent btn--sm">
              Discover the Pool <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Mini Cinema -->
        <div class="exp-card exp-card--cinema">
          <img src="<?= asset('images/experiences/cinema.jpg') ?>" alt="Private Mini Cinema at GT HOMES" class="exp-card__bg" loading="lazy">
          <div class="exp-card__overlay"></div>
          <div class="exp-card__content">
            <div class="exp-card__icon"><i class="fa-solid fa-film"></i></div>
            <h3 class="exp-card__title">Private Mini Cinema</h3>
            <p class="exp-card__desc">Turn your evenings into a private movie experience with family and friends in plush acoustic comfort.</p>
            <a href="<?= url('experiences') ?>#cinema" class="btn btn--accent btn--sm">
              Explore Mini Cinema <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Special Dining -->
        <div class="exp-card">
          <img src="<?= asset('images/experiences/dining.jpg') ?>" alt="Special Outdoor Resort Dining" class="exp-card__bg" loading="lazy">
          <div class="exp-card__overlay"></div>
          <div class="exp-card__content">
            <div class="exp-card__icon"><i class="fa-solid fa-utensils"></i></div>
            <h3 class="exp-card__title">Special Dining</h3>
            <p class="exp-card__desc">Enjoy specially prepared Sri Lankan dishes and candlelight dining designed to make every meal memorable.</p>
            <a href="<?= url('dining') ?>" class="btn btn--accent btn--sm">
              Explore Our Menu <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 08 — SPECIAL DINING PREVIEW
  ════════════════════════════════════════════════════════════ -->
  <section class="dining-section" aria-label="Dining Options">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Dining</span>
        <h2 class="section-title">Flavours Made for Your Stay</h2>
        <p class="section-subtitle">
          From comforting favourites to special Sri Lankan dishes, enjoy carefully prepared food throughout your GT HOMES experience.
        </p>
      </div>

      <div class="dining-tabs" role="tablist">
        <button class="dining-tab dining-tab--active">Breakfast</button>
        <button class="dining-tab">Lunch</button>
        <button class="dining-tab">Dinner</button>
        <button class="dining-tab">Snacks</button>
        <button class="dining-tab">Beverages</button>
        <button class="dining-tab">Special Menus</button>
      </div>

      <div class="dining-grid">

        <div class="dining-card">
          <img src="<?= asset('images/menu/menu_1.png') ?>" alt="GT HOMES Real Resort Menu Card" class="dining-card__img" loading="lazy">
          <div class="dining-card__body">
            <h3 class="dining-card__title">Sri Lankan Traditional Feast</h3>
            <p class="dining-card__text">Authentic rice and curry spreads prepared with fresh local spices and traditional claypot aromas.</p>
          </div>
        </div>

        <div class="dining-card">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="Poolside Refreshments & Cocktails" class="dining-card__img" loading="lazy">
          <div class="dining-card__body">
            <h3 class="dining-card__title">Poolside Refreshments</h3>
            <p class="dining-card__text">Fresh king coconut water, tropical fruit juices, and handcrafted evening refreshments served by the pool.</p>
          </div>
        </div>

        <div class="dining-card">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="Candlelight Evening BBQ" class="dining-card__img" loading="lazy">
          <div class="dining-card__body">
            <h3 class="dining-card__title">Candlelight Garden BBQ</h3>
            <p class="dining-card__text">Freshly grilled seafood and tender meats served under ambient garden lights for private celebrations.</p>
          </div>
        </div>

      </div>

      <div class="text-center" style="margin-top: 3rem;">
        <a href="<?= url('dining') ?>" class="btn btn--secondary btn--lg">
          View Full Menu &amp; Dining Details <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 09 — MEMORIES GALLERY
  ════════════════════════════════════════════════════════════ -->
  <section class="gallery-section" aria-label="Resort Memories Gallery">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Memories</span>
        <h2 class="section-title">Moments at GT HOMES</h2>
        <p class="section-subtitle">
          A glimpse into relaxing stays, celebrations, poolside moments, delicious food and beautiful memories shared at GT HOMES.
        </p>
      </div>

      <div class="gallery-grid">

        <div class="gallery-item gallery-item--wide">
          <img src="<?= asset('images/gallery/gallery_1.jpg') ?>" alt="Resort Aerial View" class="gallery-item__img" loading="lazy">
          <div class="gallery-item__overlay">
            <span class="gallery-item__caption">Tropical Haven &amp; Pool</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="<?= asset('images/experiences/pool.jpg') ?>" alt="Poolside Sun Loungers" class="gallery-item__img" loading="lazy">
          <div class="gallery-item__overlay">
            <span class="gallery-item__caption">Sunlit Relaxing</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="<?= asset('images/experiences/cinema.jpg') ?>" alt="Private Mini Cinema Room" class="gallery-item__img" loading="lazy">
          <div class="gallery-item__overlay">
            <span class="gallery-item__caption">Movie Night</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="<?= asset('images/rooms/orchid/main.jpg') ?>" alt="Orchid Bedroom Suite" class="gallery-item__img" loading="lazy">
          <div class="gallery-item__overlay">
            <span class="gallery-item__caption">Peaceful Nights</span>
          </div>
        </div>

        <div class="gallery-item gallery-item--wide">
          <img src="<?= asset('images/experiences/dining.jpg') ?>" alt="Candlelight Dinner Setting" class="gallery-item__img" loading="lazy">
          <div class="gallery-item__overlay">
            <span class="gallery-item__caption">Special Celebrations</span>
          </div>
        </div>

        <div class="gallery-item">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="Garden Pavilion" class="gallery-item__img" loading="lazy">
          <div class="gallery-item__overlay">
            <span class="gallery-item__caption">Garden Moments</span>
          </div>
        </div>

      </div>

      <div class="text-center" style="margin-top: 3rem;">
        <a href="<?= url('gallery') ?>" class="btn btn--primary btn--lg">
          Explore Our Complete Gallery <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 10 — SPECIAL MEMORIES (DARK MAROON GRADIENT)
  ════════════════════════════════════════════════════════════ -->
  <section class="special-memories-section" aria-label="Special Occasions & Celebrations">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Special Memories</span>
        <h2 class="section-title">Celebrate Life's Beautiful Moments</h2>
        <p class="section-subtitle">
          Because the best holidays are remembered long after the journey ends.
        </p>
      </div>

      <div class="special-memories-grid">

        <div class="special-card">
          <div class="special-card__icon"><i class="fa-solid fa-cake-candles"></i></div>
          <h3 class="special-card__title">Birthdays</h3>
          <p class="special-card__desc">Intimate birthday dinners, poolside cake cutting, and fairy-lit garden celebrations.</p>
        </div>

        <div class="special-card">
          <div class="special-card__icon"><i class="fa-solid fa-heart"></i></div>
          <h3 class="special-card__title">Anniversaries</h3>
          <p class="special-card__desc">Romantic suite setups, candlelight dining, and unforgettable private moments together.</p>
        </div>

        <div class="special-card">
          <div class="special-card__icon"><i class="fa-solid fa-people-roof"></i></div>
          <h3 class="special-card__title">Family Gatherings</h3>
          <p class="special-card__desc">Spacious accommodation, swimming pool fun, and quality bonding time for all generations.</p>
        </div>

        <div class="special-card">
          <div class="special-card__icon"><i class="fa-solid fa-champagne-glasses"></i></div>
          <h3 class="special-card__title">Romantic Stays</h3>
          <p class="special-card__desc">Peaceful private atmosphere created specifically for couples seeking rest and romantic comfort.</p>
        </div>

        <div class="special-card">
          <div class="special-card__icon"><i class="fa-solid fa-user-group"></i></div>
          <h3 class="special-card__title">Group Getaways</h3>
          <p class="special-card__desc">Exclusive resort packages for friend circles wanting a private pool and mini cinema experience.</p>
        </div>

      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 11 — WHY CHOOSE GT HOMES
  ════════════════════════════════════════════════════════════ -->
  <section class="why-section" aria-label="Why Choose GT HOMES">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Why GT HOMES</span>
        <h2 class="section-title">Everything You Need for a Beautiful Stay</h2>
        <p class="section-subtitle">
          Designed from the ground up to offer a seamless, comforting, and authentic resort experience.
        </p>
      </div>

      <div class="why-grid">

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-bed"></i></div>
          <h3 class="why-card__title">Comfortable Stays</h3>
          <p class="why-card__desc">Thoughtfully prepared rooms designed for restful holidays with premium bedding and air conditioning.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-water-ladder"></i></div>
          <h3 class="why-card__title">Relaxing Pool</h3>
          <p class="why-card__desc">A refreshing crystal pool space to unwind, swim, and soak in tropical sunshine with family and friends.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-film"></i></div>
          <h3 class="why-card__title">Private Entertainment</h3>
          <p class="why-card__desc">Enjoy memorable movie nights with high-definition visuals and acoustic comfort in our private mini cinema.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-utensils"></i></div>
          <h3 class="why-card__title">Delicious Dining</h3>
          <p class="why-card__desc">Freshly prepared food and authentic Sri Lankan specialties tailored to complete your resort getaway.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-hand-holding-heart"></i></div>
          <h3 class="why-card__title">Warm Hospitality</h3>
          <p class="why-card__desc">Friendly, attentive service throughout your stay, ensuring you feel genuinely cared for at all times.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-gem"></i></div>
          <h3 class="why-card__title">Memorable Experiences</h3>
          <p class="why-card__desc">A peaceful destination crafted to turn ordinary weekends into cherished memories worth keeping.</p>
        </div>

      </div>

    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 12 — TESTIMONIALS
  ════════════════════════════════════════════════════════════ -->
  <section class="testimonials-section" aria-label="Guest Testimonials">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">Guest Stories</span>
        <h2 class="section-title">Loved by Our Guests</h2>
        <p class="section-subtitle">
          Read what guests say about their stays, celebrations, and experiences at GT HOMES.
        </p>
      </div>

      <div class="testimonials-grid">

        <div class="testimonial-card">
          <div class="testimonial-card__quote-icon"><i class="fa-solid fa-quote-left"></i></div>
          <div class="testimonial-card__stars">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
          </div>
          <p class="testimonial-card__text">
            "Beautiful rooms, peaceful surroundings and such a lovely place to spend quality time with family. The pool and private cinema were highlights of our stay!"
          </p>
          <div class="testimonial-card__author">
            <div class="testimonial-card__avatar">K</div>
            <div class="testimonial-card__info">
              <h5>Kasun &amp; Family</h5>
              <p>Family Weekend Stay</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-card__quote-icon"><i class="fa-solid fa-quote-left"></i></div>
          <div class="testimonial-card__stars">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
          </div>
          <p class="testimonial-card__text">
            "We celebrated our wedding anniversary at GT HOMES. The romantic atmosphere, delicious Sri Lankan food, and friendly staff made it truly unforgettable."
          </p>
          <div class="testimonial-card__author">
            <div class="testimonial-card__avatar">D</div>
            <div class="testimonial-card__info">
              <h5>Dilini &amp; Rohan</h5>
              <p>Anniversary Getaway</p>
            </div>
          </div>
        </div>

        <div class="testimonial-card">
          <div class="testimonial-card__quote-icon"><i class="fa-solid fa-quote-left"></i></div>
          <div class="testimonial-card__stars">
            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
          </div>
          <p class="testimonial-card__text">
            "An exceptional private escape! Clean, comfortable, and serene. Having a private mini cinema for movie night with friends was an amazing experience."
          </p>
          <div class="testimonial-card__author">
            <div class="testimonial-card__avatar">S</div>
            <div class="testimonial-card__info">
              <h5>Shenal Perera</h5>
              <p>Group Weekend Stay</p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 13 — FINAL CTA
  ════════════════════════════════════════════════════════════ -->
  <section class="final-cta-section" aria-label="Book Your Stay Now">
    <img src="<?= asset('images/home/cta_bg.jpg') ?>" alt="GT HOMES Evening Poolside Sunset" class="final-cta__bg" loading="lazy">
    <div class="final-cta__overlay"></div>

    <div class="final-cta__container">
      <h2 class="final-cta__title">Your Next Beautiful Memory Starts Here</h2>
      <p class="final-cta__desc">
        Whether it's a peaceful getaway, a family stay or a special celebration, GT HOMES is ready to welcome you with warm Sri Lankan hospitality.
      </p>
      <div class="final-cta__actions">
        <a href="<?= url('booking') ?>" class="btn btn--primary btn--xl">
          <i class="fa-solid fa-calendar-check"></i> Book Your Stay
        </a>
        <a href="<?= e(WhatsAppService::buildContactUrl()) ?>" target="_blank" rel="noopener noreferrer" class="btn btn--whatsapp btn--xl">
          <i class="fab fa-whatsapp"></i> Chat on WhatsApp
        </a>
      </div>
    </div>
  </section>

</main>

<?php partial('partials/public_footer'); ?>
