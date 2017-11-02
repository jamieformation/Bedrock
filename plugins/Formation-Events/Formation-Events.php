<?php

/*
	Plugin Name: Formation Events
	Author: Simon Newman
  Description: Create and manage events.
*/

/*
  Manually create single-formation-event.php
  Shortcodes available for this page:
    [date]
    [time]
    [location]

  Other Shortcodes:
    [calendar]
    [events show=3]
*/

include(plugin_dir_path( __FILE__ ) . 'calendar.php');
include(plugin_dir_path( __FILE__ ) . 'list-events.php');

/** CREATE EVENT POST TYPE **/

add_action( 'init', 'create_post_type_formation_event' );
function create_post_type_formation_event() {
	register_post_type( 'formation-event',
		array(
			'supports' 				=> array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'labels' 					=> array(
				'name' 					=> __( 'Events' ),
				'singular_name' => __( 'Event' )
			),
			'menu_icon' 			=> 'dashicons-calendar-alt',
			'public' 					=> true,
			'has_archive' 		=> true,
			'menu_position'		=> 5,
			'hierarchical'		=> true,
			'rewrite'					=> array(
        'slug' => 'event'
      )
		)
	);
}

/** END CREATE EVENT POST TYPE **/

/** ACF FIELDS **/

function my_acf_add_local_field_groups() {
  acf_add_local_field_group(array (
  	'key' => 'group_59d79bb78f2ef',
  	'title' => 'Events',
  	'fields' => array (
  		array (
  			'key' => 'field_59d79bbe004b0',
  			'label' => 'Location',
  			'name' => 'location',
  			'type' => 'text',
  			'value' => NULL,
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
  			'key' => 'field_59d79bd5004b1',
  			'label' => 'Date',
  			'name' => 'date',
  			'type' => 'date_picker',
  			'value' => NULL,
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array (
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'display_format' => 'd/m/Y',
  			'return_format' => 'Ymd',
  			'first_day' => 1,
  		),
  		array (
  			'key' => 'field_59d79bf2004b2',
  			'label' => 'Start Time',
  			'name' => 'start_time',
  			'type' => 'time_picker',
  			'value' => NULL,
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array (
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'display_format' => 'g:i a',
  			'return_format' => 'g:ia',
  		),
  		array (
  			'key' => 'field_59d79c0d004b3',
  			'label' => 'End Time',
  			'name' => 'end_time',
  			'type' => 'time_picker',
  			'value' => NULL,
  			'instructions' => '',
  			'required' => 0,
  			'conditional_logic' => 0,
  			'wrapper' => array (
  				'width' => '',
  				'class' => '',
  				'id' => '',
  			),
  			'display_format' => 'g:i a',
  			'return_format' => 'g:ia',
  		),
  	),
  	'location' => array (
  		array (
  			array (
  				'param' => 'post_type',
  				'operator' => '==',
  				'value' => 'formation-event',
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
}

add_action('acf/init', 'my_acf_add_local_field_groups');

/** END ACF FIELDS **/

/** ENQUEUE CSS **/

function register_style() {
	wp_register_style('formation-event-css', plugin_dir_url( __FILE__ ) . 'style.css');
	wp_enqueue_style('formation-event-css');
}
add_action('wp_enqueue_scripts','register_style');

/** END ENQUEUE CSS **/

/** FUNCTIONS **/

function days_in_month($month, $year) {
  return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
}

function roundUpToAny($n,$x=5) {
  return ceil($n/$x) * $x;
}

/** END FUNCTIONS **/

/** CREATE SHORTCODES **/

function display_date() {
  return date('F d, Y', strtotime(get_field('date')));
}
add_shortcode('date', 'display_date');

function display_time() {
  $start_time = get_field('start_time');
  $end_time = get_field('end_time');
  return $start_time . ' - ' . $end_time;
}
add_shortcode('time', 'display_time');

function display_location() {
  return get_field('location');
}
add_shortcode('location', 'display_location');

/** END SHORTCODES **/

?>
