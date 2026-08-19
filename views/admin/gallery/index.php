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

  <?php partial('partials/admin_topbar', ['title' => 'Resort Gallery & Memories Control']); ?>

  <main class="admin-body">

    <?= flash() ?>

    <div style="margin-bottom:1.5rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;">
      <div>
        <p style="color:rgba(255,255,255,0.8); font-size:1rem; font-weight:600;">Manage resort photo gallery titles, captions, category tags, photo display sizes, and upload new memories.</p>
        <p style="color:rgba(255,255,255,0.5); font-size:0.85rem;">Total Gallery Photos: <?= count($images) ?></p>
      </div>
      <button type="button" class="btn btn--primary btn--md" onclick="openAddPhotoModal()">
        <i class="fa-solid fa-plus"></i> Add New Gallery Photo
      </button>
    </div>

    <!-- Gallery Grid with Dynamic Selected Photo Sizes -->
    <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(270px, 1fr)); gap:1.25rem;">
      <?php foreach ($images as $img): ?>
        <?php
        $id        = (int)($img['id'] ?? 0);
        $title     = e($img['title'] ?? '');
        $desc      = e($img['description'] ?? '');
        $catSlug   = e($img['category_slug'] ?? 'rooms');
        $catName   = e($img['category_name'] ?? 'General');
        $photoSize = e($img['photo_size'] ?? '4/3');
        $isFeat    = !empty($img['is_featured']);
        $imgPath   = asset($img['image'] ?? 'images/home/hero.jpg');
        ?>
        <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); overflow:hidden; display:flex; flex-direction:column;">
          
          <!-- Dynamic Selected Photo Aspect Ratio Container -->
          <div style="position:relative; aspect-ratio:<?= $photoSize ?>; overflow:hidden; background:#0F0A14;">
            <img src="<?= $imgPath ?>" alt="<?= $title ?>" style="width:100%; height:100%; object-fit:cover;">
            <div style="position:absolute; top:0.5rem; left:0.5rem; background:rgba(0,0,0,0.75); color:var(--color-brand-yellow); font-size:0.7rem; font-weight:700; padding:0.2rem 0.5rem; border-radius:var(--radius-full);">
              <?= $catName ?>
            </div>
            <div style="position:absolute; bottom:0.5rem; left:0.5rem; background:rgba(23,23,23,0.85); color:white; font-size:0.65rem; font-weight:600; padding:0.15rem 0.45rem; border-radius:var(--radius-sm);">
              Ratio: <?= $photoSize ?>
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

            <div style="display:flex; gap:0.5rem; margin-top:auto;">
              <button type="button" class="btn btn--secondary btn--sm" style="flex:1;" 
                      data-id="<?= $id ?>"
                      data-title="<?= e($img['title'] ?? '') ?>"
                      data-category="<?= e($catSlug) ?>"
                      data-description="<?= e($img['description'] ?? '') ?>"
                      data-size="<?= e($photoSize) ?>"
                      data-featured="<?= $isFeat ? '1' : '0' ?>"
                      onclick="openEditPhotoFromBtn(this)">
                <i class="fa-solid fa-pen"></i> Edit Info &amp; Size
              </button>
              <form action="<?= url('admin/gallery') ?>" method="POST" onsubmit="return confirm('Delete gallery photo <?= e($title) ?>?');" style="display:inline;">
                <input type="hidden" name="action" value="delete_photo">
                <input type="hidden" name="photo_id" value="<?= $id ?>">
                <button type="submit" class="btn btn--secondary btn--sm" style="color:#f87171; border-color:rgba(248,113,113,0.3);" title="Delete Photo">
                  <i class="fa-solid fa-trash-can"></i>
                </button>
              </form>
            </div>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </main>
</div>

<!-- ──────────────────────────────────────────
     1. ADD NEW GALLERY PHOTO MODAL
