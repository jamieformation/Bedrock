<?php get_header(); ?>

<?php
  if (isset($_GET['s']) && $_GET['s'] != '') {
    $search_term = $_GET['s'];
  } else {
    $search_term = '';
  }
 ?>

<div class="section page-header">
  <div class="container">
    <h1>Search results for "<span><?php echo $search_term; ?>"</span></h1>
    <?php breadcrumbs(); ?>
  </div>
</div>

<main class="section section-padding">
  <div class="container narrow">
    <h1>Search results for "<span><?php echo $search_term; ?>"</span></h1>
    <h2>Need a new search?</h2>
    <p>If you didn't find what you were looking for, try a new search!</p>
    <form class="search-results-form" action="/" method="get">
      <input type="text" name="s" placeholder="Search ...">
      <button type="submit"></button>
    </form>
    <?php if(have_posts()){ ?>
      <div class="search-results">
        <?php while(have_posts()){ the_post(); ?>
          <article class="search-result">
            <h2 class="title">
              <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
              </a>
            </h2>
            <div class="excerpt"><?= excerpt(20); ?></div>
            <a class="search-result-link" href="<?php the_permalink(); ?>">Read more</a>
          </article>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</main>

<?php get_footer(); ?>