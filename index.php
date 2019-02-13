<?php get_header(); ?>

  <main class="section" id="posts-archive">
    <div class="container">
      <h1>News</h1>
      <?php if(have_posts()){ ?>
        <div class="grid-3-col">
          <?php while(have_posts()){ the_post(); ?>
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
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </main>

<?php get_footer(); ?>