────────────────────────────────────────── -->
<div id="add-photo-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1rem; overflow-y:auto;">
  <div style="background:#1E1129; border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:2rem; width:90%; max-width:500px; color:white; max-height:90vh; overflow-y:auto;">
    <h3 style="margin-bottom:1rem; color:var(--color-brand-yellow);"><i class="fa-solid fa-plus-circle"></i> Add New Gallery &amp; Memory Photo</h3>

    <form action="<?= url('admin/gallery') ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="add_photo">

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Photo Title:</label>
        <input type="text" name="title" required placeholder="e.g. Sunset Poolside Celebration" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.55rem; border-radius:var(--radius-md);">
      </div>

      <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.75rem; margin-bottom:1rem;">
        <div>
          <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Category:</label>
          <select name="category_slug" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.55rem; border-radius:var(--radius-md);">
            <option value="celebrations">Special Moments</option>
            <option value="rooms">Rooms &amp; Accommodation</option>
            <option value="dining">Dining &amp; Flavours</option>
            <option value="pool">Swimming Pool</option>
            <option value="cinema">Mini Cinema</option>
          </select>
        </div>

        <div>
          <label style="display:block; font-size:0.85rem; font-weight:700; color:var(--color-brand-yellow); margin-bottom:0.3rem;">Photo Display Size:</label>
          <select name="photo_size" id="add-photo-size-select" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid var(--color-brand-yellow); color:white; padding:0.55rem; border-radius:var(--radius-md); font-weight:600;">
            <option value="4/3">📸 Standard (4:3 Ratio)</option>
            <option value="16/9">🖼️ Wide Landscape (16:9 Banner)</option>
            <option value="1/1">🔲 Square Tile (1:1 Instagram)</option>
            <option value="3/4">📱 Tall Portrait (3:4 View)</option>
          </select>
        </div>
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Caption / Description:</label>
        <textarea name="description" rows="3" placeholder="Brief caption describing this resort memory..." style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.55rem; border-radius:var(--radius-md); font-size:0.85rem;"></textarea>
      </div>

      <!-- Photo File Input -->
      <div style="margin-bottom:1.25rem;">
        <label style="display:block; font-size:0.85rem; font-weight:600; color:white; margin-bottom:0.38rem;">
          <i class="fa-solid fa-camera" style="color:var(--color-brand-yellow); margin-right:0.3rem;"></i> Select Photo File:
        </label>
        <input type="file" name="gallery_file" accept="image/*" required id="add-file-input" style="width:100%; color:white; font-size:0.85rem; background:rgba(0,0,0,0.5); padding:0.6rem; border-radius:var(--radius-md); border:1px solid rgba(255,255,255,0.2);">
      </div>

      <div style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
        <input type="checkbox" name="is_featured" id="add-photo-featured" value="1" style="width:18px; height:18px;">
        <label for="add-photo-featured" style="font-size:0.85rem; cursor:pointer;">Highlight as Featured Photo</label>
      </div>

      <div style="display:flex; justify-content:flex-end; gap:0.75rem;">
        <button type="button" onclick="closeAddPhotoModal()" class="btn btn--secondary btn--sm">Cancel</button>
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-plus-circle"></i> Upload Photo</button>
      </div>

    </form>
  </div>
</div>

<!-- ──────────────────────────────────────────
     2. EDIT GALLERY PHOTO MODAL
