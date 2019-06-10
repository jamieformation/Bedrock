<?php

function be_register_blocks() {

  acf_register_block( array(
    'name'			=> 'button',
    'title'			=> __( 'Button' ),
    'render_template'	=> 'partials/blocks/block-button.php',
    'category'		=> 'common',
    'icon'			=> 'editor-table',
    'mode'			=> 'auto',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'button' )
  ));

  acf_register_block( array(
    'name'			=> 'form',
    'title'			=> __( 'Form' ),
    'render_template'	=> 'partials/blocks/block-form.php',
    'category'		=> 'embed',
    'icon'			=> 'feedback',
    'mode'			=> 'edit',
    'keywords'		=> array( 'form' ),
    'supports' => array(
      'mode' => false
    )
  ));

  acf_register_block( array(
    'name'			=> 'gallery',
    'title'			=> __( 'Gallery' ),
    'render_template'	=> 'partials/blocks/block-gallery.php',
    'category'		=> 'widgets',
    'icon'			=> 'layout',
    'mode'			=> 'auto',
    'keywords'		=> array( 'gallery' )
  ));

  acf_register_block( array(
    'name'			=> 'image-content',
    'title'			=> __( 'Image & Content' ),
    'render_template'	=> 'partials/blocks/block-image-content.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'auto',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'image', 'content' )
  ));

  acf_register_block( array(
    'name'			=> 'highlighted-one-column',
    'title'			=> __( 'Highlighted - One Column' ),
    'render_template'	=> 'partials/blocks/block-highlighted-one-column.php',
    'category'		=> 'layout',
    'icon'			=> 'admin-appearance',
    'mode'			=> 'auto',
    'keywords'		=> array( 'highlighted' )
  ));

  acf_register_block( array(
    'name'			=> 'highlighted-two-column',
    'title'			=> __( 'Highlighted - Two Column' ),
    'render_template'	=> 'partials/blocks/block-highlighted-two-column.php',
    'category'		=> 'layout',
    'icon'			=> 'admin-appearance',
    'mode'			=> 'auto',
    'keywords'		=> array( 'highlighted', '2', 'two' )
  ));

  acf_register_block( array(
    'name'			=> 'image',
    'title'			=> __( 'Large Cropped Image' ),
    'render_template'	=> 'partials/blocks/block-image.php',
    'category'		=> 'common',
    'icon'			=> 'format-image',
    'mode'			=> 'auto',
    'keywords'		=> array( 'image', 'large', 'cropped' )
  ));

  acf_register_block( array(
    'name'			=> 'quote',
    'title'			=> __( 'Quote' ),
    'render_template'	=> 'partials/blocks/block-quote.php',
    'category'		=> 'common',
    'icon'			=> 'format-quote',
    'mode'			=> 'auto',
    'keywords'		=> array( 'quote' )
  ));

  acf_register_block( array(
    'name'			=> 'tabs-accordion',
    'title'			=> __( 'Tabs/Accordion' ),
    'render_template'	=> 'partials/blocks/block-tabs-accordion.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'auto',
    'keywords'		=> array( 'tabs', 'accordion' )
  ));

  acf_register_block( array(
    'name'			=> 'three-column-image-text',
    'title'			=> __( 'Three Column Image & Content' ),
    'render_template'	=> 'partials/blocks/block-three-column-image-content.php',
    'category'		=> 'layout',
    'icon'			=> 'images-alt2',
    'mode'			=> 'auto',
    'keywords'		=> array( 'image', 'content', 'three', '3' )
  ));

  acf_register_block( array(
    'name'			=> 'two-columns',
    'title'			=> __( 'Two Columns' ),
    'render_template'	=> 'partials/blocks/block-two-columns.php',
    'category'		=> 'layout',
    'icon'			=> 'editor-table',
    'mode'			=> 'auto',
    'keywords'		=> array( 'columns', 'two', '2' )
  ));

  acf_register_block( array(
    'name'			=> 'video',
    'title'			=> __( 'Video' ),
    'render_template'	=> 'partials/blocks/block-video.php',
    'category'		=> 'embed',
    'icon'			=> 'format-video',
    'mode'			=> 'auto',
    'supports' => array( 'mode' => false ),
    'keywords'		=> array( 'video', 'youtube' )
  ));

}
if (function_exists('acf_register_block')) {
  add_action('acf/init', 'be_register_blocks' );
}

function allowed_block_types( $allowed_blocks ) {
  return array(
    'core/image',
    'core/paragraph',
    'core/heading',
    'core/list',
    'core/table',
    'core/freeform',
    'core/html',
    'core/spacer',
    'core/shortcode',
    'acf/button',
    'acf/form',
    'acf/gallery',
    'acf/image',
    'acf/image-content',
    'acf/highlighted-one-column',
    'acf/highlighted-two-column',
    'acf/quote',
    'acf/tabs-accordion',
    'acf/two-columns',
    'acf/three-column-image-text',
    'acf/video'
  );
}
add_filter( 'allowed_block_types', 'allowed_block_types' );