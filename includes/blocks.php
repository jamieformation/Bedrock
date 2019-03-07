<?php

function be_register_blocks() {

  acf_register_block( array(
    'name'			=> 'image-content',
    'title'			=> __( 'Image & Content' ),
    'render_template'	=> 'partials/block-image-content.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'preview',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'image', 'content' )
  ));

  acf_register_block( array(
    'name'			=> 'button',
    'title'			=> __( 'Button' ),
    'render_template'	=> 'partials/block-button.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'preview',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'button' )
  ));

  acf_register_block( array(
    'name'			=> 'tabs',
    'title'			=> __( 'Tabs' ),
    'render_template'	=> 'partials/block-tabs.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'preview',
    'keywords'		=> array( 'tabs' )
  ));

}
add_action('acf/init', 'be_register_blocks' );

function allowed_block_types( $allowed_blocks ) {
  return array(
    'core/image',
    'core/paragraph',
    'core/columns',
    'core/heading',
    'core/list',
    'core/quote',
    'core/table',
    'core/freeform',
    'core/html',
    'core/pullquote',
    'core/button',
    'core/spacer',
    'core/shortcode',
    'acf/image-content',
    'acf/button',
    'acf/tabs'
  );
}
add_filter( 'allowed_block_types', 'allowed_block_types' );