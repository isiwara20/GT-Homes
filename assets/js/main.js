/**
 * GT HOMES Holiday Resort — Main JavaScript
 * File: assets/js/main.js
 *
 * Vanilla JS only. High performance, zero dependencies.
 */

'use strict';

document.addEventListener('DOMContentLoaded', function () {
  
  // 1. Sticky Navigation Blur & Shadow Transition
  (function initNavScroll() {
    const nav = document.getElementById('public-nav');
    if (!nav) return;

    const threshold = 30;

    function handleScroll() {
      if (window.scrollY > threshold) {
        nav.classList.add('public-nav--scrolled');
        nav.classList.remove('public-nav--transparent');
      } else {
        nav.classList.remove('public-nav--scrolled');
        nav.classList.add('public-nav--transparent');
      }
    }

    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
  }());

  // 2. Mobile Drawer Navigation
  (function initMobileDrawer() {
    const hamburger = document.getElementById('nav-hamburger');
    const drawer    = document.getElementById('nav-mobile-drawer');
    const backdrop  = document.getElementById('nav-mobile-backdrop');
    const closeBtn  = document.getElementById('nav-drawer-close');

    if (!hamburger || !drawer || !backdrop) return;

    function openDrawer() {
      drawer.classList.add('is-open');
      backdrop.classList.add('is-open');
      hamburger.setAttribute('aria-expanded', 'true');
      document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
      drawer.classList.remove('is-open');
      backdrop.classList.remove('is-open');
      hamburger.setAttribute('aria-expanded', 'false');
      document.body.style.overflow = '';
    }

    hamburger.addEventListener('click', openDrawer);
    if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
    backdrop.addEventListener('click', closeDrawer);

    // Close on Escape key
    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) {
        closeDrawer();
      }
    });
  }());

  // 3. Smooth Scroll for Anchor Links
  (function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener('click', function (e) {
        const href = this.getAttribute('href');
        if (href === '#' || href === '#!') return;
        const target = document.querySelector(href);
        if (target) {
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
      });
    });
  }());

  // 4. Booking Panel Interactivity
  (function initBookingPanel() {
    const form = document.getElementById('hero-booking-form');
    if (!form) return;

    // Set default checkin date to today, checkout to tomorrow if empty
    const checkinInput  = form.querySelector('input[name="check_in"]');
    const checkoutInput = form.querySelector('input[name="check_out"]');

    if (checkinInput && !checkinInput.value) {
      const today = new Date();
      checkinInput.value = today.toISOString().split('T')[0];
      checkinInput.min = checkinInput.value;
    }

    if (checkoutInput && !checkoutInput.value && checkinInput) {
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      checkoutInput.value = tomorrow.toISOString().split('T')[0];
      checkoutInput.min = checkinInput.value;
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const room = form.querySelector('select[name="room"]')?.value || 'any';
      const checkIn = checkinInput?.value || '';
      const checkOut = checkoutInput?.value || '';
      const guests = form.querySelector('select[name="guests"]')?.value || '2';

      // Redirect to booking view or WhatsApp with prefilled message
      const msg = `Hello GT HOMES! I would like to check availability for:\n- Check-in: ${checkIn}\n- Check-out: ${checkOut}\n- Guests: ${guests}\n- Preferred Room: ${room}`;
      const waUrl = `https://wa.me/94777872280?text=${encodeURIComponent(msg)}`;
      window.open(waUrl, '_blank');
    });
  }());

  // 5. Room Filter Navigation Interactivity
  (function initRoomFilter() {
    const filterBtns = document.querySelectorAll('.room-filter__btn');
    const roomItems  = document.querySelectorAll('[data-room-item]');

    if (!filterBtns.length || !roomItems.length) return;

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = this.getAttribute('data-filter');

        // Toggle Active Button State
        filterBtns.forEach(function (b) {
          b.classList.remove('room-filter__btn--active');
          b.setAttribute('aria-selected', 'false');
        });
        this.classList.add('room-filter__btn--active');
        this.setAttribute('aria-selected', 'true');

        // Filter Rooms Collection
        roomItems.forEach(function (item) {
          const itemKey = item.getAttribute('data-room-item');
          if (filter === 'all' || filter === itemKey) {
            item.style.display = 'grid';
            item.style.opacity = '1';
          } else {
            item.style.display = 'none';
            item.style.opacity = '0';
          }
        });
      });
    });
  }());

  // 6. Rooms Page Booking Search Form
  (function initRoomsBookingForm() {
    const form = document.getElementById('rooms-booking-form');
    if (!form) return;

    const checkinInput  = form.querySelector('input[name="check_in"]');
    const checkoutInput = form.querySelector('input[name="check_out"]');

    if (checkinInput && !checkinInput.value) {
      const today = new Date();
      checkinInput.value = today.toISOString().split('T')[0];
      checkinInput.min = checkinInput.value;
    }

    if (checkoutInput && !checkoutInput.value && checkinInput) {
      const tomorrow = new Date();
      tomorrow.setDate(tomorrow.getDate() + 1);
      checkoutInput.value = tomorrow.toISOString().split('T')[0];
      checkoutInput.min = checkinInput.value;
    }

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const room = form.querySelector('select[name="room"]')?.value || 'any';
      const checkIn = checkinInput?.value || '';
      const checkOut = checkoutInput?.value || '';
      const guests = form.querySelector('select[name="guests"]')?.value || '2';

      const msg = `Hello GT HOMES! I am on the Rooms page and would like to check availability for:\n- Preferred Room: ${room.toUpperCase()}\n- Check-in: ${checkIn}\n- Check-out: ${checkOut}\n- Guests: ${guests}`;
      const waUrl = `https://wa.me/94777872280?text=${encodeURIComponent(msg)}`;
      window.open(waUrl, '_blank');
    });
  }());

  // 7. Dining Menu Category Navigation Interactivity
  (function initMenuCategoryFilter() {
    const categoryBtns = document.querySelectorAll('.menu-category-btn');
    const menuBlocks   = document.querySelectorAll('[data-menu-block]');

    if (!categoryBtns.length || !menuBlocks.length) return;

    categoryBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = this.getAttribute('data-menu-filter');

        // Active State Toggle
        categoryBtns.forEach(function (b) {
          b.classList.remove('menu-category-btn--active');
          b.setAttribute('aria-selected', 'false');
        });
        this.classList.add('menu-category-btn--active');
        this.setAttribute('aria-selected', 'true');

        // Filter Blocks Display
        menuBlocks.forEach(function (block) {
          const blockKey = block.getAttribute('data-menu-block');
          if (filter === 'all' || filter === blockKey) {
            block.style.display = 'block';
            block.style.opacity = '1';
          } else {
            block.style.display = 'none';
            block.style.opacity = '0';
          }
        });
      });
    });
  }());

  // 8. Gallery Category Navigation Interactivity
  (function initGalleryFilter() {
    const filterBtns   = document.querySelectorAll('.gallery-filter-btn');
    const galleryItems = document.querySelectorAll('[data-gallery-item]');

    if (!filterBtns.length || !galleryItems.length) return;

    filterBtns.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const filter = this.getAttribute('data-gallery-filter');

        filterBtns.forEach(function (b) {
          b.classList.remove('gallery-filter-btn--active');
          b.setAttribute('aria-selected', 'false');
        });
        this.classList.add('gallery-filter-btn--active');
        this.setAttribute('aria-selected', 'true');

        galleryItems.forEach(function (item) {
          const itemKey = item.getAttribute('data-gallery-item');
          if (filter === 'all' || filter === itemKey) {
            item.style.display = 'block';
            item.style.opacity = '1';
          } else {
            item.style.display = 'none';
            item.style.opacity = '0';
          }
        });
      });
    });
  }());

  // 9. Gallery Lightbox Modal Interactivity
  (function initGalleryLightbox() {
    const modal    = document.getElementById('gallery-lightbox');
    const backdrop = document.getElementById('lightbox-backdrop');
    const closeBtn = document.getElementById('lightbox-close');
    const imgEl    = document.getElementById('lightbox-img');
    const titleEl  = document.getElementById('lightbox-title');
    const descEl   = document.getElementById('lightbox-desc');
    const triggers = document.querySelectorAll('[data-lightbox-trigger]');

    if (!modal || !triggers.length) return;

    function openLightbox(src, title, desc) {
      if (imgEl) { imgEl.src = src; imgEl.alt = title; }
      if (titleEl) titleEl.textContent = title;
      if (descEl) descEl.textContent = desc;
      modal.classList.add('is-open');
      modal.setAttribute('aria-hidden', 'false');
      document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
      modal.classList.remove('is-open');
      modal.setAttribute('aria-hidden', 'true');
      document.body.style.overflow = '';
    }

    triggers.forEach(function (btn) {
      btn.addEventListener('click', function () {
        const src = this.getAttribute('data-img-src') || '';
        const title = this.getAttribute('data-img-title') || '';
        const desc = this.getAttribute('data-img-desc') || '';
        openLightbox(src, title, desc);
      });
    });

    if (closeBtn) closeBtn.addEventListener('click', closeLightbox);
    if (backdrop) backdrop.addEventListener('click', closeLightbox);

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && modal.classList.contains('is-open')) {
        closeLightbox();
      }
    });
  }());

});
