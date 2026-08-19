<?php
/**
 * GT HOMES — Admin Contact Inbox View
 * File: views/admin/contacts/index.php
 */

partial('partials/admin_header', ['pageTitle' => $pageTitle ?? 'Contact Inbox']);
partial('partials/admin_sidebar', [
    'adminName'  => $adminName  ?? getAdminName(),
    'adminEmail' => $adminEmail ?? getAdminEmail(),
]);
?>

<div class="admin-main">

  <?php partial('partials/admin_topbar', ['title' => 'Guest Contact Inbox']); ?>

  <main class="admin-body">

    <?= flash() ?>

    <div style="margin-bottom:1.5rem;">
      <p style="color:rgba(255,255,255,0.7); font-size:0.95rem;">Incoming messages and general inquiries submitted by guests via the contact form.</p>
    </div>

    <!-- Contact Messages List -->
    <div style="background:#1E1129; border:1px solid rgba(116,27,56,0.25); border-radius:var(--radius-xl); overflow:hidden;">
      <?php if (empty($inquiries)): ?>
        <div style="padding:3rem; text-align:center; color:rgba(255,255,255,0.5);">
          <i class="fa-solid fa-envelope-open" style="font-size:2.5rem; margin-bottom:1rem; opacity:0.5;"></i>
          <p>No contact messages in your inbox.</p>
        </div>
      <?php else: ?>
        <div style="display:flex; flex-direction:column;">
          <?php foreach ($inquiries as $inq): ?>
            <?php
            $id      = (int)($inq['id'] ?? 0);
            $name    = e($inq['name'] ?? 'Guest');
            $email   = e($inq['email'] ?? '');
            $phone   = e($inq['phone'] ?? 'N/A');
            $subject = e($inq['subject'] ?? 'General Inquiry');
            $msg     = e($inq['message'] ?? '');
            $isRead  = !empty($inq['is_read']);
            $date    = date('d M Y, h:i A', strtotime($inq['created_at'] ?? 'now'));
            $waPhone = preg_replace('/[^0-9]/', '', $phone);
            if (str_starts_with($waPhone, '0')) $waPhone = '94' . substr($waPhone, 1);
            $waUrl   = "https://wa.me/{$waPhone}?text=" . urlencode("Hello {$name}! Thank you for contacting GT HOMES regarding '{$subject}'.");
            $mailUrl = "mailto:{$email}?subject=" . urlencode("Re: {$subject} — GT HOMES Resort");
            ?>
            <div style="padding:1.5rem; border-bottom:1px solid rgba(255,255,255,0.08); background:<?= $isRead ? 'transparent' : 'rgba(116,27,56,0.15)' ?>; transition:background 0.2s;">
              
              <div style="display:flex; justify-content:space-between; align-items:start; flex-wrap:wrap; gap:0.5rem; margin-bottom:0.75rem;">
                <div>
                  <div style="display:flex; align-items:center; gap:0.6rem; margin-bottom:0.2rem;">
                    <strong style="color:white; font-size:1.05rem; font-family:var(--font-heading);"><?= $name ?></strong>
                    <?php if (!$isRead): ?>
                      <span style="background:var(--color-brand-lovi); color:white; font-size:0.65rem; font-weight:800; padding:0.15rem 0.5rem; border-radius:var(--radius-full);">NEW</span>
                    <?php endif; ?>
                  </div>
                  <div style="font-size:0.82rem; color:rgba(255,255,255,0.6);">
                    <i class="fa-solid fa-envelope" style="color:var(--color-brand-yellow);"></i> <?= $email ?> &nbsp;|&nbsp; 
                    <i class="fa-solid fa-phone" style="color:var(--color-brand-yellow);"></i> <?= $phone ?>
                  </div>
                </div>

                <div style="text-align:right;">
                  <span style="font-size:0.78rem; color:rgba(255,255,255,0.5); display:block; margin-bottom:0.4rem;"><?= $date ?></span>
                  <form action="<?= url('admin/contacts') ?>" method="POST" style="display:inline;">
                    <input type="hidden" name="action" value="toggle_read">
                    <input type="hidden" name="inquiry_id" value="<?= $id ?>">
                    <button type="submit" class="btn btn--secondary btn--sm" style="padding:0.25rem 0.5rem; font-size:0.75rem;">
                      <i class="fa-solid <?= $isRead ? 'fa-envelope' : 'fa-envelope-open' ?>"></i> Mark as <?= $isRead ? 'Unread' : 'Read' ?>
                    </button>
                  </form>
                </div>
              </div>

              <div style="background:rgba(0,0,0,0.3); border-radius:var(--radius-md); padding:1rem; border:1px solid rgba(255,255,255,0.05); margin-bottom:1rem;">
                <h4 style="color:var(--color-brand-yellow); font-size:0.9rem; margin-bottom:0.4rem;"><?= $subject ?></h4>
                <p style="color:rgba(255,255,255,0.85); font-size:0.88rem; line-height:1.6; whitespace:pre-line;"><?= $msg ?></p>
              </div>

              <div style="display:flex; gap:0.5rem; justify-content:flex-end;">
                <a href="<?= $waUrl ?>" target="_blank" class="btn btn--whatsapp btn--sm">
                  <i class="fab fa-whatsapp"></i> Reply on WhatsApp
                </a>
                <a href="<?= $mailUrl ?>" class="btn btn--primary btn--sm">
                  <i class="fa-solid fa-paper-plane"></i> Reply via Email
                </a>
              </div>

            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

  </main>
</div>

<?php partial('partials/admin_footer'); ?>
