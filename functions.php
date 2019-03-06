<?php

require_once 'includes/post-types.php';
require_once 'includes/menus.php';
require_once 'includes/enqueue.php';
require_once 'includes/option-pages.php';
require_once 'includes/class-tgm-plugin-activation.php';
require_once 'includes/plugins.php';
require_once 'includes/shortcodes.php';
require_once 'includes/blocks.php';

// Allow SVG Uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Excerpt
function excerpt($limit) {
  return wp_trim_words(get_the_excerpt(), $limit);
}

// Fixes local error
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );

# Print Preformated
# Updated 08-09-2016 17:22
function print_pre($expression,$return=false){
  $history=debug_backtrace();
  $history=$history[0];
  $out='<div class="print_pre" style="background-color: #eee; padding: 20px; line-height: 150%;">
        Debug<br><small><em>'.$history['file'].': '.$history['line'].'</em></small>
        <pre>'.htmlspecialchars(print_r($expression,true)).'</pre>
        </div>';
  if($return){
    return $out;
  }else{
    echo $out;
  }
}

# Checks whether is formation IP
# Updated 24/01/2019 09:19
function is_formation(){
  return $_SERVER['REMOTE_ADDR']=='212.139.158.113';
}

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );


// Function to edit default query instead of creating a new query
/*
add_action( 'pre_get_posts', function( $query ){
  if ( ! is_admin() && $query->is_main_query() ) {
    if ( is_post_type_archive( 'personnel' ) ) {
      $query->set('posts_per_page', -1 );
    }
  }
});
*/

// Image Sizes
add_action( 'after_setup_theme', 'register_image_sizes' );
function register_image_sizes() {
  add_image_size( 'posts-archive', 400, 300, true );
}


// Breadcrumbs
function breadcrumbs() {
  if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p class="breadcrumbs">','</p>' );
  }
}
