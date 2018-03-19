<?php get_header(); ?>

<?php if(have_posts()){ ?>
	<?php while(have_posts()){ the_post(); ?>
    <section id="page">
      <div class="container">
        <?php the_content(); ?>
      </div>
    </section>
	<?php } ?>
<?php } ?>

<?php get_footer(); ?>
