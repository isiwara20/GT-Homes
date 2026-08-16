/**
 * GT HOMES Holiday Resort — Booking JavaScript
 * File: assets/js/booking.js
 *
 * Responsibilities:
 *  - Date picker validation (check-in/check-out logic)
 *  - WhatsApp booking button generation (Step 2+)
 *  - Guest count UI
 */

'use strict';

// ─────────────────────────────────────────────
// Date Validation: Check-out must be after check-in
// ─────────────────────────────────────────────
(function initDateValidation() {
  const checkInInput  = document.getElementById('check_in_date');
  const checkOutInput = document.getElementById('check_out_date');

  if (!checkInInput || !checkOutInput) return;

  // Set minimum check-in to today
  const today = new Date().toISOString().split('T')[0];
  checkInInput.setAttribute('min', today);

  checkInInput.addEventListener('change', function () {
    const checkInDate = this.value;
    if (checkInDate) {
      // Check-out must be at least 1 day after check-in
      const minCheckOut = new Date(checkInDate);
      minCheckOut.setDate(minCheckOut.getDate() + 1);
      checkOutInput.setAttribute('min', minCheckOut.toISOString().split('T')[0]);

      // Reset check-out if it's before new minimum
      if (checkOutInput.value && checkOutInput.value <= checkInDate) {
        checkOutInput.value = '';
      }
    }
  });
}());

// ─────────────────────────────────────────────
// Night Count Display
// ─────────────────────────────────────────────
(function initNightCount() {
  const checkInInput  = document.getElementById('check_in_date');
  const checkOutInput = document.getElementById('check_out_date');
  const nightDisplay  = document.getElementById('night-count-display');

  if (!checkInInput || !checkOutInput || !nightDisplay) return;

  function updateNights() {
    const checkIn  = checkInInput.value;
    const checkOut = checkOutInput.value;

    if (checkIn && checkOut) {
      const nights = Math.round(
        (new Date(checkOut) - new Date(checkIn)) / (1000 * 60 * 60 * 24)
      );
      if (nights > 0) {
        nightDisplay.textContent = nights + (nights === 1 ? ' night' : ' nights');
        nightDisplay.style.display = 'inline';
        return;
      }
    }
    nightDisplay.style.display = 'none';
  }

  checkInInput.addEventListener('change', updateNights);
  checkOutInput.addEventListener('change', updateNights);
}());
