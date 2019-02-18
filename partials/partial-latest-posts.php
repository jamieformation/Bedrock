<div id="latest-posts" class="section">
  <div class="container">
    <h3>Latest Posts</h3>
    <div class="grid-3-col">
      <?php
        $args = array(
        	'post_type' => 'post',
        	'posts_per_page' => 3
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) :
        while ( $the_query->have_posts() ) : $the_query->the_post();
      ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <a href="<?php the_permalink(); ?>" class="image">
              <?php the_post_thumbnail('posts-archive'); ?>
            </a>
            <div class="content">
              <h3><a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a></h3>
              <div class="posted-on"><?= get_the_date(); ?></div>
              <div class="excerpt"><?php echo excerpt(15); ?></div>
            </div>
            <?php edit_post_link(null, '<span class="edit-link">', '</span>'); ?>
          </article>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </div>
</div>