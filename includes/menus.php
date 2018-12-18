<?php

if (!function_exists('theme_setup')) {
  function theme_setup() {
    register_nav_menus(array(
      'main' => 'Main Navigation',
      'footer' => 'Footer Navigation',
      'policies' => 'Policies Navigation'
    ));
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
  }
}
add_action('after_setup_theme', 'theme_setup');
