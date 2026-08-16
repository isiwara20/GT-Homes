<?php
/**
 * GT HOMES — Admin Footer Partial
 * File: views/partials/admin_footer.php
 */
?>
    </main><!-- /.admin-body -->
  </div><!-- /.admin-main -->
</div><!-- /.admin-shell -->

<script src="<?= asset('js/admin.js') ?>"></script>
<?php if (isset($extraJs)): ?>
  <?php foreach ((array) $extraJs as $jsFile): ?>
    <script src="<?= asset('js/' . e($jsFile)) ?>"></script>
  <?php endforeach; ?>
<?php endif; ?>

</body>
</html>
