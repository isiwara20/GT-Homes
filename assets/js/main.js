/**
 * GT HOMES Holiday Resort — Main JavaScript
 * File: assets/js/main.js
 *
 * Vanilla JS only. No jQuery, no frameworks.
 * Responsibilities: navigation scroll effect, mobile menu, global utilities.
 */

'use strict';

// ─────────────────────────────────────────────
// Navigation: transparent → frosted on scroll
// ─────────────────────────────────────────────
(function initNav() {
  const nav = document.getElementById('public-nav');
  if (!nav) return;

  const SCROLL_THRESHOLD = 40;

  function updateNav() {
    if (window.scrollY > SCROLL_THRESHOLD) {
      nav.classList.add('public-nav--scrolled');
      nav.classList.remove('public-nav--transparent');
    } else {
      nav.classList.remove('public-nav--scrolled');
      nav.classList.add('public-nav--transparent');
    }
  }

  // Passive scroll listener for performance
  window.addEventListener('scroll', updateNav, { passive: true });
  updateNav(); // run once on load
}());

// ─────────────────────────────────────────────
// Mobile Menu Toggle
// ─────────────────────────────────────────────
(function initMobileMenu() {
  const toggle  = document.getElementById('nav-hamburger');
  const menu    = document.getElementById('nav-mobile-menu');
  const body    = document.body;

  if (!toggle || !menu) return;

  toggle.addEventListener('click', function () {
    const isOpen = menu.classList.toggle('is-open');
    toggle.setAttribute('aria-expanded', String(isOpen));
    body.style.overflow = isOpen ? 'hidden' : '';
  });

  // Close on outside click
  document.addEventListener('click', function (e) {
    if (!menu.contains(e.target) && !toggle.contains(e.target)) {
      menu.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      body.style.overflow = '';
    }
  });
}());

// ─────────────────────────────────────────────
// Flash Message Auto-Dismiss
// ─────────────────────────────────────────────
(function initFlashMessages() {
  const alerts = document.querySelectorAll('.alert[data-auto-dismiss]');
  alerts.forEach(function (alert) {
    const delay = parseInt(alert.dataset.autoDismiss, 10) || 5000;
    setTimeout(function () {
      alert.style.transition = 'opacity 0.4s ease';
      alert.style.opacity = '0';
      setTimeout(function () { alert.remove(); }, 400);
    }, delay);
  });
}());

// ─────────────────────────────────────────────
// Smooth scroll for anchor links
// ─────────────────────────────────────────────
(function initSmoothScroll() {
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener('click', function (e) {
      const targetId = this.getAttribute('href').slice(1);
      const target   = document.getElementById(targetId);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });
}());
