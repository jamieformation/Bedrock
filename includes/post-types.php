<?php

// Custom Post Type
/*
add_action( 'init', 'custom_post_type' );
function custom_post_type() {
  register_post_type( 'project',
    array(
      'supports'         => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
      'labels'           => array(
        'name'           => __( 'Projects' ),
        'singular_name' => __( 'Project' )
      ),
      'menu_icon'       => 'dashicons-admin-home',
      'public'           => true,
      'has_archive'     => true,
      'menu_position'    => 5,
      'hierarchical'    => true
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
