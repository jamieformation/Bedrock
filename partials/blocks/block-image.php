<?php
  $image = get_field('image')['id'];
  $caption = get_field('caption');
?>

<div class="wp-block full-size-image">
  <?= wp_get_attachment_image($image, 'full-width'); ?>
  <?php if ($caption) { ?>
    <div class="caption"><?= $caption; ?></div>
  <?php } ?>
</div>