<?php
/**
 * GT HOMES — Admin Website Settings View
 * File: views/admin/settings/index.php
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Website Settings']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<div class="admin-main">

  <?php partial('partials/admin_topbar', ['title' => 'Website & Resort Information Settings']); ?>

  <main class="admin-body">

    <?= flash() ?>

    <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); padding:2rem; max-width:800px;">
      
      <div style="margin-bottom:1.5rem; border-bottom:1px solid rgba(255,255,255,0.1); padding-bottom:1rem;">
        <h2 style="color:var(--color-brand-yellow); font-family:var(--font-heading); font-size:1.35rem; margin-bottom:0.25rem;">Resort Identity &amp; Contact Details</h2>
        <p style="color:rgba(255,255,255,0.6); font-size:0.85rem;">Update primary contact numbers, WhatsApp numbers, email addresses, and social links displayed across the site.</p>
      </div>

      <form action="<?= url('admin/settings') ?>" method="POST">
        
        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:1.25rem;">
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Resort Name:</label>
            <input type="text" name="site_name" value="<?= e($currentSettings['site_name'] ?? '') ?>" required
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Primary Tagline:</label>
            <input type="text" name="site_tagline" value="<?= e($currentSettings['site_tagline'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:1.25rem;">
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Hotline Phone Number:</label>
            <input type="text" name="phone" value="<?= e($currentSettings['phone'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Office Line Number:</label>
            <input type="text" name="office_phone" value="<?= e($currentSettings['office_phone'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:1.25rem;">
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">WhatsApp Number (Intl):</label>
            <input type="text" name="whatsapp_number" value="<?= e($currentSettings['whatsapp_number'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Email Address:</label>
            <input type="email" name="email" value="<?= e($currentSettings['email'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:1.25rem;">
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Resort Physical Address:</label>
            <input type="text" name="address" value="<?= e($currentSettings['address'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Google Maps URL:</label>
            <input type="url" name="maps_url" value="<?= e($currentSettings['maps_url'] ?? MAPS_URL) ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
        </div>

        <div style="display:grid; grid-template-columns:1fr 1fr; gap:1.25rem; margin-bottom:2rem;">
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Facebook URL:</label>
            <input type="url" name="facebook_url" value="<?= e($currentSettings['facebook_url'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
          <div>
            <label style="display:block; font-size:0.85rem; color:rgba(255,255,255,0.9); margin-bottom:0.4rem;">Instagram URL:</label>
            <input type="url" name="instagram_url" value="<?= e($currentSettings['instagram_url'] ?? '') ?>"
                   style="width:100%; background:rgba(0,0,0,0.5); border:1px solid rgba(255,255,255,0.2); color:white; padding:0.65rem; border-radius:var(--radius-md); font-size:0.9rem;">
          </div>
        </div>

        <div style="display:flex; justify-content:flex-end;">
          <button type="submit" class="btn btn--primary btn--md">
            <i class="fa-solid fa-floppy-disk"></i> Save Settings
          </button>
        </div>

      </form>

    </div>

  </main>
</div>

<?php partial('partials/admin_footer'); ?>
