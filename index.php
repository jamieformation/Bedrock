<?php get_header(); ?>

  <section id="news-archive">
    <div class="container">
      <h1>News</h1>
    </div>
    <div class="container">
      <?php if(have_posts()){ ?>
        <div class="row">
          <?php while(have_posts()){ the_post(); ?>
            <a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <div class="image">
                <?php the_post_thumbnail('flex_small'); ?>
              </div>
              <div class="content">
                <div class="title"><?php the_title(); ?></div>
                <div class="excerpt"><?php echo excerpt(15); ?></div>
              </div>
              <?php edit_post_link(null, '<span class="edit-link">', '</span>'); ?>
            </a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </section>

<?php get_footer(); ?>