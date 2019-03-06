<?php

if (get_field('order') == 'image_right') {
  $image_right = true;
} else {
  $image_right = false;
}

?>

<div class="flexible-content-container">

  <div class="image-and-content flexible-content <?= $image_right ? 'image-right' : 'image-left'; ?>">
    <div class="columns">
      <?php if ($image_right) { ?>
        <div class="column content"><?= get_field('content'); ?></div>
        <div class="column image"><?= wp_get_attachment_image(get_field('image')['id'], 'flex_half'); ?></div>
      <?php } else { ?>
        <div class="column image"><?= wp_get_attachment_image(get_field('image')['id'], 'flex_half'); ?></div>
        <div class="column content"><?= get_field('content'); ?></div>
      <?php } ?>
    </div>
  </div>

</div>