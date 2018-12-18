<?php

require_once 'includes/post-types.php';
require_once 'includes/menus.php';
require_once 'includes/enqueue.php';
require_once 'includes/option-pages.php';
require_once 'includes/class-tgm-plugin-activation.php';
require_once 'includes/plugins.php';

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

/**
 * Registers an editor stylesheet for the theme.
 */
function wpdocs_theme_add_editor_styles() {
  add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );
