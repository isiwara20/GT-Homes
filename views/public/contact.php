<?php
/**
 * GT HOMES Holiday Resort — Contact Us View
 * File: views/public/contact.php
 *
 * Data available:
 *   $pageTitle       (string)
 *   $metaDescription (string)
 *   $errors          (array<string, string>|null)
 *   $formData        (array<string, string>|null)
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Contact Us | GT HOMES Holiday Resort',
    'metaDescription' => $metaDescription ?? 'Get in touch with GT HOMES Holiday Resort (Pvt) Ltd for room availability, mini cinema bookings, dining inquiries, and special celebrations.',
]);
?>

<main id="main-content" role="main">

  <!-- ════════════════════════════════════════════════════════════
       PAGE HEADER — CONTACT US
  ════════════════════════════════════════════════════════════ -->
  <header class="page-header page-header--has-bg">
    <img src="<?= asset('images/home/cta_bg.jpg') ?>"
         alt="GT HOMES Resort Grounds &amp; Contact Desk"
         class="page-header__bg-img"
         loading="eager">
    <div class="page-header__overlay"></div>

    <div class="container page-header__container">
      <span class="eyebrow eyebrow--light">GET IN TOUCH</span>
      <h1 class="page-header__title page-header__title--light">We Would Love to Hear From You</h1>
      <p class="page-header__desc page-header__desc--light">
        Have questions about room availability, private mini cinema bookings, or special Sri Lankan dining arrangements? Contact our friendly resort team today.
      </p>
    </div>
  </header>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 01 — QUICK CONTACT CHANNELS GRID
  ════════════════════════════════════════════════════════════ -->
  <section class="section contact-channels-section" aria-label="Contact Channels">
    <div class="container">
      <?= flash() ?>

      <div class="contact-channels-grid">

        <div class="contact-channel-card">
          <div class="contact-channel-card__icon contact-channel-card__icon--lovi">
            <i class="fa-solid fa-phone" aria-hidden="true"></i>
          </div>
          <h3 class="contact-channel-card__title">Phone Hotline</h3>
          <p class="contact-channel-card__text">Call us directly for instant room and resort inquiries.</p>
          <a href="tel:+94777872280" class="contact-channel-card__link">
            0777 872 280
          </a>
        </div>

        <div class="contact-channel-card contact-channel-card--highlight">
          <div class="contact-channel-card__icon contact-channel-card__icon--whatsapp">
            <i class="fab fa-whatsapp" aria-hidden="true"></i>
          </div>
          <h3 class="contact-channel-card__title">WhatsApp Instant Chat</h3>
          <p class="contact-channel-card__text">Fastest response for availability, rates, and special requests.</p>
          <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I would like to inquire about resort bookings.') ?>"
             target="_blank"
             rel="noopener noreferrer"
             class="btn btn--whatsapp btn--sm"
             style="margin-top: 0.5rem;">
            <i class="fab fa-whatsapp" aria-hidden="true"></i> Chat on WhatsApp
          </a>
        </div>

        <div class="contact-channel-card">
          <div class="contact-channel-card__icon contact-channel-card__icon--lovi">
            <i class="fa-solid fa-envelope" aria-hidden="true"></i>
          </div>
          <h3 class="contact-channel-card__title">Email Address</h3>
          <p class="contact-channel-card__text">Send us an email for detailed group booking inquiries.</p>
          <a href="mailto:gthomesresort@gmail.com" class="contact-channel-card__link">
            gthomesresort@gmail.com
          </a>
        </div>

        <div class="contact-channel-card">
          <div class="contact-channel-card__icon contact-channel-card__icon--lovi">
            <i class="fa-solid fa-location-dot" aria-hidden="true"></i>
          </div>
          <h3 class="contact-channel-card__title">Resort Location</h3>
          <p class="contact-channel-card__text">GT HOMES Holiday Resort (Pvt) Ltd, Sri Lanka.</p>
          <span class="contact-channel-card__link" style="color: var(--charcoal);">
            Sri Lanka
          </span>
        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 02 — MAIN CONTACT FORM & SIDEBAR
  ════════════════════════════════════════════════════════════ -->
  <section class="section section--surface contact-main-section" aria-label="Send Message or Inquiry">
    <div class="container">
      <div class="contact-main-grid">

        <!-- Contact Form Box -->
        <div class="contact-form-card">
          <div class="contact-form-card__header">
            <span class="eyebrow">SEND A MESSAGE</span>
            <h2 class="contact-form-card__title">Direct Inquiry Form</h2>
            <p class="contact-form-card__desc">
              Fill out your details below and our team will respond to your request promptly.
            </p>
          </div>

          <form method="POST"
                action="<?= url('contact') ?>"
                data-validate
                id="contact-form"
                class="contact-form"
                novalidate>
            <?= csrf_field() ?>

            <div class="contact-form-row">
              <div class="form-group">
                <label for="name" class="form-label form-label--required">
                  <i class="fa-solid fa-user" aria-hidden="true"></i> Full Name
                </label>
                <input type="text"
                       id="name"
                       name="name"
                       class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                       value="<?= e($formData['name'] ?? '') ?>"
                       placeholder="e.g. Nimal Perera"
                       required
                       maxlength="100"
                       autocomplete="name">
                <?php if (isset($errors['name'])): ?>
                  <span id="name-error" class="field-error"><?= e($errors['name']) ?></span>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="phone" class="form-label">
                  <i class="fa-solid fa-phone" aria-hidden="true"></i> Phone Number
                </label>
                <input type="tel"
                       id="phone"
                       name="phone"
                       class="form-control"
                       value="<?= e($formData['phone'] ?? '') ?>"
                       placeholder="e.g. 077 123 4567"
                       autocomplete="tel">
              </div>
            </div>

            <div class="contact-form-row">
              <div class="form-group">
                <label for="email" class="form-label form-label--required">
                  <i class="fa-solid fa-envelope" aria-hidden="true"></i> Email Address
                </label>
                <input type="email"
                       id="email"
                       name="email"
                       class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                       value="<?= e($formData['email'] ?? '') ?>"
                       placeholder="name@example.com"
                       required
                       autocomplete="email">
                <?php if (isset($errors['email'])): ?>
                  <span id="email-error" class="field-error"><?= e($errors['email']) ?></span>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="subject" class="form-label">
                  <i class="fa-solid fa-tag" aria-hidden="true"></i> Inquiry Subject
                </label>
                <select id="subject" name="subject" class="form-control">
                  <option value="General Inquiry" selected>General Inquiry</option>
                  <option value="Room Booking">Room Booking &amp; Rates</option>
                  <option value="Mini Cinema Reservation">Private Mini Cinema Reservation</option>
                  <option value="Dining & Special Meals">Dining &amp; Special Meals</option>
                  <option value="Special Celebration">Birthday / Special Event</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="message" class="form-label form-label--required">
                <i class="fa-solid fa-comment-dots" aria-hidden="true"></i> Your Message or Request
              </label>
              <textarea id="message"
                        name="message"
                        class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                        rows="5"
                        placeholder="Please tell us about your planned stay dates, guest count, or any specific questions..."
                        required
                        maxlength="2000"><?= e($formData['message'] ?? '') ?></textarea>
              <?php if (isset($errors['message'])): ?>
                <span id="message-error" class="field-error"><?= e($errors['message']) ?></span>
              <?php endif; ?>
            </div>

            <div class="contact-form-submit">
              <button type="submit" class="btn btn--primary btn--xl" id="contact-submit-btn" style="width: 100%;">
                <i class="fa-solid fa-paper-plane" aria-hidden="true"></i> Send Inquiry Message
              </button>
            </div>
          </form>
        </div>

        <!-- Sidebar Info Card -->
        <div class="contact-info-sidebar">

          <!-- WhatsApp Box -->
          <div class="contact-sidebar-card contact-sidebar-card--wa">
            <div class="contact-sidebar-card__header">
              <i class="fab fa-whatsapp" aria-hidden="true"></i>
              <div>
                <h4>Prefer Instant Messaging?</h4>
                <p>Chat directly with our reception team on WhatsApp.</p>
              </div>
            </div>
            <a href="https://wa.me/94777872280?text=<?= urlencode('Hello GT HOMES! I am inquiring from your Contact page.') ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--lg"
               style="width: 100%; margin-top: 1rem;">
              <i class="fab fa-whatsapp" aria-hidden="true"></i> Start WhatsApp Chat
            </a>
          </div>

          <!-- Operating Hours & Policies Box -->
          <div class="contact-sidebar-card">
            <h4 class="contact-sidebar-title"><i class="fa-solid fa-clock" aria-hidden="true"></i> Resort Timings</h4>
            <ul class="contact-timing-list">
              <li>
                <span>Reception &amp; Contact Line</span>
                <strong>24 / 7 Available</strong>
              </li>
              <li>
                <span>Standard Check-In</span>
                <strong>2:00 PM</strong>
              </li>
              <li>
                <span>Standard Check-Out</span>
                <strong>11:00 AM</strong>
              </li>
              <li>
                <span>Swimming Pool Hours</span>
                <strong>7:00 AM – 8:00 PM</strong>
              </li>
              <li>
                <span>Mini Cinema Screenings</span>
                <strong>By Reservation</strong>
              </li>
            </ul>
          </div>

          <!-- Common Inquiry Topics Box -->
          <div class="contact-sidebar-card">
            <h4 class="contact-sidebar-title"><i class="fa-solid fa-circle-info" aria-hidden="true"></i> Frequently Asked</h4>
            <div class="contact-faq-item">
              <strong>How do I check room availability?</strong>
              <p>You can use our website booking form or contact us directly on WhatsApp for live availability.</p>
            </div>
            <div class="contact-faq-item">
              <strong>Are meals included or available on request?</strong>
              <p>Fresh Sri Lankan breakfasts, lunches, and special dinners are prepared on request.</p>
            </div>
          </div>

        </div>

      </div>
    </div>
  </section>

  <!-- ════════════════════════════════════════════════════════════
       SECTION 03 — CROSS SELL CARDS
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

</main>

<?php partial('partials/public_footer', [], ['extraJs' => ['validation.js']]); ?>
