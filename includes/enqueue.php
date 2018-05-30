<?php

// Register Scripts & Stylesheets
function register_theme_js_styles(){
  wp_register_script('global', get_template_directory_uri() . '/js/global.js', array('jquery', 'slick'), false, true);

  wp_register_style('theme-styles', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('theme-styles');

  wp_enqueue_script('jquery');
  wp_enqueue_script('global');
  //enqueue_slick();
  //enqueue_lightbox();
  //enqueue_fontawesome();
}
add_action('wp_enqueue_scripts','register_theme_js_styles');

function enqueue_fontawesome() {
  wp_register_style( 'font-awesome', get_template_directory_uri() . '/js/font-awesome-4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('font-awesome');
}

function enqueue_slick() {
  wp_register_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), false, true);
  wp_register_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css');
  wp_enqueue_script('slick');
  wp_enqueue_style('slick');
}

function enqueue_lightbox() {
  wp_register_style( 'lightbox-css', get_template_directory_uri() . '/js/lightbox/css/lightbox.css', null, false, true);
  wp_enqueue_style('lightbox-css');
}
