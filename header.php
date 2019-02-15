<!DOCTYPE html>

<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php echo get_bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#ffffff">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab|Roboto:400,700" rel="stylesheet">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <header class="section" id="site-header">
      <div class="container flex">
        <div class="open-menu-btn"><span></span></div>
        <a href="/" class="logo">
          <img class="img-responsive" src="<?= get_template_directory_uri(); ?>/images/logo.svg">
        </a>
        <nav>
          <?php wp_nav_menu('main'); ?>
        </nav>
      </div>
    </header>