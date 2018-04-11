<?php get_header(); ?>

    <section id="news-archive">
      <div class="container">
        <h1>News</h1>
      </div>
      <div class="container">
        <?php if(have_posts()){ ?>
        <div class="row">
          <?php while(have_posts()){ the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="post">
            <div class="image">
              <?php the_post_thumbnail('news_small', ['class' => 'img-responsive']); ?>
            </div>
            <div class="content">
              <div class="title"><?php the_title(); ?></div>
              <div class="excerpt"><?= excerpt(15); ?></div>
            </div>
          </a>
          <?php } ?>
        </div>
      <?php } ?>
      </div>
    </section>

<?php get_footer(); ?>
