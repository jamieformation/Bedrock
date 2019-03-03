<?php get_header(); ?>

<?php if(have_posts()){ ?>
  <?php while(have_posts()){ the_post(); ?>

    <main class="single-page">

      <div class="section page-header">
        <div class="container">
          <h1><?php the_title(); ?></h1>
          <?php breadcrumbs(); ?>
        </div>
      </div>

      <article class="section section-padding">
        <div class="container">
          <?php the_content(); ?>
          <?php get_template_part('partials/flexi', 'content'); ?>
        </div>
      </article>

    </main>

  <?php } ?>
<?php } ?>

<?php get_footer(); ?>
