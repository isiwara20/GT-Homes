/**
 * GT HOMES Holiday Resort — Client-Side Validation
 * File: assets/js/validation.js
 *
 * Progressive enhancement: client-side validation on forms.
 * Server-side validation in BLL always takes precedence.
 */

'use strict';

// ─────────────────────────────────────────────
// Generic Form Validator
// ─────────────────────────────────────────────
(function initFormValidation() {
  const forms = document.querySelectorAll('[data-validate]');

  forms.forEach(function (form) {
    form.addEventListener('submit', function (e) {
      let isValid = true;

      // Clear previous errors
      form.querySelectorAll('.field-error').forEach(el => el.textContent = '');
      form.querySelectorAll('.form-control').forEach(el => el.classList.remove('is-invalid'));

      // Required fields
      form.querySelectorAll('[required]').forEach(function (field) {
        if (!field.value.trim()) {
          isValid = false;
          showError(field, 'This field is required.');
        }
      });

      // Email fields
      form.querySelectorAll('[type="email"]').forEach(function (field) {
        if (field.value && !isValidEmail(field.value)) {
          isValid = false;
          showError(field, 'Please enter a valid email address.');
        }
      });

      if (!isValid) {
        e.preventDefault();
        // Scroll to first error
        const firstError = form.querySelector('.is-invalid');
        if (firstError) {
          firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
          firstError.focus();
        }
      }
    });
  });

  function showError(field, message) {
    field.classList.add('is-invalid');
    const errorEl = document.getElementById(field.id + '-error')
                 || field.parentElement.querySelector('.field-error');
    if (errorEl) {
      errorEl.textContent = message;
    }
  }

  function isValidEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }
}());
