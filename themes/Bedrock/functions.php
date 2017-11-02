<?php

// Custom Image Sizes
add_image_size('news_small',450,300,true);


// Register Scripts & Stylesheets
function register_theme_js_styles(){

	//wp_register_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js');
	//wp_register_style( 'slick-css', get_template_directory_uri() . '/js/slick/slick.css');
	//wp_register_style( 'lightbox-css', get_template_directory_uri().'/js/lightbox/css/lightbox.css');
	wp_register_script('global',get_template_directory_uri().'/js/global.js',array('jquery'),false,true);

	wp_enqueue_script('jquery');
	wp_enqueue_script('global');
	//wp_enqueue_script('slick');
	//wp_enqueue_style('slick-css');
	//wp_enqueue_style('lightbox-css');
}
add_action('wp_enqueue_scripts','register_theme_js_styles');


// Custom Post Type
/*
add_action( 'init', 'create_post_type' );
function create_post_type() {
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
function architect_taxonomies() {
	register_taxonomy(
		'architect',  //The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
		'project',        //post type name
		array(
			'hierarchical' => true,
			'label' => 'Arhcitects',  //Display name
			'query_var' => true,
			'rewrite' => array(
					'slug' => 'architect', // This controls the base slug that will display before each term
					'with_front' => false // Don't display the category base before
			)
		)
	);
}
add_action( 'init', 'architect_taxonomies');
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
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
		'page_title' => 'Contact Details',
		'position' => '20.15',
		'icon_url' => 'dashicons-phone',
		'post_id' => 'contacts'
	) );
}

// Website Settings Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page( array(
		'page_title' => 'Website Settings',
		'position' => '20.14',
		'icon_url' => 'dashicons-admin-generic',
		'post_id' => 'website-settings'
	) );
}

// Allow SVG Uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// Returns true is page is child of given.
function is_child($pageID) {
	global $post;
	if( is_page() && ($post->post_parent==$pageID) ) {
    	return true;
	} else {
        return false;
	}
}

function excerpt($limit) {
	return wp_trim_words(get_the_excerpt(), $limit);
}

// Save Meta Date on Post Save
/*
function save_gallery_meta( $post_ID ) {
	$post_type = get_post_type($post_id);
	$gallery = get_field('gallery', $post_ID);
	foreach ($gallery as $image) {
		delete_post_meta($image['ID'], 'project_id');
		update_post_meta($image['ID'], 'project_title', get_the_title($post_ID));
		update_post_meta($image['ID'], 'project_permalink', get_permalink($post_ID));
	}
}
add_action( 'save_post_project', 'save_gallery_meta', 10, 1 );
*/

/** ACF FIELD GROUP IMPORT **/

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_594d02d7b0fd4',
	'title' => 'Contact Details',
	'fields' => array (
		array (
			'key' => 'field_594d02e5315b0',
			'label' => 'Company Name',
			'name' => 'company_name',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_594d02f3315b1',
			'label' => 'Company Address',
			'name' => 'company_address',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => 6,
			'new_lines' => 'br',
		),
		array (
			'key' => 'field_594d0302315b2',
			'label' => 'Telephone Number',
			'name' => 'telephone_number',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_594d0310315b3',
			'label' => 'Fax Number',
			'name' => 'fax_number',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array (
			'key' => 'field_594d390900920',
			'label' => 'Logo',
			'name' => 'logo',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'thumbnail',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array (
			'key' => 'field_597f059c01190',
			'label' => 'Email',
			'name' => 'email',
			'type' => 'email',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'options_page',
				'operator' => '==',
				'value' => 'acf-options-contact-details',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;

/** END ACF FIELD GROUP IMPORT **/
