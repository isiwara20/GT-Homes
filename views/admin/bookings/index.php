<?php
/**
 * GT HOMES — Admin Booking Enquiries View
 * File: views/admin/bookings/index.php
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Booking Enquiries']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<div class="admin-main">

  <header class="admin-topbar">
    <h1 class="admin-topbar__title">Guest Booking Enquiries</h1>
    <div style="display:flex; align-items:center; gap:1rem;">
      <span style="font-size:var(--text-sm); color:rgba(255,255,255,0.6);">
        <?= date('l, d F Y') ?>
      </span>
    </div>
  </header>

  <main class="admin-body">

    <?= flash() ?>

    <!-- Summary Stats Bar -->
    <div class="grid grid--4" style="margin-bottom:2rem;">
      <div class="admin-stat">
        <div class="admin-stat__value"><?= $stats['total'] ?? 0 ?></div>
        <div class="admin-stat__label"><i class="fa-solid fa-list-check" style="margin-right:4px;"></i>Total Enquiries</div>
      </div>
      <div class="admin-stat" style="border-left: 4px solid #f59e0b;">
        <div class="admin-stat__value" style="color:#f59e0b;"><?= $stats['pending'] ?? 0 ?></div>
        <div class="admin-stat__label"><i class="fa-solid fa-clock" style="margin-right:4px;"></i>Pending Review</div>
      </div>
      <div class="admin-stat" style="border-left: 4px solid #3b82f6;">
        <div class="admin-stat__value" style="color:#3b82f6;"><?= $stats['contacted'] ?? 0 ?></div>
        <div class="admin-stat__label"><i class="fa-solid fa-comments" style="margin-right:4px;"></i>Contacted Guest</div>
      </div>
      <div class="admin-stat" style="border-left: 4px solid #10b981;">
        <div class="admin-stat__value" style="color:#10b981;"><?= $stats['confirmed'] ?? 0 ?></div>
        <div class="admin-stat__label"><i class="fa-solid fa-circle-check" style="margin-right:4px;"></i>Confirmed Stays</div>
      </div>
    </div>

    <!-- Filters & Search Toolbar -->
    <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.2); border-radius:var(--radius-xl); padding:1.25rem; margin-bottom:1.5rem; display:flex; gap:1rem; flex-wrap:wrap; align-items:center; justify-space-between;">
      
      <!-- Filter Pills -->
      <div style="display:flex; gap:0.5rem; flex-wrap:wrap;">
        <?php
        $filters = ['ALL' => 'All Enquiries', 'PENDING' => 'Pending', 'CONTACTED' => 'Contacted', 'CONFIRMED' => 'Confirmed', 'CANCELLED' => 'Cancelled'];
        foreach ($filters as $key => $label):
          $active = ($statusFilter === $key) ? 'background:var(--color-brand-lovi); color:white;' : 'background:rgba(255,255,255,0.06); color:rgba(255,255,255,0.7);';
        ?>
          <a href="<?= url('admin/bookings?status=' . $key . '&search=' . urlencode($searchQuery)) ?>" 
             style="padding:0.4rem 0.85rem; border-radius:var(--radius-full); text-decoration:none; font-size:0.85rem; font-weight:600; transition:all 0.2s; <?= $active ?>">
            <?= $label ?>
          </a>
        <?php endforeach; ?>
      </div>

      <!-- Search Form -->
      <form action="<?= url('admin/bookings') ?>" method="GET" style="display:flex; gap:0.5rem; margin-left:auto;">
        <input type="hidden" name="status" value="<?= e($statusFilter) ?>">
        <input type="text" name="search" value="<?= e($searchQuery) ?>" placeholder="Search guest name, email, phone..." 
               style="background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.15); color:white; padding:0.4rem 0.85rem; border-radius:var(--radius-md); font-size:0.85rem; min-width:220px;">
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-magnifying-glass"></i> Search</button>
      </form>

    </div>

    <!-- Enquiries Data Table -->
    <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.2); border-radius:var(--radius-xl); overflow:hidden;">
      <?php if (empty($enquiries)): ?>
        <div style="padding:3rem; text-align:center; color:rgba(255,255,255,0.5);">
          <i class="fa-solid fa-inbox" style="font-size:2.5rem; margin-bottom:1rem; opacity:0.5;"></i>
          <p>No booking enquiries found matching your query.</p>
        </div>
      <?php else: ?>
        <div style="overflow-x:auto;">
          <table style="width:100%; border-collapse:collapse; text-align:left; font-size:0.9rem;">
            <thead>
              <tr style="background:rgba(116,27,56,0.25); color:var(--color-brand-yellow); border-bottom:1px solid rgba(255,255,255,0.1);">
                <th style="padding:1rem;">ID &amp; Date</th>
                <th style="padding:1rem;">Guest Info</th>
                <th style="padding:1rem;">Stay Dates</th>
                <th style="padding:1rem;">Room &amp; Guests</th>
                <th style="padding:1rem;">Status</th>
                <th style="padding:1rem; text-align:right;">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($enquiries as $enq): ?>
                <?php
                $statusClass = match($enq['status'] ?? 'PENDING') {
                  'CONFIRMED' => 'background:#064e3b; color:#34d399;',
                  'CONTACTED' => 'background:#1e3a8a; color:#60a5fa;',
                  'CANCELLED' => 'background:#7f1d1d; color:#f87171;',
                  default     => 'background:#78350f; color:#fbbf24;',
                };
                $waPhone = preg_replace('/[^0-9]/', '', $enq['phone'] ?? '');
                if (str_starts_with($waPhone, '0')) $waPhone = '94' . substr($waPhone, 1);
                $waUrl   = "https://wa.me/{$waPhone}?text=" . urlencode("Hello {$enq['full_name']}! Thank you for inquiring about your stay at GT HOMES Holiday Resort.");
                ?>
                <tr style="border-bottom:1px solid rgba(255,255,255,0.06); transition:background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.02)'" onmouseout="this.style.background='transparent'">
                  <td style="padding:1rem;">
                    <strong style="color:white; display:block;">#<?= $enq['id'] ?></strong>
                    <span style="font-size:0.78rem; color:rgba(255,255,255,0.5);"><?= date('d M Y', strtotime($enq['created_at'] ?? 'now')) ?></span>
                  </td>

                  <td style="padding:1rem;">
                    <strong style="color:white; display:block;"><?= e($enq['full_name']) ?></strong>
                    <span style="font-size:0.8rem; color:rgba(255,255,255,0.6); display:block;"><?= e($enq['phone']) ?></span>
                    <span style="font-size:0.78rem; color:rgba(255,255,255,0.4);"><?= e($enq['email']) ?></span>
                  </td>

                  <td style="padding:1rem;">
                    <div style="font-size:0.85rem; color:white;">
                      <i class="fa-solid fa-calendar-day" style="color:var(--color-brand-yellow);"></i> <?= date('d M Y', strtotime($enq['check_in_date'])) ?>
                    </div>
                    <div style="font-size:0.8rem; color:rgba(255,255,255,0.5);">
                      to <?= date('d M Y', strtotime($enq['check_out_date'])) ?>
                    </div>
                  </td>

                  <td style="padding:1rem;">
                    <span style="color:var(--color-brand-yellow); font-weight:600;"><?= e($enq['room_name'] ?? 'Resort Suite') ?></span>
                    <span style="font-size:0.8rem; color:rgba(255,255,255,0.6); display:block;"><?= e((string)$enq['guests']) ?> Guests</span>
                  </td>

                  <td style="padding:1rem;">
                    <span style="padding:0.25rem 0.65rem; border-radius:var(--radius-full); font-size:0.75rem; font-weight:700; display:inline-block; <?= $statusClass ?>">
                      <?= e($enq['status']) ?>
                    </span>
                    <?php if (!empty($enq['admin_notes'])): ?>
                      <div style="font-size:0.75rem; color:rgba(255,255,255,0.5); margin-top:0.35rem;" title="<?= e($enq['admin_notes']) ?>">
                        <i class="fa-solid fa-note-sticky"></i> <?= e(substr($enq['admin_notes'], 0, 25)) ?>...
                      </div>
                    <?php endif; ?>
                  </td>

                  <td style="padding:1rem; text-align:right;">
                    <div style="display:flex; gap:0.4rem; justify-content:flex-end;">
                      <a href="<?= $waUrl ?>" target="_blank" class="btn btn--whatsapp btn--sm" title="Chat via WhatsApp">
                        <i class="fab fa-whatsapp"></i>
                      </a>
                      <button type="button" class="btn btn--secondary btn--sm" 
                              onclick="openUpdateModal(<?= $enq['id'] ?>, '<?= e($enq['full_name']) ?>', '<?= e($enq['status']) ?>', '<?= e(addslashes($enq['admin_notes'] ?? '')) ?>')">
                        <i class="fa-solid fa-pen"></i> Update
                      </button>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </div>

  </main>
</div>

<!-- Edit Status Modal -->
<div id="status-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.75); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center;">
  <div style="background:#1E1129; border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:2rem; width:90%; max-width:450px; color:white; position:relative;">
    <h3 style="margin-bottom:1rem; color:var(--color-brand-yellow);" id="modal-title">Update Enquiry #</h3>
    
    <form action="<?= url('admin/bookings') ?>" method="POST">
      <input type="hidden" name="action" value="update_status">
      <input type="hidden" name="enquiry_id" id="modal-enquiry-id">

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.4rem;">Enquiry Status:</label>
        <select name="status" id="modal-status-select" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.6rem; border-radius:var(--radius-md);">
          <option value="PENDING">PENDING — Needs Review</option>
          <option value="CONTACTED">CONTACTED — Guest Sent Quote</option>
          <option value="CONFIRMED">CONFIRMED — Stay Reserved</option>
          <option value="CANCELLED">CANCELLED — Enquiry Closed</option>
          <option value="COMPLETED">COMPLETED — Guest Stayed</option>
        </select>
      </div>

      <div style="margin-bottom:1.5rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.4rem;">Internal Admin Notes:</label>
        <textarea name="admin_notes" id="modal-notes" rows="3" placeholder="Add room preference notes or WhatsApp conversation summary..." 
                  style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.6rem; border-radius:var(--radius-md); font-size:0.85rem;"></textarea>
      </div>

      <div style="display:flex; justify-content:flex-end; gap:0.75rem;">
        <button type="button" onclick="closeUpdateModal()" class="btn btn--secondary btn--sm">Cancel</button>
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
      </div>
    </form>
  </div>
</div>

<script>
function openUpdateModal(id, name, status, notes) {
  document.getElementById('modal-enquiry-id').value = id;
  document.getElementById('modal-title').textContent = 'Update Enquiry #' + id + ' (' + name + ')';
  document.getElementById('modal-status-select').value = status;
  document.getElementById('modal-notes').value = notes;
  document.getElementById('status-modal').style.display = 'flex';
}
function closeUpdateModal() {
  document.getElementById('status-modal').style.display = 'none';
}
</script>

<?php partial('partials/admin_footer'); ?>
