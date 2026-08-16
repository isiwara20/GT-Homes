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

});
