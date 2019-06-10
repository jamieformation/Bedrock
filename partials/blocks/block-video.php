<div class="wp-block video">
  <div class="video-container">
    <?php if (get_field('type') == 'upload') { ?>
      <video controls>
        <source src="<?= get_field('file'); ?>">
      </video>
    <?php } else if (get_field('type') == 'embed') { ?>
      <?= get_field('embed_code'); ?>
    <?php } ?>
  </div>
</div>