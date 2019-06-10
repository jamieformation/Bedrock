<?php

if (get_field('order') == 'image_right') {
  $image_right = true;
} else {
  $image_right = false;
}

$caption = get_field('caption');
$content = get_field('content');

?>


<div class="wp-block image-and-content flexible-content <?= $image_right ? 'image-right' : 'image-left'; ?>">
  <?php if (get_field('add_heading')) { ?>
    <h3 class="heading"><?= get_field('heading'); ?></h3>
  <?php } ?>
  <div class="columns">
    <?php if ($image_right) { ?>
      <div class="column content"><?= $content; ?></div>
      <div class="column">
        <div class="image<?= $caption ? ' with-caption' : ''; ?>">
          <?= wp_get_attachment_image(get_field('image')['id'], 'half-width'); ?>
        </div>
        <?php if ($caption) { ?>
          <div class="caption"><?= $caption; ?></div>
        <?php } ?>
      </div>
    <?php } else { ?>
      <div class="column">
        <div class="image<?= $caption ? ' with-caption' : ''; ?>">
          <?= wp_get_attachment_image(get_field('image')['id'], 'half-width'); ?>
        </div>
        <?php if ($caption) { ?>
          <div class="caption"><?= $caption; ?></div>
        <?php } ?>
      </div>
      <div class="column content"><?= $content; ?></div>
    <?php } ?>
  </div>
</div>