────────────────────────────────────────── -->
<div id="edit-photo-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1rem; overflow-y:auto;">
  <div style="background:#1E1129; border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:2rem; width:90%; max-width:500px; color:white; max-height:90vh; overflow-y:auto;">
    <h3 style="margin-bottom:1rem; color:var(--color-brand-yellow);" id="photo-modal-title">Edit Photo Details</h3>

    <form action="<?= url('admin/gallery') ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="save_photo">
      <input type="hidden" name="photo_id" id="photo-id">

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Photo Title:</label>
        <input type="text" name="title" id="photo-title" required style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
      </div>

      <div style="display:grid; grid-template-columns:1fr 1fr; gap:0.75rem; margin-bottom:1rem;">
        <div>
          <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Category:</label>
          <select name="category_slug" id="photo-category" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md);">
            <option value="celebrations">Special Moments</option>
            <option value="rooms">Rooms &amp; Accommodation</option>
            <option value="dining">Dining &amp; Flavours</option>
            <option value="pool">Swimming Pool</option>
            <option value="cinema">Mini Cinema</option>
          </select>
        </div>

        <div>
          <label style="display:block; font-size:0.85rem; font-weight:700; color:var(--color-brand-yellow); margin-bottom:0.3rem;">Photo Display Size:</label>
          <select name="photo_size" id="edit-photo-size-select" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid var(--color-brand-yellow); color:white; padding:0.5rem; border-radius:var(--radius-md); font-weight:600;">
            <option value="4/3">📸 Standard (4:3 Ratio)</option>
            <option value="16/9">🖼️ Wide Landscape (16:9 Banner)</option>
            <option value="1/1">🔲 Square Tile (1:1 Instagram)</option>
            <option value="3/4">📱 Tall Portrait (3:4 View)</option>
          </select>
        </div>
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Caption / Description:</label>
        <textarea name="description" id="photo-desc" rows="3" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.5rem; border-radius:var(--radius-md); font-size:0.85rem;"></textarea>
      </div>

      <!-- Replace Photo File Input -->
      <div style="margin-bottom:1.25rem;">
        <label style="display:block; font-size:0.85rem; font-weight:600; color:white; margin-bottom:0.38rem;">
          <i class="fa-solid fa-cloud-arrow-up" style="color:var(--color-brand-yellow); margin-right:0.3rem;"></i> Upload Replacement Photo (Optional):
        </label>
        <input type="file" name="gallery_file" accept="image/*" id="edit-file-input" style="width:100%; color:white; font-size:0.85rem; background:rgba(0,0,0,0.5); padding:0.6rem; border-radius:var(--radius-md); border:1px solid rgba(255,255,255,0.2);">
      </div>

      <div style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
        <input type="checkbox" name="is_featured" id="photo-featured" value="1" style="width:18px; height:18px;">
        <label for="photo-featured" style="font-size:0.85rem; cursor:pointer;">Highlight as Featured Photo</label>
      </div>

      <div style="display:flex; justify-content:flex-end; gap:0.75rem;">
        <button type="button" onclick="closeEditPhotoModal()" class="btn btn--secondary btn--sm">Cancel</button>
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-floppy-disk"></i> Save Changes</button>
      </div>

    </form>
  </div>
</div>

<script>
function openAddPhotoModal() {
  const fileInp = document.getElementById('add-file-input');
  if (fileInp) fileInp.value = "";
  const modal = document.getElementById('add-photo-modal');
  if (modal) modal.style.display = 'flex';
}

function closeAddPhotoModal() {
  const modal = document.getElementById('add-photo-modal');
  if (modal) modal.style.display = 'none';
}

function openEditPhotoFromBtn(btn) {
  if (!btn) return;
  const id    = btn.getAttribute('data-id') || '0';
  const title = btn.getAttribute('data-title') || '';
  const cat   = btn.getAttribute('data-category') || 'rooms';
  const desc  = btn.getAttribute('data-description') || '';
  const size  = btn.getAttribute('data-size') || '4/3';
  const feat  = btn.getAttribute('data-featured') === '1';

  openEditPhotoModal(id, title, cat, desc, size, feat);
}

function openEditPhotoModal(id, title, catSlug, desc, photoSize, isFeat) {
  const pId = document.getElementById('photo-id');
  if (pId) pId.value = id;
  const pTitle = document.getElementById('photo-title');
  if (pTitle) pTitle.value = title;
  const pCat = document.getElementById('photo-category');
  if (pCat) pCat.value = catSlug;
  const pDesc = document.getElementById('photo-desc');
  if (pDesc) pDesc.value = desc;
  const pSize = document.getElementById('edit-photo-size-select');
  if (pSize) pSize.value = photoSize || '4/3';
  const pFeat = document.getElementById('photo-featured');
  if (pFeat) pFeat.checked = Boolean(isFeat);
  const pFile = document.getElementById('edit-file-input');
  if (pFile) pFile.value = "";

  const modal = document.getElementById('edit-photo-modal');
  if (modal) modal.style.display = 'flex';
}

function closeEditPhotoModal() {
  const modal = document.getElementById('edit-photo-modal');
  if (modal) modal.style.display = 'none';
}
</script>

<?php partial('partials/admin_footer'); ?>
