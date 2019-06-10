<?php
  $images = get_field('gallery');
?>

<div class="wp-block gallery">
  <div class="images">
    <?php foreach ($images as $image) { ?>
      <?php $caption = $image['caption']; ?>
      <a href="<?= wp_get_attachment_image_url($image['id'], 'large'); ?>" class="image" data-lightbox="gallery"<?= $caption ? ' data-title="' . $caption . '"' : ''; ?>>
        <?= wp_get_attachment_image($image['id'], 'gallery'); ?>
      </a>
    <?php } ?>
  </div>
</div>
