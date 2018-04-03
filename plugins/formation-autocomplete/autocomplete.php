<?php

/*
	Plugin Name: Formation Autocomplete
	Author: Formation Media
  Description: Add autocomplete to forms
*/

defined( 'ABSPATH' ) OR exit;

include 'acf.php';

class Autocomplete {

  private $options;

  function __construct() {
    add_action('wp_enqueue_scripts', array($this, 'register_css'));
	  //add_filter('the_content', array($this, 'add_flexi_content_template'));
    $this->createOptionsPage();
  }

  function register_css(){
		wp_register_style('autocomplete-css', plugin_dir_url( __FILE__ ) . 'autocomplete.css');
		wp_enqueue_style('autocomplete-css');
    wp_register_script('autocomplete', plugin_dir_url( __FILE__ ) . 'autocomplete.js');
    wp_enqueue_script('autocomplete');
	}

  function createOptionsPage(){
    if( function_exists('acf_add_options_page') ) {
    	acf_add_options_page( array(
    		'page_title' => 'Autocomplete',
    		'position' => '20.14',
    		'icon_url' => 'dashicons-list-view',
    		'post_id' => 'formation-autocomplete'
    	) );
    }
  }
}

$flexi_content = new Autocomplete;
