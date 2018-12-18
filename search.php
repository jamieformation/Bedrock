<?php get_header(); ?>

<?php
  if (isset($_GET['s']) && $_GET['s'] != '') {
    $search_term = $_GET['s'];
  } else {
    $search_term = '';
  }
 ?>

  <section id="news-archive">
    <div class="container">
      <h1>Search results for <span><?php echo $search_term; ?></span></h1>
    </div>
    <div class="container">
      <?php if(have_posts()){ ?>
        <div class="row">
          <?php while(have_posts()){ the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="post">
              <div class="image">
                <?php the_post_thumbnail('flex_small'); ?>
              </div>
              <div class="content">
                <div class="title"><?php the_title(); ?></div>
                <div class="excerpt"><?php echo excerpt(15); ?></div>
              </div>
            </a>
          <?php } ?>
        </div>
      <?php } ?>
    </div>
  </section>

<?php get_footer(); ?>