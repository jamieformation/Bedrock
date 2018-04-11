<?php

require_once 'includes/post-types.php';
require_once 'includes/menus.php';
require_once 'includes/enqueue.php';
require_once 'includes/option-pages.php';
require_once 'includes/class-tgm-plugin-activation.php';
require_once 'includes/plugins.php';

// If the Timber plugin isn't activated, print a notice in the admin.
if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
	} );
	return;
}


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
