<?php get_header(); ?>

<?php if(have_posts()){ ?>
  <?php while(have_posts()){ the_post(); ?>

    <section class="page">
      <div class="container">
        <h1><?php the_title(); ?></h1>
      </div>
      <div class="container">
          <?php the_content(); ?>
      </div>
    </section>

  <?php } ?>
<?php } ?>

<?php get_footer(); ?>
