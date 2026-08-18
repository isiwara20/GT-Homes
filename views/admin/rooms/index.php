<?php
/**
 * GT HOMES — Admin Rooms & Accommodation Management View
 * File: views/admin/rooms/index.php
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Rooms Management']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<div class="admin-main">

  <header class="admin-topbar">
    <h1 class="admin-topbar__title">Resort Rooms &amp; Suites Control</h1>
    <div style="display:flex; align-items:center; gap:1rem;">
      <span style="font-size:var(--text-sm); color:rgba(255,255,255,0.6);">
        <?= date('l, d F Y') ?>
      </span>
    </div>
  </header>

  <main class="admin-body">

    <?= flash() ?>

    <div style="margin-bottom:1.5rem; display:flex; justify-content:space-between; align-items:center;">
      <p style="color:rgba(255,255,255,0.7); font-size:0.95rem;">Manage room titles, nightly rates, capacity, bed configurations, features, and photos.</p>
    </div>

    <!-- Rooms Cards Grid -->
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap:1.5rem;">
      <?php foreach ($rooms as $r): ?>
        <?php
        $featuresStr = implode(', ', $r['features'] ?? []);
        $priceDisplay = !empty($r['price_per_night']) ? 'LKR ' . number_format((float)$r['price_per_night']) . ' / night' : 'Rate on Enquiry';
        ?>
        <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); overflow:hidden; display:flex; flex-direction:column;">
          
          <div style="position:relative; aspect-ratio:16/9; overflow:hidden;">
            <img src="<?= asset($r['image']) ?>" alt="<?= e($r['name']) ?>" style="width:100%; height:100%; object-fit:cover;">
            <div style="position:absolute; top:0.75rem; left:0.75rem; background:var(--color-brand-lovi); color:white; font-size:0.75rem; font-weight:800; padding:0.25rem 0.6rem; border-radius:var(--radius-full);">
              <?= e($r['number']) ?>
            </div>
            <div style="position:absolute; bottom:0.75rem; right:0.75rem; background:rgba(0,0,0,0.75); color:var(--color-brand-yellow); font-size:0.85rem; font-weight:700; padding:0.35rem 0.75rem; border-radius:var(--radius-md);">
              <?= $priceDisplay ?>
            </div>
          </div>

          <div style="padding:1.5rem; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <h3 style="color:white; font-family:var(--font-heading); font-size:1.25rem; margin-bottom:0.25rem;"><?= e($r['name']) ?></h3>
              <p style="color:var(--color-brand-yellow); font-size:0.85rem; margin-bottom:0.75rem;"><?= e($r['tagline']) ?></p>
              
              <div style="font-size:0.82rem; color:rgba(255,255,255,0.6); display:flex; flex-direction:column; gap:0.4rem; margin-bottom:1rem; border-block:1px solid rgba(255,255,255,0.08); padding-block:0.75rem;">
                <div><i class="fa-solid fa-users" style="color:var(--color-brand-yellow); width:20px;"></i> <?= e($r['capacity']) ?></div>
                <div><i class="fa-solid fa-bed" style="color:var(--color-brand-yellow); width:20px;"></i> <?= e($r['bed_type']) ?></div>
                <div><i class="fa-solid fa-mountain-sun" style="color:var(--color-brand-yellow); width:20px;"></i> <?= e($r['view']) ?></div>
              </div>
            </div>

            <div style="display:flex; gap:0.5rem;">
              <button type="button" class="btn btn--primary btn--sm" style="flex:1;" 
                      onclick="openEditRoomModal('<?= e($r['slug']) ?>', '<?= e(addslashes($r['name'])) ?>', '<?= e(addslashes($r['tagline'])) ?>', '<?= e(addslashes($r['description'])) ?>', '<?= e($r['capacity']) ?>', '<?= e($r['bed_type']) ?>', '<?= e($r['view']) ?>', '<?= $r['price_per_night'] ?? '' ?>', '<?= e(addslashes($featuresStr)) ?>')">
                <i class="fa-solid fa-pen"></i> Edit Room Info
              </button>
              <a href="<?= url('room/' . $r['slug']) ?>" target="_blank" class="btn btn--secondary btn--sm" title="Preview Public View">
                <i class="fa-solid fa-eye"></i>
              </a>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </main>
</div>

<!-- Edit Room Modal -->
<div id="edit-room-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.75); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1rem; overflow-y:auto;">
  <div style="background:#1E1129; border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:2rem; width:90%; max-width:600px; color:white; max-height:90vh; overflow-y:auto;">
    <h3 style="margin-bottom:1rem; color:var(--color-brand-yellow);" id="room-modal-title">Edit Room</h3>

    <form action="<?= url('admin/rooms') ?>" method="POST">
      <input type="hidden" name="action" value="save_room">
      <input type="hidden" name="slug" id="room-slug">

      <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
        <div>
          <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Room Name:</label>
          <input type="text" name="name" id="room-name" required style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
        </div>
        <div>
          <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Tagline:</label>
          <input type="text" name="tagline" id="room-tagline" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
        </div>
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Description:</label>
        <textarea name="description" id="room-description" rows="3" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;"></textarea>
      </div>

      <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:0.75rem; margin-bottom:1rem;">
        <div>
          <label style="display:block; font-size:0.8rem; margin-bottom:0.3rem;">Capacity:</label>
          <input type="text" name="capacity" id="room-capacity" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;">
        </div>
        <div>
          <label style="display:block; font-size:0.8rem; margin-bottom:0.3rem;">Bed Type:</label>
          <input type="text" name="bed_type" id="room-bed-type" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;">
        </div>
        <div>
          <label style="display:block; font-size:0.8rem; margin-bottom:0.3rem;">Setting / View:</label>
          <input type="text" name="view" id="room-view" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;">
        </div>
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Nightly Rate (LKR) — Leave blank for "Rate on Enquiry":</label>
        <input type="number" step="100" name="price_per_night" id="room-price" placeholder="e.g. 15000" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
      </div>

      <div style="margin-bottom:1.5rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Features (Comma separated):</label>
        <input type="text" name="features_str" id="room-features" placeholder="Air Conditioning, Hot Water, Private Balcony, Wi-Fi" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;">
      </div>

      <div style="display:flex; justify-content:flex-end; gap:0.75rem;">
        <button type="button" onclick="closeEditRoomModal()" class="btn btn--secondary btn--sm">Cancel</button>
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-floppy-disk"></i> Save Room Details</button>
      </div>

    </form>
  </div>
</div>

<script>
function openEditRoomModal(slug, name, tagline, desc, cap, bed, view, price, features) {
  document.getElementById('room-slug').value = slug;
  document.getElementById('room-modal-title').textContent = 'Edit ' + name;
  document.getElementById('room-name').value = name;
  document.getElementById('room-tagline').value = tagline;
  document.getElementById('room-description').value = desc;
  document.getElementById('room-capacity').value = cap;
  document.getElementById('room-bed-type').value = bed;
  document.getElementById('room-view').value = view;
  document.getElementById('room-price').value = price;
  document.getElementById('room-features').value = features;
  document.getElementById('edit-room-modal').style.display = 'flex';
}
function closeEditRoomModal() {
  document.getElementById('edit-room-modal').style.display = 'none';
}
</script>

<?php partial('partials/admin_footer'); ?>
