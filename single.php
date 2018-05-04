<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['posts'] = array(
  'link' => get_permalink(get_option('page_for_posts'))
);

Timber::render( 'post.twig', $context );
