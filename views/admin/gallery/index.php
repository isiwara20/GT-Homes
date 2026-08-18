<?php
/**
 * GT HOMES — Admin Gallery & Memories Management View
 * File: views/admin/gallery/index.php
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Gallery & Memories']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<div class="admin-main">

  <header class="admin-topbar">
    <h1 class="admin-topbar__title">Resort Gallery &amp; Memories Control</h1>
    <div style="display:flex; align-items:center; gap:1rem;">
      <span style="font-size:var(--text-sm); color:rgba(255,255,255,0.6);">
        <?= date('l, d F Y') ?>
      </span>
    </div>
  </header>

  <main class="admin-body">

    <?= flash() ?>

    <div style="margin-bottom:1.5rem; display:flex; justify-content:space-between; align-items:center;">
      <p style="color:rgba(255,255,255,0.7); font-size:0.95rem;">Manage resort photo gallery titles, captions, category tags, and featured badges.</p>
    </div>

    <!-- Gallery Masonry Grid -->
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap:1.25rem;">
      <?php foreach ($images as $img): ?>
        <?php
        $id      = (int)($img['id'] ?? 0);
        $title   = e($img['title'] ?? '');
        $desc    = e($img['description'] ?? '');
        $catSlug = e($img['category_slug'] ?? 'rooms');
        $catName = e($img['category_name'] ?? 'General');
        $isFeat  = !empty($img['is_featured']);
        $imgPath = asset($img['image'] ?? 'images/home/hero.jpg');
        ?>
        <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); overflow:hidden; display:flex; flex-direction:column;">
          
          <div style="position:relative; aspect-ratio:4/3; overflow:hidden;">
            <img src="<?= $imgPath ?>" alt="<?= $title ?>" style="width:100%; height:100%; object-fit:cover;">
            <div style="position:absolute; top:0.5rem; left:0.5rem; background:rgba(0,0,0,0.75); color:var(--color-brand-yellow); font-size:0.7rem; font-weight:700; padding:0.2rem 0.5rem; border-radius:var(--radius-full);">
              <?= $catName ?>
            </div>
            <?php if ($isFeat): ?>
              <div style="position:absolute; top:0.5rem; right:0.5rem; background:var(--color-brand-lovi); color:white; font-size:0.65rem; font-weight:800; padding:0.2rem 0.5rem; border-radius:var(--radius-full);">
                FEATURED
              </div>
            <?php endif; ?>
          </div>

          <div style="padding:1rem; flex:1; display:flex; flex-direction:column; justify-content:space-between;">
            <div>
              <h4 style="color:white; font-family:var(--font-heading); font-size:0.95rem; margin-bottom:0.25rem;"><?= $title ?></h4>
              <p style="color:rgba(255,255,255,0.6); font-size:0.78rem; line-height:1.4; margin-bottom:0.75rem;"><?= $desc ?></p>
            </div>

            <button type="button" class="btn btn--secondary btn--sm" style="width:100%; margin-top:auto;" 
                    onclick="openPhotoModal(<?= $id ?>, '<?= e(addslashes($title)) ?>', '<?= $catSlug ?>', '<?= e(addslashes($desc)) ?>', <?= $isFeat ? 'true' : 'false' ?>)">
              <i class="fa-solid fa-pen"></i> Edit Photo Info
            </button>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </main>
</div>

<!-- Edit Photo Modal -->
<div id="photo-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.75); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1rem;">
  <div style="background:#1E1129; border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:2rem; width:90%; max-width:480px; color:white;">
    <h3 style="margin-bottom:1rem; color:var(--color-brand-yellow);" id="photo-modal-title">Edit Photo Info</h3>

    <form action="<?= url('admin/gallery') ?>" method="POST">
      <input type="hidden" name="action" value="save_photo">
      <input type="hidden" name="photo_id" id="photo-id">

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Photo Title:</label>
        <input type="text" name="title" id="photo-title" required style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Gallery Category:</label>
        <select name="category_slug" id="photo-category" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
          <option value="rooms">Rooms &amp; Accommodation</option>
          <option value="dining">Dining &amp; Flavours</option>
          <option value="pool">Swimming Pool</option>
          <option value="cinema">Mini Cinema</option>
          <option value="celebrations">Special Moments &amp; Celebrations</option>
        </select>
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Caption / Description:</label>
        <textarea name="description" id="photo-desc" rows="3" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;"></textarea>
      </div>

      <div style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
        <input type="checkbox" name="is_featured" id="photo-featured" value="1" style="width:18px; height:18px;">
        <label for="photo-featured" style="font-size:0.85rem; cursor:pointer;">Highlight as Featured Photo</label>
      </div>

      <div style="display:flex; justify-content:flex-end; gap:0.75rem;">
        <button type="button" onclick="closePhotoModal()" class="btn btn--secondary btn--sm">Cancel</button>
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-floppy-disk"></i> Save Photo</button>
      </div>

    </form>
  </div>
</div>

<script>
function openPhotoModal(id, title, catSlug, desc, isFeat) {
  document.getElementById('photo-id').value = id;
  document.getElementById('photo-modal-title').textContent = 'Edit Photo #' + id;
  document.getElementById('photo-title').value = title;
  document.getElementById('photo-category').value = catSlug;
  document.getElementById('photo-desc').value = desc;
  document.getElementById('photo-featured').checked = isFeat;
  document.getElementById('photo-modal').style.display = 'flex';
}

function closePhotoModal() {
  document.getElementById('photo-modal').style.display = 'none';
}
</script>

<?php partial('partials/admin_footer'); ?>
