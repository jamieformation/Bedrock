<?php get_header(); ?>

<?php if(have_posts()){ ?>
  <?php while(have_posts()){ the_post(); ?>

    <main class="section">
      <div class="container">
        <?php the_content(); ?>
      </div>
    </main>

  <?php } ?>
<?php } ?>

<?php get_footer(); ?>
