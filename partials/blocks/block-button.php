<div class="wp-block button-container">

  <?php if( have_rows('buttons') ): while ( have_rows('buttons') ) : the_row();
    $text = get_sub_field('link')['title'];
    $url = get_sub_field('link')['url'];
    $target = get_sub_field('link')['target'];
    $style = get_sub_field('style');
  ?>
    <a href="<?= $url; ?>" class="btn <?= $style ? $style: ''; ?>" target="<?= $target; ?>"><?= $text; ?></a>
  <?php endwhile; endif; ?>

</div>
