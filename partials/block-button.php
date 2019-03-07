<div class="wp-block button-container">

  <?php if( have_rows('buttons') ): while ( have_rows('buttons') ) : the_row();

    $url = get_sub_field('link');
    $text = get_sub_field('text');
    $class = 'btn';

    switch (get_sub_field('colour')) {
      case 'secondary':
        $class .= ' btn-alt';
        break;
    }

    switch (get_sub_field('style')) {
      case 'border':
        $class .= ' btn-border';
        break;
      case 'clear':
        $class .= ' btn-clear';
        break;
    }

    switch (get_sub_field('icon')) {
      case 'prev':
        $class .= ' btn-prev';
        break;
      case 'next':
        $class .= ' btn-next';
        break;
    }
  ?>

    <a href="<?= $url; ?>" class="<?= $class; ?>"><?= $text; ?></a>

  <?php endwhile; endif; ?>

</div>
