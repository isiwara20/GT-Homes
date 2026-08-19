/**
 * GT HOMES Holiday Resort — Admin JavaScript
 * File: assets/js/admin.js
 *
 * Vanilla JS only. Handles admin panel interactions.
 */

'use strict';

// ─────────────────────────────────────────────
// Admin Sidebar Toggle (mobile)
// ─────────────────────────────────────────────
(function initAdminSidebar() {
  document.addEventListener('click', function (e) {
    const toggleBtn = e.target.closest('#admin-sidebar-toggle');
    const sidebar   = document.getElementById('admin-sidebar');
    const overlay   = document.getElementById('admin-overlay');

    if (toggleBtn && sidebar) {
      e.stopPropagation();
      const isOpen = sidebar.classList.toggle('is-open');
      if (overlay) overlay.style.display = isOpen ? 'block' : 'none';
      toggleBtn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      return;
    }

    if (overlay && e.target === overlay) {
      if (sidebar) sidebar.classList.remove('is-open');
      overlay.style.display = 'none';
    }
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      const sidebar = document.getElementById('admin-sidebar');
      const overlay = document.getElementById('admin-overlay');
      if (sidebar && sidebar.classList.contains('is-open')) {
        sidebar.classList.remove('is-open');
        if (overlay) overlay.style.display = 'none';
      }
    }
  });
}());

// ─────────────────────────────────────────────
// Confirm Delete Dialogs
// ─────────────────────────────────────────────
(function initDeleteConfirm() {
  document.querySelectorAll('[data-confirm]').forEach(function (el) {
    el.addEventListener('click', function (e) {
      const message = this.dataset.confirm || 'Are you sure you want to delete this item?';
      if (!confirm(message)) {
        e.preventDefault();
      }
    });
  });
}());

// ─────────────────────────────────────────────
// Admin Alert Auto-Dismiss
// ─────────────────────────────────────────────
(function initAdminAlerts() {
  document.querySelectorAll('.alert[data-auto-dismiss]').forEach(function (alert) {
    const delay = parseInt(alert.dataset.autoDismiss, 10) || 4000;
    setTimeout(function () {
      alert.style.opacity = '0';
      alert.style.transition = 'opacity 0.3s ease';
      setTimeout(() => alert.remove(), 300);
    }, delay);
  });
}());
