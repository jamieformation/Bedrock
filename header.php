<!DOCTYPE html>

<html lang="en-GB">
  <head>
    <meta charset="<?= get_bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <title><?php wp_title(); ?></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:400,700" rel="stylesheet">
    <link rel="icon" href="<?= get_template_directory_uri(); ?>/favicon.png" type="image/png">

    <?php wp_head(); ?>
  </head>

  <body>
    <header>
      <div class="container flex">
        <div class="open-menu-btn"><span></span></div>
        <div class="logo">
          <a href="/"><img class="img-responsive" src="<?= get_template_directory_uri(); ?>/images/logo.svg"></a>
        </div>
        <nav>
          <?php wp_nav_menu('main'); ?>
        </nav>
      </div>
      </div>
    </header>