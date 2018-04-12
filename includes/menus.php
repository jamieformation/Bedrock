<?php

if( !function_exists('theme_setup') ) {
  function theme_setup(){
    register_nav_menus( array(
      'main' => __( 'Main Navigation'),
      'footer' => __( 'Footer Navigation' ),
      'policies' => __( 'Policies Navigation' )
    ) );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'menus' );
  }
}
add_action( 'after_setup_theme', 'theme_setup' );

add_filter( 'timber/context', 'add_to_context' );
function add_to_context( $context ) {
  $context['main_menu'] = new Timber\Menu( 'main' );
  $context['footer_menu'] = new Timber\Menu( 'footer' );
  $context['policies_menu'] = new Timber\Menu( 'policies' );
  return $context;
}
