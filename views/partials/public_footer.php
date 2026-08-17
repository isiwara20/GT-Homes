<?php
/**
 * GT HOMES Holiday Resort — Public Footer Partial
 * File: views/partials/public_footer.php
 */
?>
</div><!-- /.page-content -->

<footer class="public-footer" role="contentinfo">
  <div class="container">
    <div class="public-footer__grid">

      <!-- Column 1: Brand & Logo -->
      <div class="public-footer__brand">
        <a href="<?= url() ?>" class="public-footer__logo-wrapper" aria-label="GT HOMES Holiday Resort">
          <img src="<?= asset('images/branding/Logo.png') ?>" alt="GT HOMES Logo" class="public-footer__logo-img">
        </a>
        <p>A peaceful holiday escape created for comfortable stays, delicious food, private entertainment and beautiful memories in Sri Lanka.</p>

        <div class="public-footer__socials">
          <a href="#" class="public-footer__social-btn" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="public-footer__social-btn" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="public-footer__social-btn" aria-label="TikTok"><i class="fab fa-tiktok"></i></a>
          <a href="<?= e(WhatsAppService::buildContactUrl()) ?>" target="_blank" rel="noopener noreferrer" class="public-footer__social-btn" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>

      <!-- Column 2: Explore -->
      <div>
        <h3 class="public-footer__col-title">Explore</h3>
        <nav class="public-footer__links" aria-label="Footer explore navigation">
          <a href="<?= url() ?>">Home</a>
          <a href="<?= url('rooms') ?>">Rooms &amp; Suites</a>
          <a href="<?= url('dining') ?>">Dining Experience</a>
          <a href="<?= url('experiences') ?>">Resort Experiences</a>
          <a href="<?= url('gallery') ?>">Memories Gallery</a>
        </nav>
      </div>

      <!-- Column 3: Information -->
      <div>
        <h3 class="public-footer__col-title">Information</h3>
        <nav class="public-footer__links" aria-label="Footer information navigation">
          <a href="<?= url('about') ?>">About GT HOMES</a>
          <a href="<?= url('contact') ?>">Contact Us</a>
          <a href="<?= url('booking') ?>">Book Your Stay</a>
          <a href="<?= url('contact') ?>#faq">Frequently Asked Questions</a>
        </nav>
      </div>

      <!-- Column 4: Direct Contact -->
      <div>
        <h3 class="public-footer__col-title">Reservations</h3>
        <div class="public-footer__contact-item">
          <i class="fa-solid fa-phone"></i>
          <div>
            <a href="tel:+94777872280" style="color:var(--white); font-weight:600; text-decoration:none;">0777 872 280</a>
            <div style="font-size:0.75rem; color:rgba(255,255,255,0.5);">Direct Phone &amp; Hotline</div>
          </div>
        </div>
        
        <div class="public-footer__contact-item">
          <i class="fa-solid fa-envelope"></i>
          <div>
            <span style="color:rgba(255,255,255,0.85); font-size:0.85rem;"><?= e(MAIL_ADMIN_ADDRESS) ?></span>
            <div style="font-size:0.75rem; color:rgba(255,255,255,0.5);">Email Inquiries</div>
          </div>
        </div>

        <div class="public-footer__contact-item">
          <i class="fa-solid fa-location-dot"></i>
          <div>
            <span style="color:rgba(255,255,255,0.85); font-size:0.85rem;">GT HOMES Holiday Resort, Sri Lanka</span>
          </div>
        </div>

        <div style="margin-top: 1rem;">
          <a href="<?= e(WhatsAppService::buildContactUrl()) ?>" target="_blank" rel="noopener noreferrer" class="btn btn--whatsapp btn--sm" style="width:100%; justify-content:center;">
            <i class="fab fa-whatsapp"></i> Chat on WhatsApp
          </a>
        </div>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="public-footer__bottom">
      <p class="public-footer__copyright">
        &copy; <?= date('Y') ?> GT HOMES Holiday Resort (Pvt) Ltd. All Rights Reserved.
      </p>
      <div style="display:flex; gap:1.25rem;">
        <a href="<?= url('about') ?>" style="font-size:0.8rem; color:rgba(255,255,255,0.5); text-decoration:none;">About</a>
        <a href="<?= url('contact') ?>" style="font-size:0.8rem; color:rgba(255,255,255,0.5); text-decoration:none;">Contact</a>
        <a href="<?= url('rooms') ?>" style="font-size:0.8rem; color:rgba(255,255,255,0.5); text-decoration:none;">Rooms</a>
      </div>
    </div>
  </div>
</footer>

<!-- Floating WhatsApp Action UX Widget -->
<a href="<?= e(WhatsAppService::buildContactUrl('Hello GT HOMES! I would like to inquire about availability and booking a stay.')) ?>"
   target="_blank"
   rel="noopener noreferrer"
   class="floating-whatsapp"
   aria-label="Direct WhatsApp Reservation">
  <i class="fab fa-whatsapp floating-whatsapp__icon"></i>
  <span class="floating-whatsapp__text">Book on WhatsApp</span>
</a>

<!-- JavaScript Core -->
<script src="<?= asset('js/main.js') ?>"></script>
<?php if (isset($extraJs)): ?>
  <?php foreach ((array) $extraJs as $jsFile): ?>
    <script src="<?= asset('js/' . e($jsFile)) ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
