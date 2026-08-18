<?php
/**
 * GT HOMES — Admin Dining & Menus Management View
 * File: views/admin/dining/index.php
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Dining & Menus']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<div class="admin-main">

  <header class="admin-topbar">
    <h1 class="admin-topbar__title">Resort Dining &amp; Menu Control</h1>
    <div style="display:flex; align-items:center; gap:1rem;">
      <span style="font-size:var(--text-sm); color:rgba(255,255,255,0.6);">
        <?= date('l, d F Y') ?>
      </span>
    </div>
  </header>

  <main class="admin-body">

    <?= flash() ?>

    <div style="margin-bottom:1.5rem; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:1rem;">
      <p style="color:rgba(255,255,255,0.7); font-size:0.95rem;">Manage dining categories, food items, pricing, upload dish photos, and chef special badges.</p>
      <button type="button" class="btn btn--primary btn--md" onclick="openAddMenuItemModal('breakfast')">
        <i class="fa-solid fa-plus"></i> Add New Menu Item
      </button>
    </div>

    <!-- Dining Categories Sections -->
    <div style="display:flex; flex-direction:column; gap:2rem;">
      <?php foreach ($categories as $cat): ?>
        <?php
        $catSlug  = e($cat['slug'] ?? '');
        $catName  = e($cat['name'] ?? '');
        $catTag   = e($cat['tagline'] ?? '');
        $items    = $cat['items'] ?? [];
        ?>
        <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); padding:1.75rem;">
          
          <div style="display:flex; justify-content:space-between; align-items:center; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:1rem; margin-bottom:1.25rem;">
            <div>
              <h2 style="font-family:var(--font-heading); color:var(--color-brand-yellow); font-size:1.4rem; margin-bottom:0.2rem;"><?= $catName ?></h2>
              <p style="color:rgba(255,255,255,0.6); font-size:0.85rem;"><?= $catTag ?></p>
            </div>
            <button type="button" class="btn btn--secondary btn--sm" onclick="openAddMenuItemModal('<?= $catSlug ?>')">
              <i class="fa-solid fa-plus"></i> Add to <?= $catName ?>
            </button>
          </div>

          <div style="display:grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap:1.25rem;">
            <?php foreach ($items as $it): ?>
              <?php
              $itemId   = (int)($it['id'] ?? 0);
              $iName    = e($it['name'] ?? '');
              $iDesc    = e($it['description'] ?? '');
              $iPrice   = !empty($it['price']) ? 'LKR ' . number_format((float)$it['price']) : 'Included / Enquiry';
              $isPop    = !empty($it['is_popular']);
              $hasImage = !empty($it['image']);
              $imgPath  = $hasImage ? asset($it['image']) : null;
              ?>
              <div style="background:rgba(0,0,0,0.3); border:1px solid rgba(255,255,255,0.08); border-radius:var(--radius-lg); padding:1rem; display:flex; flex-direction:column; justify-content:space-between;">
                
                <?php if ($hasImage): ?>
                  <div style="position:relative; aspect-ratio:16/9; border-radius:var(--radius-md); overflow:hidden; margin-bottom:0.75rem; border:1px solid rgba(255,255,255,0.1);">
                    <img src="<?= $imgPath ?>" alt="<?= $iName ?>" style="width:100%; height:100%; object-fit:cover;">
                    <form action="<?= url('admin/dining') ?>" method="POST" onsubmit="return confirm('Delete dish photo for <?= $iName ?>?');" style="position:absolute; top:0.5rem; right:0.5rem;">
                      <input type="hidden" name="action" value="delete_photo">
                      <input type="hidden" name="category_slug" value="<?= $catSlug ?>">
                      <input type="hidden" name="item_id" value="<?= $itemId ?>">
                      <button type="submit" style="background:rgba(122,24,56,0.9); color:white; border:none; border-radius:50%; width:28px; height:28px; display:flex; align-items:center; justify-content:center; cursor:pointer;" title="Delete Dish Photo">
                        <i class="fa-solid fa-trash-can" style="font-size:0.75rem;"></i>
                      </button>
                    </form>
                  </div>
                <?php endif; ?>

                <div>
                  <div style="display:flex; justify-content:space-between; align-items:start; margin-bottom:0.4rem;">
                    <strong style="color:white; font-size:0.95rem; font-family:var(--font-heading);"><?= $iName ?></strong>
                    <?php if ($isPop): ?>
                      <span style="background:var(--color-brand-lovi); color:white; font-size:0.65rem; font-weight:800; padding:0.15rem 0.45rem; border-radius:var(--radius-full);">POPULAR</span>
                    <?php endif; ?>
                  </div>
                  <p style="color:rgba(255,255,255,0.6); font-size:0.82rem; margin-bottom:0.75rem; line-height:1.4;"><?= $iDesc ?></p>
                </div>

                <div style="display:flex; justify-content:space-between; align-items:center; border-top:1px solid rgba(255,255,255,0.06); padding-top:0.6rem; margin-top:auto;">
                  <span style="color:var(--color-brand-yellow); font-weight:700; font-size:0.85rem;"><?= $iPrice ?></span>
                  <div style="display:flex; gap:0.4rem;">
                    <button type="button" class="btn btn--secondary btn--sm" style="padding:0.25rem 0.5rem; font-size:0.75rem;" 
                            onclick="openEditMenuItemModal('<?= $catSlug ?>', <?= $itemId ?>, '<?= e(addslashes($iName)) ?>', '<?= e(addslashes($iDesc)) ?>', '<?= $it['price'] ?? '' ?>', <?= $isPop ? 'true' : 'false' ?>, '<?= e($imgPath ?? '') ?>')">
                      <i class="fa-solid fa-pen"></i> Edit &amp; Photo
                    </button>
                    <form action="<?= url('admin/dining') ?>" method="POST" onsubmit="return confirm('Remove menu item <?= $iName ?>?');" style="display:inline;">
                      <input type="hidden" name="action" value="delete_item">
                      <input type="hidden" name="category_slug" value="<?= $catSlug ?>">
                      <input type="hidden" name="item_id" value="<?= $itemId ?>">
                      <button type="submit" class="btn btn--secondary btn--sm" style="padding:0.25rem 0.4rem; font-size:0.75rem; color:#f87171; border-color:rgba(248,113,113,0.3);" title="Remove Item">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>
          </div>

        </div>
      <?php endforeach; ?>
    </div>

  </main>
</div>

<!-- Edit / Add Menu Item Modal -->
<div id="menu-item-modal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.8); backdrop-filter:blur(4px); z-index:9999; align-items:center; justify-content:center; padding:1rem; overflow-y:auto;">
  <div style="background:#1E1129; border:1px solid var(--color-brand-lovi); border-radius:var(--radius-xl); padding:2rem; width:90%; max-width:520px; color:white; max-height:90vh; overflow-y:auto;">
    <h3 style="margin-bottom:1rem; color:var(--color-brand-yellow);" id="menu-modal-title">Menu Item Details</h3>

    <form action="<?= url('admin/dining') ?>" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="action" value="save_item">
      <input type="hidden" name="category_slug" id="menu-cat-slug">
      <input type="hidden" name="item_id" id="menu-item-id" value="0">

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Item / Dish Name:</label>
        <input type="text" name="name" id="menu-item-name" required placeholder="e.g. Sri Lankan Seafood Curry" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.55rem; border-radius:var(--radius-md);">
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Description:</label>
        <textarea name="description" id="menu-item-desc" rows="3" placeholder="Ingredients and flavor profile..." style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.55rem; border-radius:var(--radius-md); font-size:0.85rem;"></textarea>
      </div>

      <div style="margin-bottom:1rem;">
        <label style="display:block; font-size:0.85rem; margin-bottom:0.3rem;">Price (LKR) — Leave blank for Included / Enquiry:</label>
        <input type="number" step="50" name="price" id="menu-item-price" placeholder="e.g. 1800" style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.55rem; border-radius:var(--radius-md);">
      </div>

      <!-- Dish Photo Upload Field -->
      <div style="margin-bottom:1.25rem;">
        <label style="display:block; font-size:0.85rem; font-weight:600; color:white; margin-bottom:0.38rem;">
          <i class="fa-solid fa-camera" style="color:var(--color-brand-yellow); margin-right:0.3rem;"></i> Select Dish Photo File:
        </label>
        <input type="file" name="dish_image" accept="image/*" id="dish-file-input" style="width:100%; color:white; font-size:0.85rem; background:rgba(0,0,0,0.5); padding:0.6rem; border-radius:var(--radius-md); border:1px solid rgba(255,255,255,0.2);">
      </div>

      <div style="margin-bottom:1.5rem; display:flex; align-items:center; gap:0.5rem;">
        <input type="checkbox" name="is_popular" id="menu-item-popular" value="1" style="width:18px; height:18px;">
        <label for="menu-item-popular" style="font-size:0.85rem; cursor:pointer;">Mark as Popular / Chef Special</label>
      </div>

      <div style="display:flex; justify-content:flex-end; gap:0.75rem;">
        <button type="button" onclick="closeMenuItemModal()" class="btn btn--secondary btn--sm">Cancel</button>
        <button type="submit" class="btn btn--primary btn--sm"><i class="fa-solid fa-floppy-disk"></i> Save Item &amp; Photo</button>
      </div>

    </form>
  </div>
</div>

<script>
function previewWaPhoto(input, targetId) {
  if (input && input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function (e) {
      const img = document.getElementById(targetId);
      if (img) {
        img.src = e.target.result;
      }
    };
    reader.readAsDataURL(input.files[0]);
  }
}

function openAddMenuItemModal(catSlug) {
  document.getElementById('menu-cat-slug').value = catSlug;
  document.getElementById('menu-item-id').value = '0';
  document.getElementById('menu-modal-title').textContent = 'Add New Menu Item';
  document.getElementById('menu-item-name').value = '';
  document.getElementById('menu-item-desc').value = '';
  document.getElementById('menu-item-price').value = '';
  document.getElementById('menu-item-popular').checked = false;
  document.getElementById('dish-photo-preview').src = "<?= asset('images/branding/Logo.png') ?>";
  document.getElementById('dish-file-input').value = "";
  document.getElementById('menu-item-modal').style.display = 'flex';
}

function openEditMenuItemModal(catSlug, id, name, desc, price, isPop, imgUrl) {
  document.getElementById('menu-cat-slug').value = catSlug;
  document.getElementById('menu-item-id').value = id;
  document.getElementById('menu-modal-title').textContent = 'Edit Menu Item';
  document.getElementById('menu-item-name').value = name;
  document.getElementById('menu-item-desc').value = desc;
  document.getElementById('menu-item-price').value = price;
  document.getElementById('menu-item-popular').checked = isPop;
  if (imgUrl) {
    document.getElementById('dish-photo-preview').src = imgUrl;
  }
  document.getElementById('dish-file-input').value = "";
  document.getElementById('menu-item-modal').style.display = 'flex';
}

function closeMenuItemModal() {
  document.getElementById('menu-item-modal').style.display = 'none';
}
</script>

<?php partial('partials/admin_footer'); ?>
