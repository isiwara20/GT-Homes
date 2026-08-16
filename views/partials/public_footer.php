<?php
/**
 * GT HOMES — Public Footer Partial
 * File: views/partials/public_footer.php
 */
?>
</div><!-- /.page-content -->

<footer class="public-footer" role="contentinfo">
  <div class="container">
    <div class="public-footer__grid">

      <!-- Brand Column -->
      <div class="public-footer__brand">
        <a href="<?= url() ?>" class="public-nav__logo" aria-label="GT HOMES Holiday Resort">
          <img src="<?= asset('images/branding/logo.png') ?>"
               alt="GT HOMES Logo"
               style="height:48px; border-radius:4px;"
               onerror="this.style.display='none'">
        </a>
        <p>A premier holiday resort destination offering unforgettable experiences, luxurious accommodation, and warm Sri Lankan hospitality.</p>

        <!-- Social Links (icons only, no admin links) -->
        <div style="display:flex; gap:12px; margin-top:16px;">
          <a href="#" aria-label="Facebook" style="color:rgba(255,255,255,0.6); font-size:1.1rem; transition:color 0.2s;">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="#" aria-label="Instagram" style="color:rgba(255,255,255,0.6); font-size:1.1rem; transition:color 0.2s;">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="<?= e(WhatsAppService::buildContactUrl()) ?>"
             target="_blank" rel="noopener noreferrer"
             aria-label="WhatsApp"
             style="color:rgba(255,255,255,0.6); font-size:1.1rem; transition:color 0.2s;">
            <i class="fab fa-whatsapp"></i>
          </a>
        </div>
      </div>

      <!-- Explore Column -->
      <div>
        <h3 class="public-footer__col-title">Explore</h3>
        <nav class="public-footer__links" aria-label="Footer explore navigation">
          <a href="<?= url('rooms') ?>">Rooms &amp; Suites</a>
          <a href="<?= url('dining') ?>">Dining</a>
          <a href="<?= url('experiences') ?>">Experiences</a>
          <a href="<?= url('gallery') ?>">Gallery</a>
          <a href="<?= url('about') ?>">About Us</a>
        </nav>
      </div>

      <!-- Experiences Column -->
      <div>
        <h3 class="public-footer__col-title">Experiences</h3>
        <nav class="public-footer__links" aria-label="Footer experiences navigation">
          <a href="<?= url('experiences') ?>#pool">Swimming Pool</a>
          <a href="<?= url('experiences') ?>#cinema">Mini Cinema</a>
          <a href="<?= url('experiences') ?>#activities">Activities</a>
          <a href="<?= url('gallery') ?>#special">Special Memories</a>
        </nav>
      </div>

      <!-- Contact Column -->
      <div>
        <h3 class="public-footer__col-title">Contact</h3>
        <div class="public-footer__links">
          <a href="tel:+94777872280">
            <i class="fa-solid fa-phone" style="width:16px;"></i>
            0777 872 280
          </a>
          <a href="mailto:<?= e(MAIL_ADMIN_ADDRESS) ?>">
            <i class="fa-solid fa-envelope" style="width:16px;"></i>
            <?= e(MAIL_ADMIN_ADDRESS) ?>
          </a>
          <a href="<?= url('contact') ?>">
            <i class="fa-solid fa-location-dot" style="width:16px;"></i>
            Get Directions
          </a>
          <a href="<?= url('booking') ?>" class="btn btn--accent btn--sm" style="margin-top:8px; display:inline-flex;">
            <i class="fa-solid fa-calendar-check"></i>
            Book Your Stay
          </a>
        </div>
      </div>

    </div><!-- /.public-footer__grid -->

    <!-- Bottom Bar -->
    <div class="public-footer__bottom">
      <p class="public-footer__copyright">
        &copy; <?= date('Y') ?> <?= e(APP_NAME) ?> (Pvt) Ltd. All rights reserved.
      </p>
      <div style="display:flex; gap:16px;">
        <a href="<?= url('contact') ?>" style="font-size:0.75rem; color:rgba(255,255,255,0.4);">Contact</a>
        <a href="<?= url('about') ?>"   style="font-size:0.75rem; color:rgba(255,255,255,0.4);">About</a>
      </div>
    </div>

  </div><!-- /.container -->
</footer>

<!-- JavaScript -->
<script src="<?= asset('js/main.js') ?>"></script>
<?php if (isset($extraJs)): ?>
  <?php foreach ((array) $extraJs as $jsFile): ?>
    <script src="<?= asset('js/' . e($jsFile)) ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
