<?php

// Register Scripts & Stylesheets
function register_theme_js_styles(){
  wp_register_script('global', get_template_directory_uri() . '/js/global.js', array('jquery'), false, true);

  wp_register_style('theme-styles', get_template_directory_uri() . '/style.css');
  wp_enqueue_style('theme-styles');

  wp_register_style('blocks', get_template_directory_uri() . '/blocks.css');
  wp_enqueue_style('blocks');

  wp_enqueue_script('jquery');
  wp_enqueue_script('global');
  //enqueue_slick();
  enqueue_lightbox();
}
add_action('wp_enqueue_scripts','register_theme_js_styles');

// Slick Slider - http://kenwheeler.github.io/slick/
function enqueue_slick() {
  wp_register_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), false, true);
  wp_register_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css');
  wp_enqueue_script('slick');
  wp_enqueue_style('slick');
}

// Lightbox - https://lokeshdhakar.com/projects/lightbox2/
function enqueue_lightbox() {
  wp_register_script('lightbox', get_template_directory_uri() . '/js/lightbox/js/lightbox.js', null, false, true);
  wp_enqueue_script('lightbox');
  wp_register_style( 'lightbox', get_template_directory_uri() . '/js/lightbox/css/lightbox.css');
  wp_enqueue_style('lightbox');
}

// Custom Styles for Admin Pages
function load_custom_wp_admin_style() {
  wp_register_style( 'blocks_css', get_template_directory_uri() . '/blocks.css', false);
  wp_enqueue_style( 'blocks_css' );
  wp_register_style( 'admin_css', get_template_directory_uri() . '/admin.css', false);
  wp_enqueue_style( 'admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

// Custom Styles for Login Page
function load_custom_wp_login_style() {
  wp_register_style( 'admin_css', get_template_directory_uri() . '/admin.css', false);
  wp_enqueue_style( 'admin_css' );
}
add_action( 'login_enqueue_scripts', 'load_custom_wp_login_style' );

// Custom Editor Styles
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
