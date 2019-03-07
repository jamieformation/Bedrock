<?php if( have_rows('tabs') ): ?>

<div class="wp-block tabs">

  <?php

    $active = true;

    while ( have_rows('tabs') ) : the_row();

      $title = get_sub_field('title');
      $content = get_sub_field('content');

  ?>

    <div class="tab-title<?= $active ? ' active' : ''; ?>"><?= $title; ?></div>
    <div class="tab-content<?= $active ? ' active' : ''; ?>"><?= $content; ?></div>

  <?php
    $active = false;
    endwhile;
  ?>

</div>

<?php endif; ?>
