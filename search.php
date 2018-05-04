<?php
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$context['search'] = array(
  'term' => $_GET['s']
);

Timber::render( 'search.twig', $context );
