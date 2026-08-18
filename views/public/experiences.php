<?php
/**
 * GT HOMES Holiday Resort — Experiences & Facilities View
 * File: views/public/experiences.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $experiences     (array<int, array<string, mixed>>)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Experiences & Facilities | GT HOMES Holiday Resort',
    'metaDescription' => $metaDescription ?? 'Discover experiences at GT HOMES Holiday Resort including the swimming pool, private mini cinema, special dining, relaxing spaces, and memorable stays.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER — EXPERIENCES & FACILITIES
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= asset('images/experiences/pool.jpg') ?>"
         alt="GT HOMES Experiences &amp; Facilities"
         class="page-header__bg-img"
         loading="eager">
    <div class="page-header__overlay"></div>

    <div class="container page-header__container">
      <span class="eyebrow eyebrow--light">EXPERIENCES AT GT HOMES</span>
      <h1 class="page-header__title page-header__title--light">More Than Just a Stay</h1>
      <p class="page-header__desc page-header__desc--light">
        Slow down by the pool, enjoy a private movie night, share delicious food and spend meaningful time together. At GT HOMES, every part of your stay can become a memory.
      </p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 02 — EXPERIENCE QUICK NAVIGATION STRIP
  ════════════════════════════════════════════════════════════ -->
  <nav class="experience-nav-strip" aria-label="Experience quick links">
    <div class="container">
      <div class="experience-nav-strip__inner">
        <a href="#swimming-pool" class="experience-nav-link">
          <i class="fa-solid fa-water-ladder" aria-hidden="true"></i>
          <span>Swimming Pool</span>
        </a>
        <a href="#mini-cinema" class="experience-nav-link">
          <i class="fa-solid fa-film" aria-hidden="true"></i>
          <span>Mini Cinema</span>
        </a>
        <a href="#special-dining" class="experience-nav-link">
          <i class="fa-solid fa-utensils" aria-hidden="true"></i>
          <span>Special Dining</span>
        </a>
        <a href="#relaxation" class="experience-nav-link">
          <i class="fa-solid fa-leaf" aria-hidden="true"></i>
          <span>Relaxation</span>
        </a>
        <a href="#special-moments" class="experience-nav-link">
          <i class="fa-solid fa-camera-retro" aria-hidden="true"></i>
          <span>Special Moments</span>
        </a>
      </div>
    </div>
  </nav>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — EXPERIENCES INTRODUCTION
  ════════════════════════════════════════════════════════════ -->
  <section class="section experiences-intro" id="experience-intro" aria-label="Experiences Introduction">
    <div class="container">
      <div class="experiences-intro__grid">
        <div class="experiences-intro__content">
          <span class="eyebrow">ENJOY EVERY MOMENT</span>
          <h2 class="section-title">Your Time Away Should Feel Different</h2>
          <p class="section-subtitle section-subtitle--left">
            A GT HOMES stay is not only about where you sleep. It is about quiet mornings by the pool, refreshing afternoons, shared family meals, movie nights and moments spent together. Our resort experiences are designed to help you relax, connect and enjoy more from your getaway.
          </p>
          
          <div class="experiences-intro__tags">
            <span class="exp-intro-tag"><i class="fa-solid fa-circle-check"></i> Relax Together</span>
            <span class="exp-intro-tag"><i class="fa-solid fa-circle-check"></i> Private Entertainment</span>
            <span class="exp-intro-tag"><i class="fa-solid fa-circle-check"></i> Poolside Time</span>
            <span class="exp-intro-tag"><i class="fa-solid fa-circle-check"></i> Shared Dining</span>
            <span class="exp-intro-tag"><i class="fa-solid fa-circle-check"></i> Beautiful Memories</span>
          </div>
        </div>

        <div class="experiences-intro__media">
          <div class="experiences-intro__img-wrapper">
            <img src="<?= asset('images/experiences/pool.jpg') ?>"
                 alt="GT HOMES Resort Ambiance and Poolside Relaxation"
                 class="experiences-intro__img-main"
                 loading="lazy">
            <div class="experiences-intro__badge">
              <span class="experiences-intro__badge-num">5+</span>
              <span class="experiences-intro__badge-text">Resort<br>Experiences</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 04 — SWIMMING POOL FEATURE
  ════════════════════════════════════════════════════════════ -->
  <section class="section pool-feature-section" id="swimming-pool" aria-label="Swimming Pool Feature">
    <div class="container">
      <div class="pool-feature-card">
        <div class="pool-feature-card__media">
          <img src="<?= asset('images/experiences/pool.jpg') ?>"
               alt="GT HOMES Resort Swimming Pool"
               class="pool-feature-card__img"
               loading="lazy">
          <div class="pool-feature-card__badge">
            <i class="fa-solid fa-water-ladder"></i> Resort Feature
          </div>
        </div>

        <div class="pool-feature-card__content">
          <span class="eyebrow">REFRESH &amp; UNWIND</span>
          <h2 class="section-title">Your Favourite Place to Slow Down</h2>
          <p class="section-subtitle section-subtitle--left">
            Take a break from the everyday and enjoy relaxing moments by the water. Whether you are cooling down in the afternoon or spending time together with family and friends, the pool adds something special to your GT HOMES stay.
          </p>

          <div class="pool-feature-highlights">
            <div class="pool-highlight">
              <i class="fa-solid fa-face-smile"></i>
              <span>Relax</span>
            </div>
            <div class="pool-highlight">
              <i class="fa-solid fa-temperature-arrow-down"></i>
              <span>Refresh</span>
            </div>
            <div class="pool-highlight">
              <i class="fa-solid fa-users"></i>
              <span>Spend Time Together</span>
            </div>
          </div>

          <div class="pool-feature-card__actions">
            <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to ask about swimming pool access and booking availability.') ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--md">
              <i class="fab fa-whatsapp" aria-hidden="true"></i> Ask About Pool Access
            </a>
            <a href="<?= url('booking') ?>" class="btn btn--secondary btn--md">
              <i class="fa-solid fa-calendar-check" aria-hidden="true"></i> Plan Your Stay
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 05 — PRIVATE MINI CINEMA FEATURE (DARK CINEMATIC SECTION)
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--dark-cinema" id="mini-cinema" aria-label="Private Mini Cinema Feature">
    <div class="container">
      <div class="cinema-feature-card">
        <div class="cinema-feature-card__content">
          <div class="hero__badge" style="background: rgba(246, 221, 99, 0.15); color: var(--brand-yellow); border: 1px solid rgba(246, 221, 99, 0.3);">
            <i class="fa-solid fa-film" aria-hidden="true"></i> PRIVATE ENTERTAINMENT
          </div>
          <h2 class="cinema-feature-card__title">Your Own Mini Cinema Experience</h2>
          <p class="cinema-feature-card__sub">
            Turn your holiday evening into a private movie night. Gather together, get comfortable and enjoy entertainment in a space designed for shared moments. Perfect for relaxed evenings with family, friends or someone special.
          </p>

          <div class="cinema-feature-tags">
            <span class="cinema-tag"><i class="fa-solid fa-lock"></i> Private Setting</span>
            <span class="cinema-tag"><i class="fa-solid fa-couch"></i> Comfortable Viewing</span>
            <span class="cinema-tag"><i class="fa-solid fa-user-group"></i> Perfect for Groups</span>
            <span class="cinema-tag"><i class="fa-solid fa-moon"></i> Relaxed Evenings</span>
          </div>

          <div style="margin-top: 2rem;">
            <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to ask about mini cinema availability for my stay.') ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--lg">
              <i class="fab fa-whatsapp" aria-hidden="true"></i> Ask About Mini Cinema
            </a>
          </div>
        </div>

        <div class="cinema-feature-card__media">
          <div class="cinema-img-wrapper">
            <img src="<?= asset('images/experiences/cinema.jpg') ?>"
                 alt="GT HOMES Private Mini Cinema Experience"
                 class="cinema-img"
                 loading="lazy">
            <div class="cinema-play-badge">
              <i class="fa-solid fa-play"></i> Private Screening
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 06 — SPECIAL DINING FEATURE
  ════════════════════════════════════════════════════════════ -->
  <section class="section dining-experience-section" id="special-dining" aria-label="Special Dining Feature">
    <div class="container">
      <div class="dining-feature-card">
        <div class="dining-feature-card__media">
          <img src="<?= asset('images/experiences/dining.jpg') ?>"
               alt="GT HOMES Resort Dining Setup"
               class="dining-feature-card__img"
               loading="lazy">
        </div>

        <div class="dining-feature-card__content">
          <span class="eyebrow">DINE &amp; ENJOY</span>
          <h2 class="section-title">Good Food, Better Moments</h2>
          <p class="section-subtitle section-subtitle--left">
            Complete your GT HOMES getaway with comforting meals, Sri Lankan flavours and dining experiences made for sharing with your loved ones.
          </p>

          <div class="dining-feature-tags">
            <span class="dining-tag"><i class="fa-solid fa-utensils"></i> Fresh Breakfast</span>
            <span class="dining-tag"><i class="fa-solid fa-pepper-hot"></i> Sri Lankan Flavours</span>
            <span class="dining-tag"><i class="fa-solid fa-wine-glass"></i> Special Dinners</span>
          </div>

          <div class="dining-feature-card__actions">
            <a href="<?= url('dining') ?>" class="btn btn--primary btn--md">
              <i class="fa-solid fa-utensils" aria-hidden="true"></i> Explore Menu &amp; Dining
            </a>
            <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to ask about special dining options.') ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--md">
              <i class="fab fa-whatsapp" aria-hidden="true"></i> Ask About Dining
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 07 — RELAXATION & RESORT SPACES
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface relaxation-section" id="relaxation" aria-label="Relaxation and Resort Spaces">
    <div class="container">
      <div class="relaxation-grid">
        <div class="relaxation-content">
          <span class="eyebrow">SLOW DOWN</span>
          <h2 class="section-title">Spaces Made for Taking It Easy</h2>
          <p class="section-subtitle section-subtitle--left">
            Sometimes the best part of a getaway is doing very little. Take time to sit back, enjoy the peaceful surroundings and share quiet moments away from the usual routine.
          </p>

          <div class="relaxation-features">
            <div class="relaxation-feat-item">
              <i class="fa-solid fa-tree"></i>
              <div>
                <h4>Tranquil Surroundings</h4>
                <p>Quiet green spaces and fresh breeze throughout the resort grounds.</p>
              </div>
            </div>
            <div class="relaxation-feat-item">
              <i class="fa-solid fa-mug-hot"></i>
              <div>
                <h4>Quiet Verandas</h4>
                <p>Comfortable outdoor seating areas perfect for morning tea or evening chats.</p>
              </div>
            </div>
            <div class="relaxation-feat-item">
              <i class="fa-solid fa-cloud-sun"></i>
              <div>
                <h4>Peaceful Atmosphere</h4>
                <p>Designed to help you unwind and leave daily stress behind.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="relaxation-media">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="GT HOMES Resort Spaces and Ambiance" class="relaxation-img" loading="lazy">
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 08 — CREATE YOUR OWN EXPERIENCE (EXPERIENCE IDEAS)
  ════════════════════════════════════════════════════════════ -->
  <section class="section experience-ideas-section" aria-label="Ways to Enjoy Your Stay">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">YOUR STAY, YOUR WAY</span>
        <h2 class="section-title">Build the Kind of Getaway You Want</h2>
        <p class="section-subtitle">
          Your GT HOMES experience can be shaped around the moments that matter most to you.
        </p>
      </div>

      <div class="experience-ideas-grid">

        <div class="exp-idea-card">
          <div class="exp-idea-card__icon"><i class="fa-solid fa-battery-charging"></i></div>
          <h3 class="exp-idea-card__title">Relax &amp; Recharge</h3>
          <p class="exp-idea-card__desc">Slow mornings, comfortable stays, quiet verandas and plenty of poolside time to unwind.</p>
          <span class="exp-idea-card__tag">Ideal for Couples &amp; Solo Stays</span>
        </div>

        <div class="exp-idea-card">
          <div class="exp-idea-card__icon"><i class="fa-solid fa-people-group"></i></div>
          <h3 class="exp-idea-card__title">Family Time</h3>
          <p class="exp-idea-card__desc">Share hearty meals, enjoy pool fun together, and spend quality time with the ones who matter.</p>
          <span class="exp-idea-card__tag">Ideal for Family Vacations</span>
        </div>

        <div class="exp-idea-card">
          <div class="exp-idea-card__icon"><i class="fa-solid fa-popcorn"></i></div>
          <h3 class="exp-idea-card__title">Movie Night Getaway</h3>
          <p class="exp-idea-card__desc">Make your evening extra special with a private screening session in our mini cinema.</p>
          <span class="exp-idea-card__tag">Ideal for Groups &amp; Evenings</span>
        </div>

        <div class="exp-idea-card">
          <div class="exp-idea-card__icon"><i class="fa-solid fa-champagne-glasses"></i></div>
          <h3 class="exp-idea-card__title">Celebrate Together</h3>
          <p class="exp-idea-card__desc">Turn birthdays, anniversaries and small gatherings into beautiful lasting memories.</p>
          <span class="exp-idea-card__tag">Ideal for Occasions</span>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 09 — SPECIAL MOMENTS & CELEBRATIONS
  ════════════════════════════════════════════════════════════ -->
  <section class="special-moments-section" id="special-moments" aria-label="Special Moments and Celebrations">
    <div class="container">
      <div class="special-moments-box">
        <div class="hero__badge" style="margin-inline:auto;">
          <i class="fa-solid fa-camera-retro" aria-hidden="true"></i> SPECIAL MOMENTS
        </div>
        <h2 class="special-moments-box__title">Some Stays Deserve a Little More Celebration</h2>
        <p class="special-moments-box__text">
          Birthdays, anniversaries, family gatherings and simple moments together can become memories you carry long after your stay ends.
        </p>

        <div class="special-moments-tags">
          <div class="special-moments-tag"><i class="fa-solid fa-gift"></i> Birthdays</div>
          <div class="special-moments-tag"><i class="fa-solid fa-heart"></i> Anniversaries</div>
          <div class="special-moments-tag"><i class="fa-solid fa-users"></i> Family Reunions</div>
          <div class="special-moments-tag"><i class="fa-solid fa-champagne-glasses"></i> Romantic Weekend</div>
          <div class="special-moments-tag"><i class="fa-solid fa-user-group"></i> Friend Groups</div>
        </div>

        <div class="special-moments-box__actions">
          <a href="<?= url('gallery') ?>" class="btn btn--glass btn--lg">
            <i class="fa-solid fa-images" aria-hidden="true"></i> Explore Special Memories
          </a>
          <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to plan a special celebration stay for an upcoming occasion.') ?>"
             target="_blank"
             rel="noopener noreferrer"
             class="btn btn--whatsapp btn--lg">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> Plan a Special Stay
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 10 — EXPERIENCE GALLERY PREVIEW STRIP
  ════════════════════════════════════════════════════════════ -->
  <section class="section gallery-preview-section" aria-label="Experience Photo Preview">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">RESORT ATMOSPHERE</span>
        <h2 class="section-title">A Glimpse of the GT HOMES Experience</h2>
      </div>

      <div class="exp-gallery-grid">
        <div class="exp-gallery-item">
          <img src="<?= asset('images/memories/memory_7.jpg') ?>" alt="GT HOMES Resort Morning Ambiance" class="exp-gallery-img" loading="lazy">
          <div class="exp-gallery-caption">Resort Ambiance</div>
        </div>
        <div class="exp-gallery-item">
          <img src="<?= asset('images/experiences/cinema.jpg') ?>" alt="GT HOMES Mini Cinema" class="exp-gallery-img" loading="lazy">
          <div class="exp-gallery-caption">Private Mini Cinema</div>
        </div>
        <div class="exp-gallery-item">
          <img src="<?= asset('images/menu/menu_1.png') ?>" alt="GT HOMES Resort Dining" class="exp-gallery-img" loading="lazy">
          <div class="exp-gallery-caption">Special Dining</div>
        </div>
        <div class="exp-gallery-item">
          <img src="<?= asset('images/memories/memory_8.jpg') ?>" alt="GT HOMES Special Moments" class="exp-gallery-img" loading="lazy">
          <div class="exp-gallery-caption">Special Celebrations</div>
        </div>
      </div>

      <div style="text-align: center; margin-top: 2.5rem;">
        <a href="<?= url('gallery') ?>" class="btn btn--secondary btn--md">
          <i class="fa-solid fa-images"></i> View Our Complete Gallery
        </a>
      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 11 — WHY GUESTS ENJOY GT HOMES
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface why-experiences-section" aria-label="Why Guests Enjoy GT HOMES">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">WHY GT HOMES</span>
        <h2 class="section-title">Everything Comes Together in One Stay</h2>
      </div>

      <div class="why-grid">

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-bed"></i></div>
          <h3 class="why-card__title">Comfortable Rooms</h3>
          <p class="why-card__desc">A relaxing, well-appointed place to return to at the end of every day.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-water-ladder"></i></div>
          <h3 class="why-card__title">Poolside Relaxation</h3>
          <p class="why-card__desc">Refresh and slow down in peaceful tropical water surroundings.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-film"></i></div>
          <h3 class="why-card__title">Private Entertainment</h3>
          <p class="why-card__desc">Enjoy movie nights with family without leaving the resort premises.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-utensils"></i></div>
          <h3 class="why-card__title">Dining Experiences</h3>
          <p class="why-card__desc">Add comforting breakfasts, Sri Lankan curries, and special meals to your stay.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-heart"></i></div>
          <h3 class="why-card__title">Time Together</h3>
          <p class="why-card__desc">Create space for family, friends, and the people who matter most to you.</p>
        </div>

        <div class="why-card">
          <div class="why-card__icon"><i class="fa-solid fa-star"></i></div>
          <h3 class="why-card__title">Memorable Moments</h3>
          <p class="why-card__desc">Enjoy resort experiences worth remembering long after your holiday ends.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 12 — SIMPLE BOOKING JOURNEY
  ════════════════════════════════════════════════════════════ -->
  <section class="section process-journey-section" aria-label="Simple Booking Process">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">PLAN YOUR EXPERIENCE</span>
        <h2 class="section-title">Your GT HOMES Getaway Is Easy to Arrange</h2>
      </div>

      <div class="process-steps">

        <div class="process-step">
          <div class="process-step__number">01</div>
          <h3 class="process-step__title">Explore</h3>
          <p class="process-step__desc">Discover our 5 rooms, dining menus, swimming pool, and mini cinema experiences.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">02</div>
          <h3 class="process-step__title">Choose</h3>
          <p class="process-step__desc">Select the room and resort experiences that fit your group or getaway style.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">03</div>
          <h3 class="process-step__title">Send Enquiry</h3>
          <p class="process-step__desc">Share your stay dates and preferred experiences with GT HOMES via WhatsApp or email.</p>
        </div>

        <div class="process-step__arrow" aria-hidden="true">
          <i class="fa-solid fa-chevron-right"></i>
        </div>

        <div class="process-step">
          <div class="process-step__number">04</div>
          <h3 class="process-step__title">Confirm</h3>
          <p class="process-step__desc">Our team will communicate directly with you to confirm availability and arrangements.</p>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 13 — EXPLORE MORE (CROSS SELL)
  ════════════════════════════════════════════════════════════ -->
  <section class="section cross-sell-section" aria-label="Continue Exploring GT HOMES">
    <div class="container">
      <div class="section-header">
        <span class="eyebrow">CONTINUE EXPLORING</span>
        <h2 class="section-title">Continue Exploring GT HOMES</h2>
      </div>

      <div class="cross-sell-grid">

        <div class="cross-sell-card">
          <img src="<?= asset('images/home/welcome.jpg') ?>" alt="GT HOMES Rooms" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Rooms &amp; Suites</h3>
            <p>Find the space that feels right for your stay.</p>
            <a href="<?= url('rooms') ?>" class="btn btn--secondary btn--sm">
              Explore Rooms <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/experiences/dining.jpg') ?>" alt="GT HOMES Dining" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Dining &amp; Menu</h3>
            <p>Discover Sri Lankan flavours made for your getaway.</p>
            <a href="<?= url('dining') ?>" class="btn btn--secondary btn--sm">
              Explore Dining <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <div class="cross-sell-card">
          <img src="<?= asset('images/gallery/gallery_1.jpg') ?>" alt="GT HOMES Memories" class="cross-sell-card__img" loading="lazy">
          <div class="cross-sell-card__body">
            <h3>Memories &amp; Gallery</h3>
            <p>See photos from stays, celebrations, and resort moments.</p>
            <a href="<?= url('gallery') ?>" class="btn btn--secondary btn--sm">
              View Gallery <i class="fa-solid fa-arrow-right"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 14 — FINAL CINEMATIC CTA
  ════════════════════════════════════════════════════════════ -->
  <section class="final-cta-section" aria-label="Final Experiences Booking Call to Action">
    <div class="container">
      <div class="final-cta__content">
        <h2 class="final-cta__title">Your Next GT HOMES Experience Starts Here</h2>
        <p class="final-cta__text">
          Stay comfortably. Relax by the pool. Enjoy good food. Watch a movie together. Celebrate the moments that matter.
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
