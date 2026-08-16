/**
 * GT HOMES Holiday Resort — Gallery JavaScript
 * File: assets/js/gallery.js
 *
 * Responsibilities:
 *  - Lightbox image viewer (Step 2+)
 *  - Category filter tabs
 */

'use strict';

// ─────────────────────────────────────────────
// Gallery Filter Tabs
// ─────────────────────────────────────────────
(function initGalleryFilter() {
  const filterBtns = document.querySelectorAll('[data-gallery-filter]');
  const galleryItems = document.querySelectorAll('[data-gallery-category]');

  if (!filterBtns.length) return;

  filterBtns.forEach(function (btn) {
    btn.addEventListener('click', function () {
      const filter = this.dataset.galleryFilter;

      // Update active button
      filterBtns.forEach(b => b.classList.remove('is-active'));
      this.classList.add('is-active');

      // Show/hide items
      galleryItems.forEach(function (item) {
        if (filter === 'all' || item.dataset.galleryCategory === filter) {
          item.style.display = '';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });
}());

// ─────────────────────────────────────────────
// Basic Lightbox (placeholder — full implementation in Step 2+)
// ─────────────────────────────────────────────
(function initLightbox() {
  // TODO: Implement lightbox viewer in gallery step
}());
