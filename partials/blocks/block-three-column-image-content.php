<div class="wp-block three-column-image-content">
  <?php if( have_rows('columns') ): while ( have_rows('columns') ) : the_row(); ?>
    <div class="column">
      <div class="image">
        <?= wp_get_attachment_image(get_sub_field('image')['id'], 'third-width'); ?>
      </div>
      <div class="content"><?= get_sub_field('content'); ?></div>
    </div>
  <?php endwhile; endif; ?>
</div>