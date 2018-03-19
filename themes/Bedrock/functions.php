<?php

// Register Scripts & Stylesheets
function register_theme_js_styles(){
	wp_register_script('global', get_template_directory_uri() . '/js/global.js', array('jquery'), false, true);
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
  wp_register_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js');
  wp_register_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css');
	wp_enqueue_script('slick');
	wp_enqueue_style('slick');
}

function enqueue_lightbox() {
	wp_register_style( 'lightbox-css', get_template_directory_uri() . '/js/lightbox/css/lightbox.css');
	wp_enqueue_style('lightbox-css');
}


// Custom Post Type
/*
add_action( 'init', 'custom_post_type' );
function custom_post_type() {
	register_post_type( 'project',
		array(
			'supports' 				=> array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'labels' 					=> array(
				'name' 					=> __( 'Projects' ),
				'singular_name' => __( 'Project' )
			),
			'menu_icon' 			=> 'dashicons-admin-home',
			'public' 					=> true,
			'has_archive' 		=> true,
			'menu_position'		=> 5,
			'hierarchical'		=> true
		)
	);
}
*/

// Custom Taxonomy
/*
function custom_taxonomies() {
	register_taxonomy(
		'architect',
		'project',
		array(
			'hierarchical' => true,
			'label' => 'Arhcitects',
			'query_var' => true,
			'rewrite' => array(
				'slug' => 'architect',
				'with_front' => false
			)
		)
	);
}
add_action( 'init', 'custom_taxonomies');
*/


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

// Theme Setup
if( !function_exists('theme_setup') ) {
	function theme_setup(){
		register_nav_menus( array(
			'main' => __( 'Main  Navigation'),
			'footer' => __( 'Footer Navigation' ),
			'policies' => __( 'Policies Navigation' )
		) );

		add_theme_support( 'post-thumbnails' );
	}
}
add_action( 'after_setup_theme', 'theme_setup' );

// Contact Details Options Page
/*
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
		'page_title' => 'Contact Details',
		'position' => '20.15',
		'icon_url' => 'dashicons-phone',
		'post_id' => 'contacts'
	) );
}
*/

// Website Settings Options Page
/*
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
		'page_title' => 'Website Settings',
		'position' => '20.14',
		'icon_url' => 'dashicons-admin-generic',
		'post_id' => 'website-settings'
	) );
}
*/

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
