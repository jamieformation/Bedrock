<?php

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
