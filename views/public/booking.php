<?php
/**
 * GT HOMES — Booking Enquiry View
 * File: views/public/booking.php
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Book Your Stay — ' . APP_NAME,
    'metaDescription' => $metaDescription ?? 'Submit a booking enquiry for GT HOMES Holiday Resort.',
]);
?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Reservations</p>
      <h1 class="section-title">Book Your Stay</h1>
      <div class="divider--lovi"></div>

      <?= flash() ?>

      <?php if (!empty($submitted)): ?>
        <!-- Submission Success State -->
        <div class="alert alert--success">
          <strong>Thank you!</strong> Your enquiry has been received. Our team will contact you shortly.
        </div>
        <?php if (!empty($whatsAppUrl)): ?>
          <div style="margin-top:1.5rem;">
            <p style="color:var(--color-muted); margin-bottom:1rem;">
              You can also reach us instantly via WhatsApp:
            </p>
            <a href="<?= e($whatsAppUrl) ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--lg"
               id="whatsapp-booking-btn">
              <i class="fab fa-whatsapp" aria-hidden="true"></i>
              Continue on WhatsApp
            </a>
          </div>
        <?php endif; ?>
      <?php else: ?>
        <!-- Booking Form -->
        <form method="POST"
              action="<?= url('booking/submit') ?>"
              data-validate
              id="booking-form"
              novalidate
              style="max-width:700px;">
          <?= csrf_field() ?>

          <div class="grid grid--2">
            <div class="form-group">
              <label for="full_name" class="form-label form-label--required">Full Name</label>
              <input type="text" id="full_name" name="full_name"
                     class="form-control <?= isset($errors['full_name']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['full_name'] ?? '') ?>"
                     required maxlength="100" autocomplete="name">
              <?php if (isset($errors['full_name'])): ?>
                <span id="full_name-error" class="field-error"><?= e($errors['full_name']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="email" class="form-label form-label--required">Email Address</label>
              <input type="email" id="email" name="email"
                     class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['email'] ?? '') ?>"
                     required autocomplete="email">
              <?php if (isset($errors['email'])): ?>
                <span id="email-error" class="field-error"><?= e($errors['email']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="phone" class="form-label form-label--required">Phone Number</label>
              <input type="tel" id="phone" name="phone"
                     class="form-control <?= isset($errors['phone']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['phone'] ?? '') ?>"
                     required autocomplete="tel" placeholder="07XXXXXXXX">
              <?php if (isset($errors['phone'])): ?>
                <span id="phone-error" class="field-error"><?= e($errors['phone']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="guests" class="form-label form-label--required">Number of Guests</label>
              <input type="number" id="guests" name="guests"
                     class="form-control <?= isset($errors['guests']) ? 'is-invalid' : '' ?>"
                     value="<?= e((string)($formData['guests'] ?? 1)) ?>"
                     min="1" max="20" required>
              <?php if (isset($errors['guests'])): ?>
                <span id="guests-error" class="field-error"><?= e($errors['guests']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="check_in_date" class="form-label form-label--required">Check-In Date</label>
              <input type="date" id="check_in_date" name="check_in_date"
                     class="form-control <?= isset($errors['check_in_date']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['check_in_date'] ?? '') ?>"
                     required>
              <?php if (isset($errors['check_in_date'])): ?>
                <span id="check_in_date-error" class="field-error"><?= e($errors['check_in_date']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="check_out_date" class="form-label form-label--required">
                Check-Out Date
                <span id="night-count-display" style="display:none; font-weight:normal; color:var(--color-brand-lovi); margin-left:8px;"></span>
              </label>
              <input type="date" id="check_out_date" name="check_out_date"
                     class="form-control <?= isset($errors['check_out_date']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['check_out_date'] ?? '') ?>"
                     required>
              <?php if (isset($errors['check_out_date'])): ?>
                <span id="check_out_date-error" class="field-error"><?= e($errors['check_out_date']) ?></span>
              <?php endif; ?>
            </div>
          </div>

          <div class="form-group">
            <label for="special_request" class="form-label">Special Requests</label>
            <textarea id="special_request" name="special_request"
                      class="form-control"
                      rows="3"
                      maxlength="500"
                      placeholder="Any special requests or requirements..."><?= e($formData['special_request'] ?? '') ?></textarea>
          </div>

          <div style="margin-top:1rem; display:flex; gap:1rem; flex-wrap:wrap; align-items:center;">
            <button type="submit" class="btn btn--primary btn--lg" id="booking-submit-btn">
              <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
              Submit Enquiry
            </button>
            <a href="<?= e(WhatsAppService::buildContactUrl('Hello GT HOMES, I would like to make a booking enquiry.')) ?>"
               target="_blank"
               rel="noopener noreferrer"
               class="btn btn--whatsapp btn--lg"
               id="whatsapp-quick-btn">
              <i class="fab fa-whatsapp" aria-hidden="true"></i>
              Book via WhatsApp
            </a>
          </div>

        </form>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php partial('partials/public_footer'); ?>
<script src="<?= asset('js/booking.js') ?>"></script>
<script src="<?= asset('js/validation.js') ?>"></script>
