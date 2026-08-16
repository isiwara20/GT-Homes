<?php
/**
 * GT HOMES — Contact View
 * File: views/public/contact.php
 */
partial('partials/public_header', [
    'pageTitle'       => $pageTitle ?? 'Contact Us — ' . APP_NAME,
    'metaDescription' => $metaDescription ?? 'Contact GT HOMES Holiday Resort.',
    'bodyClass'       => '',
]);
?>
<main id="main-content" role="main">
  <section class="section">
    <div class="container">
      <p class="section-label">Get in Touch</p>
      <h1 class="section-title">Contact Us</h1>
      <div class="divider--lovi"></div>

      <?= flash() ?>

      <div class="grid grid--2" style="gap:3rem; margin-top:2rem; align-items:start;">

        <!-- Contact Form -->
        <div>
          <h2 style="font-size:var(--text-xl); margin-bottom:1.5rem;">Send a Message</h2>
          <form method="POST"
                action="<?= url('contact/submit') ?>"
                data-validate
                id="contact-form"
                novalidate>
            <?= csrf_field() ?>

            <div class="form-group">
              <label for="name" class="form-label form-label--required">Your Name</label>
              <input type="text"
                     id="name"
                     name="name"
                     class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['name'] ?? '') ?>"
                     required
                     maxlength="100"
                     autocomplete="name">
              <?php if (isset($errors['name'])): ?>
                <span id="name-error" class="field-error"><?= e($errors['name']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="email" class="form-label form-label--required">Email Address</label>
              <input type="email"
                     id="email"
                     name="email"
                     class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                     value="<?= e($formData['email'] ?? '') ?>"
                     required
                     autocomplete="email">
              <?php if (isset($errors['email'])): ?>
                <span id="email-error" class="field-error"><?= e($errors['email']) ?></span>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel"
                     id="phone"
                     name="phone"
                     class="form-control"
                     value="<?= e($formData['phone'] ?? '') ?>"
                     autocomplete="tel">
            </div>

            <div class="form-group">
              <label for="subject" class="form-label">Subject</label>
              <input type="text"
                     id="subject"
                     name="subject"
                     class="form-control"
                     value="<?= e($formData['subject'] ?? '') ?>"
                     maxlength="200">
            </div>

            <div class="form-group">
              <label for="message" class="form-label form-label--required">Message</label>
              <textarea id="message"
                        name="message"
                        class="form-control <?= isset($errors['message']) ? 'is-invalid' : '' ?>"
                        rows="5"
                        required
                        maxlength="2000"><?= e($formData['message'] ?? '') ?></textarea>
              <?php if (isset($errors['message'])): ?>
                <span id="message-error" class="field-error"><?= e($errors['message']) ?></span>
              <?php endif; ?>
            </div>

            <button type="submit" class="btn btn--primary btn--lg" id="contact-submit-btn">
              <i class="fa-solid fa-paper-plane" aria-hidden="true"></i>
              Send Message
            </button>
          </form>
        </div>

        <!-- Contact Information -->
        <div>
          <h2 style="font-size:var(--text-xl); margin-bottom:1.5rem;">Contact Information</h2>
          <div style="display:flex; flex-direction:column; gap:1.5rem;">
            <div style="display:flex; gap:1rem; align-items:flex-start;">
              <i class="fa-solid fa-phone" style="color:var(--color-brand-lovi); margin-top:4px; width:20px;"></i>
              <div>
                <strong style="display:block; font-size:var(--text-sm);">Phone</strong>
                <a href="tel:+94777872280" style="color:var(--color-muted);">0777 872 280</a>
              </div>
            </div>
            <div style="display:flex; gap:1rem; align-items:flex-start;">
              <i class="fa-brands fa-whatsapp" style="color:#25D366; margin-top:4px; width:20px;"></i>
              <div>
                <strong style="display:block; font-size:var(--text-sm);">WhatsApp</strong>
                <a href="<?= e(WhatsAppService::buildContactUrl()) ?>"
                   target="_blank"
                   rel="noopener noreferrer"
                   style="color:var(--color-muted);">
                  Chat with us on WhatsApp
                </a>
              </div>
            </div>
            <div style="display:flex; gap:1rem; align-items:flex-start;">
              <i class="fa-solid fa-envelope" style="color:var(--color-brand-lovi); margin-top:4px; width:20px;"></i>
              <div>
                <strong style="display:block; font-size:var(--text-sm);">Email</strong>
                <a href="mailto:<?= e(MAIL_ADMIN_ADDRESS) ?>" style="color:var(--color-muted);"><?= e(MAIL_ADMIN_ADDRESS) ?></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
</main>

<?php partial('partials/public_footer', [], ['extraJs' => ['validation.js']]); ?>
