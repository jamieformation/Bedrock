<?php get_header(); ?>

<?php if(have_posts()){ ?>
  <?php while(have_posts()){ the_post(); ?>

    <main id="single-post">

      <div class="section page-header">
        <div class="container">
          <h1><?php the_title(); ?></h1>
          <?php breadcrumbs(); ?>
        </div>
      </div>

      <article class="section section-padding">
        <div class="container">
          <?php the_content(); ?>
          <span class="posted">Posted on <?php echo get_the_date(); ?></span>
          <div class="buttons-container">
            <a class="btn btn-back" href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><span></span>Back to news</a>
            <?php if (shortcode_exists('addtoany')) { ?>
              <div class="addtoany"><?php echo do_shortcode('[addtoany]'); ?></div>
            <?php } ?>
          </div>
        </div>
      </article>

    </main>

  <?php } ?>
<?php } ?>

<?php get_footer(); ?>
