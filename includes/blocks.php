<?php

function be_register_blocks() {
  if( ! function_exists('acf_register_block') ) return;
  acf_register_block( array(
    'name'			=> 'two-column',
    'title'			=> __( 'Two Column' ),
    'render_template'	=> 'partials/block-two-column.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'preview',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'column', '2', 'two' )
  ));

  acf_register_block( array(
    'name'			=> 'image-content',
    'title'			=> __( 'Image & Content' ),
    'render_template'	=> 'partials/block-image-content.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'preview',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'column', '2', 'two' )
  ));
}
add_action('acf/init', 'be_register_blocks' );
